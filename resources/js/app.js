// app.js - Basic JavaScript for interactions

document.addEventListener('DOMContentLoaded', function() {
    // Toggle the user dropdown
    const dropdownBtn = document.getElementById('dropdown-username');
    const dropdownMenu = document.getElementById('dropdown-menu-username');

    dropdownBtn.addEventListener('click', function() {
        dropdownMenu.classList.toggle('show');
    });

    // Example of a hover effect for menu dropdown
    const menuDropdowns = document.querySelectorAll('.menu-dropdown');
    menuDropdowns.forEach(function(dropdown) {
        dropdown.addEventListener('mouseover', function() {
            const subMenu = this.querySelector('ul');
            if (subMenu) subMenu.style.display = 'block';
        });

        dropdown.addEventListener('mouseout', function() {
            const subMenu = this.querySelector('ul');
            if (subMenu) subMenu.style.display = 'none';
        });
    });
});
