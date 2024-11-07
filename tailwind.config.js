/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/JS/app.js",
    "./templates/base.html.twig",
    "./templates/includes/partials/header.html.twig",
    "./templates/includes/partials/footer.html.twig",
    "./templates/home/index.html.twig",
  ],
  theme: {
    fontFamily: {
      family: 'Homenaje, sans-serif'
    },
    fontSize: {
      xxl: '5.25rem'
    },
    colors: {
      black: '#000000',
      white: '#ffffff',
      indigo: '#6461f2',
      rose: '#e796f7'
    },
    extend: {},
  },
  plugins: [],
}

