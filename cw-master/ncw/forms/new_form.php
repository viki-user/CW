<?php   include '../header.php'  ; ?>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
<script>
	document.title="New Form" ;
</script>
<div id="main-body">
  <div id="pbody">
    <h1 id="pbody-head">DROP FORM</h1>
    <form method="POST" action="/ncw/scripts/submit-form.php" id="formsubmit">
			<span class="lop"><input type="text" class="leave-option-1" placeholder="Name of Society" name="society" autocomplete="off"></span>
      <textarea class="main-body-textarea" rows="10" cols="98" name="form-link" form="formsubmit" placeholder="Enter Link Here..."></textarea>
  </div>
  <div id="btn">
    <ul>
      <li><input type="submit" class="button"></li>
      <li><a href="/ncw/home.php" class="button">HOME</a></li>
    </ul>
  </div>
    </form>
</div>
<?php include '../footer.php' ; ?>
