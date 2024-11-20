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
      16: '16px',
      17: '17px',
      18: '18px',
      20: '20px',
      22: '22px',
      28: '28px',
      35: '35px',
      50: '50px',
      55: '55px',
      60: '60px',
    },
    colors: {
      black: '#000000',
      fushia: 'rgb(188, 0, 240)',
      white: '#ffffff',
      indigo: '#6461f2',
      indigoSpecial: 'rgba(100, 97, 242, 0.5)',
      rose: '#e796f7',
      red: '#FF0000'
    },
    screens: {
      'max-xxlLG': {'max': '1300px'},
      'max-xxlMD': {'max': '1100px'},
      'max-lgBIG': {'max': '992px'},
      'max-lgMD': {'max': '800px'},
      'max-md': {'max': '600px'},
      'max-mdBIG': {'max': '650px'},
      'min-mdBIG': {'min': '650px'},
      'max-s': {'max': '500px'},
      'max-sBIG': {'max': '450px'},
      'max-xs': {'max': '400px'},
    },
    extend: {
      width: {
        '40': '40%',
        '55': '55%',
        '60': '60%',
        '65': '65%',
        '70': '70%',
        '80': '80%',
      },
      height: {
        '90': '90%',
      },
      margin: {
        xs : '5px',
      },
      zIndex: {
        big: '99999999',
      },
    },
  },
  plugins: [],
}

