const modal = document.getElementById('id01');
const modal2 = document.getElementById('id02');
const modal3 = document.getElementById('uploadForm');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event){
    if(event.target == modal){
        modal.style.display = "none";
    }
    if(event.target == modal2){
        modal2.style.display = "none";
    }
    if(event.target == modal3){
        modal3.style.display = "none";
    }
};