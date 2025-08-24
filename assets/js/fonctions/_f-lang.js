/**
 * Layout : Langue
*
*/

let translations = {};

const getLang = () => {
  const htmlLang = document.documentElement.lang;
  return htmlLang && htmlLang.trim() !== '' ? htmlLang : 'en';
};

const loadTranslations = async () => {
  const lang = getLang();
  try {
    const res = await fetch(`/content/lang/${lang}.json`);
    if (!res.ok) throw new Error('Translation file not found');
    translations = await res.json();
  } catch (e) {
    console.warn(`No translation file for "${lang}". Using default strings.`);
    translations = {};
  }
};

export const __ = (str) => {
  if (!translations || typeof translations[str] !== 'string' || translations[str].trim() === '') {
    return str;
  }
  return translations[str];
};

// Charger les traductions au démarrage
loadTranslations();
