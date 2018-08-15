window.onload = function() {
    var list = document.getElementById('list');
    var prev = document.getElementById('prev');
    var next = document.getElementById('next');

    function animate(offset) {
        var newLeft = parseInt(list.style.left) + offset;
        list.style.left = newLeft + 'px';
        if(newLeft<-440){
            list.style.left = -220 + 'px';
        }
        if(newLeft>-220){
            list.style.left = -440 + 'px';
        }
    }

    prev.onclick = function() {
        animate(220);
    }
    next.onclick = function() {
        animate(-220);
    }
}
