<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Points;
use App\Models\Premios;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\PermsController;
use App\Http\Controllers\PointsController;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request) {

        $nickname = $request->input('nickname');
        $tokenInput = $request->input('token');
        $pullUser = User::where('nickname', '=',$nickname)->first();

         if($pullUser === null) {
            return view('preLogin', array(
                'username' => $nickname,
                'errors' => 'El usuario no ha jugado en Koscraft!'
            ));
        }

        if($tokenInput != $pullUser->token ) {

            $message = 'Credenciales incorrectas.';

            return view('preLogin', array(
                'username' => $nickname,
                'errors' => $message
            ));
        } else {
            Auth::loginUsingId($pullUser->id);
            return redirect()->to('/');
        }
    }

    public function cerrarSesion() {
        auth()->logout();
        return redirect()->to('/');
    }

    public function landing() {
        $users = User::orderBy('points', 'desc')->limit(5)->get();
        $posts = Blog::orderBy('created_at', 'asc')->limit(3)->get();
        foreach($users as $user) {
            $milliseconds = StatsController::getTotalTimePlayed($user->uuid);
            if($milliseconds == "") {
                $user->timeplayed = "0 horas jugadas";    
            } else {
                $seconds = floor($milliseconds / 1000);
                $minutes = floor($seconds / 60);
                $hours = floor($minutes / 60);
                $user->timeplayed = $hours . " horas jugadas";    
            }
            $user->rank = PermsController::getRank($user->uuid);

        }

        return view('landing', array(
            'users' => $users,
            'posts' => $posts
        ));

    }

    public function blogPosts() {

        if( auth()->check() ) {
  
            if(PermsController::getRank(auth()->user()->uuid) == 'admin' || PermsController::getRank(auth()->user()->uuid) == 'developer' ) {

                $posts = Blog::all();

                return view('blog', array(
                    'posts' => $posts
                ));    

            } else {
                return redirect()->to('/');
            }
        }
        else {
            return redirect()->to('/');
        }

    }

    public function blogCrear(Request $request) {

        Blog::create(['imageURL' => $request->input('imageURL'), 'titulo' => $request->input('titulo'), 'contenido' => $request->input('contenido'), 'author' => auth()->user()->id]);
        return redirect()->to('/blog/lista');
    }

    public function blogBorrar(Request $request) {
        Blog::where('id','=',$request->input('post-borrar'))->delete();
        return redirect()->to('/blog/lista');
    }

    public function leerPost($id) {

        $post = Blog::where('id','=',$id)->first();
        $author = User::where('id','=',$post->author)->first();
        $post->contenido = str_replace("\r", "", $post->contenido);
        $arrTexto = explode("\n",$post->contenido);
        $newText = "";
        foreach($arrTexto as $paragrafo) {
            $newText .= "<p>" . $paragrafo . "</p>";
        }
        $post->contenido = $newText;
        $post->nicknameAuthor = $author->nickname;
        return view('post', array(
            'post' => $post
        ));

    }

    public function verPerfil($nickname) {
        $usuario = User::where('nickname', '=', $nickname)->first();
        $milliseconds = StatsController::getTotalTimePlayed($usuario->uuid);
        if($milliseconds == "") {
            $usuario->timeplayed = "0 horas jugadas";    
        } else {
            $seconds = floor($milliseconds / 1000);
            $minutes = floor($seconds / 60);
            $hours = floor($minutes / 60);
            $usuario->timeplayed = $hours . " horas jugadas";    
        }
        $usuario->rank = PermsController::getRank($usuario->uuid);

        $usuario->lastLogin = StatsController::getLastLogin($usuario->uuid);

        $usuario->stats = StatsController::getAllStats($usuario->uuid);

        if(auth()->check()) {
            $rangoUsuarioLog = PermsController::getRank(auth()->user()->uuid);
        } else {
            $rangoUsuarioLog = null;
        }

        return view('perfil', array(
            'usuario' => $usuario,
            'rangoUsuarioLog' => $rangoUsuarioLog
        ));
    }

    public function canjearPuntos() {

        if(auth()->check()) {
            $hours = StatsController::getTotalHours( auth()->user()->uuid );
            $canjeosHechos = PointsController::getCanjeosUsuario( auth()->user()->id );
            $canjeos = PointsController::todosCanjeos();
            return view('canjeos', array(
                'canjeos' => $canjeos,
                'hours' => $hours
            ));        
        } else {
            return redirect()->to('/');
        }

    }

    public function accionCanjear($idPuntos) {

        if(auth()->check()) {

            $hours = StatsController::getTotalHours( auth()->user()->uuid );
            $quiereReclamar = PointsController::getDatosCanjeo($idPuntos);


            $boolPuedeReclamar = true;
            
            $fechaDisponible = date('Y-m-d h:i:s');
            $fechaDisponible = date('Y-m-d h:i:s', strtotime($fechaDisponible."- 1 day"));

            $ultimoCanjeo = PointsController::ultimoCanjeoHecho( auth()->user()->id, $idPuntos );

            if($ultimoCanjeo) {
                if($ultimoCanjeo->created_at > $fechaDisponible){
                    // NO DISPONIBLE TODAVIA NO
                    $boolPuedeReclamar = false;

                    return view('error', array(
                        'titulo' => '¡Todavía no puedes reclamar el premio!',
                        'mensaje' => 'Aún no han pasado almenos 24 horas desde que reclamaste el canjeo por última vez. Por favor, espera para poder volver a reclamar este canjeo de puntos.',
                        'link' => '/puntos'
                    ));

                }
            }

            if($quiereReclamar->horas > $hours) {
                $boolPuedeReclamar = false;
                return view('error', array(
                    'titulo' => '¡No tienes suficientes horas!',
                    'mensaje' => 'Todavía no has reunido las horas de juego en Koscraft suficientes para poder canjear estos puntos.',
                    'link' => '/puntos'
                ));

            }


            if($boolPuedeReclamar == true) {
                PointsController::premioReclamado( auth()->user()->id, $idPuntos );
                $userPoints = User::where( 'id',auth()->user()->id )->first();
                $userPoints->points = $userPoints->points + $quiereReclamar->cantidad;
                $userPoints->timestamps = false;
                $userPoints->save();

                return view('success', array(
                    'titulo' => '¡Has canjeado ' . $quiereReclamar->cantidad . ' puntos correctamente!',
                    'mensaje' => '¡Ya has canjeado los puntos correctamente! Ves a tu perfil para poder ver los puntos que tienes ahora.',
                    'link' => '/puntos'
                ));

                return redirect()->to('/puntos');
            }
            
        } else {
            return redirect()->to('/');
        }

    }

    public function verPremios() {

        if(auth()->check()) {

            $premios = PremiosController::getAllPremios();
            
            return view('premios', array(
                'premios' => $premios
            ));        
        } else {
            return redirect()->to('/');
        }

    }

    public function reclamarPremio($idPremio) {

        $puntos = auth()->user()->points;

        $premio = PremiosController::getPremio($idPremio);

        if($premio->precio > $puntos) {
            return view('error', array(
                'titulo' => '¡No tienes suficientes puntos!',
                'mensaje' => 'No tienes los suficientes puntos para poder reclamar este premio ¡Consigue más puntos!',
                'link' => '/premios'
            ));
        } else {

            $permisoYaDado = PermsController::comprovarPermission( auth()->user()->uuid, $premio->permisoLP );

            if($permisoYaDado) {
                return view('error', array(
                    'titulo' => '¡Ya has reclamado este premio!',
                    'mensaje' => 'Has reclamado el premio anteriormente, recuerda reclamarlo en el servidor antes de volverlo a comprar.',
                    'link' => '/premios'
                ));
            } else {

                PermsController::insertPermission( auth()->user()->uuid, $premio->permisoLP );

                $userPoints = User::where( 'id',auth()->user()->id )->first();
                $userPoints->points = $userPoints->points - $premio->precio;
                $userPoints->premiosReclamados = $userPoints->premiosReclamados + 1;
                $userPoints->timestamps = false;
                $userPoints->save();
    
                return view('success', array(
                    'titulo' => '¡Has reclamado ' . $premio->titulo . ' correctamente!',
                    'mensaje' => 'Ves al servidor de Minecraft y ejecuta el comando /reclamar para poder recibir tu premio. Si no te funciona, prueba a salir y volver a entrar del servidor.',
                    'link' => '/premios'
                ));

            }

        }


    }

    public function gestionarPremios() {

        if( auth()->check() ) {
  
            if(PermsController::getRank(auth()->user()->uuid) == 'admin' || PermsController::getRank(auth()->user()->uuid) == 'developer' ) {

                $premios = PremiosController::getAllPremios();

                return view('gestionarPremios', array(
                    'premios' => $premios
                ));

            } else {
                return redirect()->to('/');
            }
        }
        else {
            return redirect()->to('/');
        }

    }

    public function crearPremio(Request $request) {

        Premios::create([
            'titulo' => $request->input('titulo'),
            'precio' => $request->input('precio'),
            'descripcion' => $request->input('descripcion'),
            'imageURL' => $request->input('imageURL'),
            'permisoLP' => $request->input('permisoLP')
        ]);
        return redirect()->to('/gestion');

    }

    public function borrarPremio(Request $request) {
        Premios::where('id','=',$request->input('premio-borrar'))->delete();
        return redirect()->to('/gestion');
    }


}
