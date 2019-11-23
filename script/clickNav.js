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