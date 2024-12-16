/**
* Module : Cover
*/

export const cvrInit = () => {
  let $cvrBtns = document.querySelectorAll('.m-cvr-btn');
  $cvrBtns.forEach($cvrBtn => {
    $cvrBtn.addEventListener('click', () => {
      window.scrollTo({
        top: window.innerHeight,
        behavior: 'smooth'
      });
    });
  });
}
cvrInit();