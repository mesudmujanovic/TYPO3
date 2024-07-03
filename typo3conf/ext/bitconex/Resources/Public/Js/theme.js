document.addEventListener('DOMContentLoaded', function() {
    var elements = document.getElementsByClassName('name');
    for (var i = 0; i < elements.length; i++) {
        elements[i].addEventListener('click', function() {
            this.style.color = 'yellow';
        });
    }
});
