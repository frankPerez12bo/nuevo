document.addEventListener('DOMContentLoaded', function() {
    const images = document.querySelectorAll('img.hidden');

    // Función que verifica si un elemento está en la ventana visible
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    // Función que maneja el scroll
    function onScroll() {
        images.forEach(image => {
            if (isInViewport(image)) {
                image.classList.add('show');
                image.classList.remove('hidden');
            } else {
                image.classList.add('hidden');
                image.classList.remove('show');
            }
        });
    }

    // Agregar event listeners para scroll y resize
    document.addEventListener('scroll', onScroll);
    window.addEventListener('resize', onScroll); // Para manejar el cambio de tamaño de la ventana
    onScroll(); // Verificación inicial en caso de que alguna imagen ya esté visible
});