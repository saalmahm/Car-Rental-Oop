const updateProfileBtn = document.querySelector('#updateProfileBtn');
const formPopup = document.querySelector('#formPopup');
const closeFormBtn = document.querySelector('#closeForm');

updateProfileBtn.addEventListener('click', () => {
    formPopup.classList.remove('hidden');
    formPopup.classList.add('flex');
});

closeFormBtn.addEventListener('click', () => {
    formPopup.classList.add('hidden');
    formPopup.classList.remove('flex');
});