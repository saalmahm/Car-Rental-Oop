const sideBar = document.querySelector('#sideBar');
const sideSelections = sideBar.querySelectorAll('button');
const contentSections = document.querySelectorAll('.contentSection');

sideSelections.forEach(choice => {
    choice.addEventListener('click', () => {

        const sectionId = choice.dataset.section;

        contentSections.forEach(section => {
            section.classList.add('hidden');
            section.classList.remove('flex');
        });

        const selectedSection = document.querySelector(`#${sectionId}`);
        selectedSection.classList.remove('hidden');
        selectedSection.classList.add('flex');

    });
});

const editContractBtn = document.querySelectorAll('.editContractBtn');
const editContractPopup = document.querySelector('#editContractPopup');
const closeEditContract = document.querySelector('#closeEditContract');
const ownerInput = document.querySelector('#owner');
const brandInput =  document.querySelector('#carBrand');
const modelInput =  document.querySelector('#carModel');


editContractBtn.forEach(btn => {
    btn.addEventListener('click', () => {
        editContractPopup.classList.remove('hidden');
        editContractPopup.classList.add('flex');

        ownerInput.value = btn.dataset.owner;
        brandInput.value = btn.dataset.brand;
        modelInput.value = btn.dataset.model;

    });
});

closeEditContract.addEventListener('click', () => {
    editContractPopup.classList.add('hidden');
    editContractPopup.classList.remove('flex');
});