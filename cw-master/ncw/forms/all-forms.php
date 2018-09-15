<?php   include '../header.php'  ; ?>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>
<script>
	document.title="View Forms" ;
</script>
<div id="main-body">
  <div id="pbody">
		  <h1 id="pbody-head">FORMS</h1>
    <?php $sql = "SELECT society, link FROM form" ;
		$result = mysqli_query($db,$sql);
		echo '<table class="main-body-form">'  ;
			echo "<tr><th>SOCIETY</th><th>FORM LINK</th></tr>" ;
		while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
			echo '<tr>' ;
			echo '<td>' . $row['society'] . '</td>' ;
			echo	'<td><a id="form-link" href="' . $row['link'] . '">Go To Link</a></td>' ;
			echo '</tr>' ;
		}
		echo '</table>' ;
    ?>
  </div>
  <div id="btn">
    <ul>
      <li><a href="/ncw/home.php" class="button">HOME</a></li>
    </ul>
  </div>
</div>
<?php include '../footer.php' ; ?>
