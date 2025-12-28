document.addEventListener('DOMContentLoaded', function (){
    darkMode();
    eventListeners();
})

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-icon-menu');
    mobileMenu.addEventListener('click', openMenu);   
}

function openMenu(){
    const navBarLinks = document.querySelector('.navbar-links')
    navBarLinks.classList.toggle('show-menu');
    const navBar = document.querySelector('.navbar');
    navBar.classList.toggle('navbar-mobile-show');
}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    const botonDarkMode = document.querySelector('.dark-mode-boton');
    const toggleButton = botonDarkMode.firstElementChild;

    // 1️⃣ Cargar preferencia guardada
    const themeGuardado = localStorage.getItem('theme');

    if (themeGuardado === 'dark') {
        document.body.classList.add('dark-mode');
        toggleButton.src = '/src/img/brightness.png';
    } else if (themeGuardado === 'light') {
        document.body.classList.remove('dark-mode');
        toggleButton.src = '/src/img/moon.png';
    } else {
        // 2️⃣ Si no hay preferencia guardada, usar la del sistema
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
            toggleButton.src = '/src/img/brightness.png';
        } else {
            document.body.classList.remove('dark-mode');
            toggleButton.src = '/src/img/moon.png';
        }
    }

    // 3️⃣ Cambios del sistema SOLO si el usuario no eligió manualmente
    prefiereDarkMode.addEventListener('change', function () {
        if (!localStorage.getItem('theme')) {
            if (prefiereDarkMode.matches) {
                document.body.classList.add('dark-mode');
                toggleButton.src = '/src/img/brightness.png';
            } else {
                document.body.classList.remove('dark-mode');
                toggleButton.src = '/src/img/moon.png';
            }
        }
    });

    // 4️⃣ Click del usuario (guarda preferencia)
    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');

        if (document.body.classList.contains('dark-mode')) {
            toggleButton.src = '/src/img/brightness.png';
            localStorage.setItem('theme', 'dark');
        } else {
            toggleButton.src = '/src/img/moon.png';
            localStorage.setItem('theme', 'light');
        }
    });
}
