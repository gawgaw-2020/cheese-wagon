const ham = document.getElementById('ham');
const menu = document.getElementById('menu');

const gbMenuItem = document.querySelectorAll('.js-gb-menu-item');

function toggleClicked() {
  ham.classList.toggle('clicked');
  menu.classList.toggle('clicked');
};


ham.addEventListener('click', () => {
  toggleClicked();
});
menu.addEventListener('click', () => {
  toggleClicked();
});

gbMenuItem.forEach((el) => {
  el.addEventListener('click', (event) => {
    toggleClicked();
    event.stopPropagation();
  });
});