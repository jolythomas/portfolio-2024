function removeTruncateClass(button) {
    var parentDiv = button.parentElement;

    if(parentDiv.classList.contains('truncate')){
        parentDiv.classList.remove('truncate');
        button.innerHTML = "Voir moins"
    }
    else{
        parentDiv.classList.add('truncate');
        button.innerHTML = "Voir plus"
    }
}