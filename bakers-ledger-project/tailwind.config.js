/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/**/*.blade.php"
  ],
  theme: {
    fontFamily: {
        'sans': ['Roboto', 'sans-serif']
    },
    extend: {},
  },
  plugins: [],
}
