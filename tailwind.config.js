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
      xxxl: '60px',
      xxl: '55px',
      md: '50px',
    },
    colors: {
      black: '#000000',
      white: '#ffffff',
      indigo: '#6461f2',
      rose: '#e796f7'
    },
    screens: {
      'max-md': {'max': '600px'},
      'max-s': {'max': '500px'},
    },
    extend: {
      spacing: {
        38: '38%',
        80: '80%',
      },
      zIndex: {
        big: '99999999',
      },
    },
  },
  plugins: [],
}

