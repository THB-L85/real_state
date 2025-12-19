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
    console.log(navBarLinks.style.display);
    
    navBarLinks.style.display = navBarLinks.style.display == "none" ? "flex" : "none";
}

function darkMode(){
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
    const toggleButton = document.querySelector('.dark-mode-boton').firstElementChild;
    console.log(toggleButton);
        
    // console.log(prefiereDarkMode.matches);

    if(prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
        toggleButton.src = 'src/img/brightness.png'
    } else {
        document.body.classList.remove('dark-mode');
        toggleButton.src = 'src/img/moon.png'

    }

    prefiereDarkMode.addEventListener('change', function() {
        if(prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        toggleButton.src = 'src/img/brightness.png'
        } else {
            document.body.classList.remove('dark-mode');
        toggleButton.src = 'src/img/moon.png'

        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function() {
        document.body.classList.toggle('dark-mode');
        console.log('toggle');
        
        // Cambiar imagen dependiendo de si está en modo oscuro
        if (document.body.classList.contains('dark-mode')) {
        console.log('toggle has dark');

            toggleButton.src = 'src/img/brightness.png'; // Imagen para modo oscuro
        console.log('dark', toggleButton);

        } else {
        console.log('toggle light');

            toggleButton.src = 'src/img/moon.png'; // Imagen para modo claro
        console.log('light', toggleButton);

        }

    });
}