<div onclick="clicked(-1)">Previous</div>
<span id="test">--</span>
<button onclick="clicked(1)">next</button>
<script type="text/javascript">
var i = 0;
function clicked(n) {
    var img = document.getElementsByTagName("img");
    var test = document.getElementById("test");
    i = i + n;
    test.innerHTML = i;
};
window.onclick;
</script>