<?php

?>

</div>
<div id="footer" align="center">
	<img src="/ncw/images/drawfstar.png"><span><p>This site is Designed and Maintained by <strong>Pratishtha Tiwari</strong> & <strong>Harsh Rawat</strong>.<br>Contact @ <em> pratishtha60@gmail.com </em> & <em> harshrawat66@gmail.com</em> </em>.</p></span>
</div>
</body>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  }
}
</script>
</html>
