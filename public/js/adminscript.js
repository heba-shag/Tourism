let dash = document.querySelectorAll('.dash');

dash.forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelector('.active').classList.remove('active');
        btn.classList.add('active');
    });
});
// admin welcome
const modal = document.querySelector(".modal");
const trigger = document.querySelector(".trigger");
const closeButton = document.querySelector(".close-button");

function toggleModal() {
    modal.classList.toggle("show-modal");
}

function windowOnClick(event) {
    if (event.target === modal) {
        toggleModal();
    }
}
const x = li.innerText
trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick);

// videoBtn.forEach(btn => {
//     btn.addEventListener('click', () => {
//         document.querySelector('.controls .active').classList.remove('active');
//         btn.classList.add('active');
//         let src = btn.getAttribute('data-src');
//         document.querySelector('#video-slider').src = src;
//     });
// });


const addModal = document.getElementById('addModal');
  
const modalOverlay = document.querySelector('.modalOverlay');
const modalPop = document.querySelector('.ModalCustomer');


addModal.addEventListener('click', () => {

  modalOverlay.style.display = 'block';
  modalPop.style.display = 'block';
});


modalOverlay.addEventListener('click', () => {

  modalOverlay.style.display = 'none';
  modalPop.style.display = 'none';
});