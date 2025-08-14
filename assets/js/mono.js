

// Ce fichier permet de faire toutes sortes de choses un peu magiques
// après qu'une page est chargé : il fait apparaître les modals,
// fait disparaître le menu, fait bouger tout seul des éléments, etc.

'use strict.js';



/**
* Import des modules
*/


// Import les effets
import * as eTextScramble from './effets/_e-text-scramble.js';
import * as eOneByOne from './effets/_e-one-by-one.js';
import * as eDenko from './effets/_e-denko.js';

// Import les layouts
import * as lFrontpage from './layouts/_l-frontpage.js';

// Import les layouts
import * as lVoletLinks from './parts/_p-volet_links.js';

// Import les modules
import * as mOverlay from './modules/_m-overlay.js';
import * as mModal from './modules/_m-modal.js';
import * as mVolet from './modules/_m-volet.js';
import * as mSearch from './modules/_m-search.js';
import * as mAccordions from './modules/_m-accordions.js';
import * as mInputChecker from './modules/_m-input-checker.js';
import * as mFormChecker from './modules/_m-form-checker.js';
import * as mFormLabel from './modules/_m-form-label.js';
