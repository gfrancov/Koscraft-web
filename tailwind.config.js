/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],    theme: {
    fontFamily: {
      'inter': ['Inter', 'Arial', 'Helvetica', 'sans-serif'],
      'minecraft': ['VT323','Inter','Arial']
    },
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}

