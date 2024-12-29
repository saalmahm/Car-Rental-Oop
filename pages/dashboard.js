const sideBar = document.querySelector('#sideBar');
console.log(sideBar)
const sideSelections = sideBar.querySelectorAll('button');
console.log(sideSelections);

const contentSections = document.querySelectorAll('.contentSection');

// console.log(sideSelections);

sideSelections.forEach(choice => {
    choice.addEventListener('click', () => {

        const sectionId = choice.dataset.section;
        console.log(sectionId);

        contentSections.forEach(section => {
            section.classList.add('hidden');
            section.classList.remove('flex');
        });

        const selectedSection = document.querySelector(`#${sectionId}`);
        selectedSection.classList.remove('hidden');
        selectedSection.classList.add('flex');

    });
});