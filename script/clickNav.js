function clickNav(){
    console.log(document.getElementById("sidenav").style.width);
    if(document.getElementById("sidenav").style.width == "250px")
    {
        document.getElementById("sidenav").style.width = "0%";
    }
    else
    {
        document.getElementById("sidenav").style.width = "250px";
    }
}

var modal = document.getElementById("logpop");

// Get the button that opens the modal
var btn = document.getElementById("btn2");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}