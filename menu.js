const dropdownButton = document.querySelector('#dropdownButton');
const dropdownMenu = document.querySelector('#dropdownMenu');

dropdownButton.addEventListener('click', function (e) {
    e.stopPropagation();
    dropdownMenu.classList.toggle('hidden');
});

document.addEventListener('click', function (e) {
    if (!dropdownMenu.contains(e.target) && !dropdownButton.contains(e.target)) {
        dropdownMenu.classList.add('hidden');
    }
});