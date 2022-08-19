/** @type {import('tailwindcss').Config} */
module.exports = {
   content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'first': '#051622',
        'second': '#1BA098',
        'third': '#DEB992'
      },
    },
  },
  plugins: [],
}
