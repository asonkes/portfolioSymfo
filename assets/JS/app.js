import '../styles/index.scss';
import '../styles/tailwing.css';

// JS pour composants divers //
import '../JS/components/icon.js';

//JS pour menu burger
import '../JS/includes/burger.js';

// JS pour animations (session "home")
import '../JS/components/home/textAnimation.js';
import '../JS/components/home/windowAnimation.js';

// JS pour animations (session "about")
import '../JS/components/about/textAnimation.js';
import '../JS/components/about/progressBar.js';

// JS pour animation (session "works")
import '../JS/components/works/timeLine.js';
import './components/works/readMore.js';

// JS pour animation (session "contact")
import '../JS/components/contact/mouseEffect.js';

// JS pour forcer à remonter en haut de la page en chargement //
document.addEventListener('DOMContentLoaded', function () {
    window.scrollTo(0, 0);  // Remonte en haut de la page
});
