/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/JS/app.js",
    "./templates/base.html.twig",
    "./templates/includes/partials/header.html.twig",
    "./templates/includes/partials/footer.html.twig",
    "./templates/home/index.html.twig",
    "./templates/security/login.html.twig",
    "./templates/admin/project/index.html.twig",
    "./templates/admin/project/add.html.twig"
  ],
  theme: {
    fontFamily: {
      family: 'Homenaje, sans-serif'
    },
    fontSize: {
      16: '16px',
      17: '17px',
      18: '18px',
      19: '19px',
      20: '20px',
      22: '22px',
      25: '25px',
      28: '28px',
      30: '30px',
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
      indigoSpecial: 'rgba(100, 97, 242, 0.95)',
      orange: '#FFA500',
      rose: '#e796f7',
      roseSpecial: 'rgba(231, 150, 247, 0.4)',
      red: '#FF0000',
      transparent: 'rgba(0, 0, 0, 0)',
      yellow: '#FFFF00',
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
      'max-xsBIG': {'max': '350px'},
    },
    extend: {
      width: {
        '40': '40%',
        '55': '55%',
        '60': '60%',
        '65': '65%',
        '70': '70%',
        '80': '80%',
        '90': '90%',
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

