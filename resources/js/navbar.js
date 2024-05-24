const listItems = document.querySelectorAll('.list');

function activeLink(event) {
    event.preventDefault(); 

    
    listItems.forEach((item) => {
        item.classList.remove('active');
        item.querySelector('.indicator').classList.add('av');
        item.querySelector('.indicator').classList.remove('ovvis');
    });
    
    
    this.classList.add('active');
    const indicator = this.querySelector('.indicator');
    indicator.classList.remove('av');
    
    // Esperar a que termine la transición y luego agregar la clase 'ovvis'
    indicator.addEventListener('transitionend', function() {
        indicator.classList.add('ovvis');
    }, { once: true });
}

listItems.forEach((item) => {
    item.addEventListener('click', activeLink);
});