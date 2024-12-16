/**
* Module : Onglet
*/


// Initialise le module

export let ongletBtns;
export const ongletInit = () => {

  // Sélectionne les onglets
  ongletBtns = document.querySelectorAll('.m-ong-btn');


  ongletBtns.forEach(ongletBtn => {
    ongletBtn.addEventListener('click', function (e) {
      let index = Array.from(ongletBtns).indexOf(this);

      let elementsToDeactivate = document.querySelectorAll('.m-ong-btn.e-on, .m-ong-txt.e-on');
      elementsToDeactivate.forEach(function (element) {
        element.classList.remove('e-on');
      });

      this.classList.add('e-on');

      let textElement = document.querySelector('.m-ong-txt:nth-child(' + (index + 1) + ')');
      if (textElement) {
        textElement.classList.add('e-on');
      }
    });
  });
};
ongletInit();