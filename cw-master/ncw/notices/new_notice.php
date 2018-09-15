<?php   include '../header.php'  ; ?>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
<script>
	document.title="New Notice" ;
</script>
<div id="main-body">
  <div id="pbody">
    <h1 id="pbody-head">DROP NOTICE</h1>
    <form method="POST" action="/ncw/scripts/submit-notice.php" id="noticeform">
      <textarea class="main-body-textarea" rows="10" cols="100" name="notice-body" form="noticeform" placeholder="Enter Notice Here..."></textarea>
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
