const dropdownButtons = document.querySelectorAll('.toolbar-dropdown .button');

dropdownButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        const currentDropdown = button.parentElement;

        document.querySelectorAll('.toolbar-dropdown').forEach(function (dropdown) {
            if (dropdown !== currentDropdown) {
                dropdown.classList.remove('open');
            }
        });

        currentDropdown.classList.toggle('open');
    });
});

document.addEventListener('click', function (event) {
    const clickedInsideDropdown = event.target.closest('.toolbar-dropdown');

    if (!clickedInsideDropdown) {
        document.querySelectorAll('.toolbar-dropdown').forEach(function (dropdown) {
            dropdown.classList.remove('open');
        });
    }
});