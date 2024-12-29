const reservBtns = document.querySelectorAll('.reserve-btn');
const formPopup = document.querySelector('#formPopup');
const closeFormBtn = document.querySelector('#closePopup');
const reservationForm = document.querySelector('#reservationForm');
const brandInput = reservationForm.querySelector('#carBrand');
const modelInput = reservationForm.querySelector('#carModel');
const submitBtn = reservationForm.querySelector('#submitReservation');


reservBtns.forEach(btn => {
    btn.addEventListener('click', () => {

        formPopup.classList.add('flex');
        formPopup.classList.remove('hidden');

        const brand = btn.dataset.brand;
        const model = btn.dataset.model;
        const carId = btn.dataset.carId;

        brandInput.value = brand;
        modelInput.value = model;

        submitBtn.name = 'carId';
        submitBtn.value = carId;
    });
});

closeFormBtn.addEventListener('click', () => {
    formPopup.classList.add('hidden');
    formPopup.classList.remove('flex');
});