<?php
error_reporting(0) ;
function month($m)
{
	switch($m)
	{
		case 1: $m = 'January' ;
					break ;
		case 2: $m = 'Febuary' ;
						break ;
		case 3: $m = 'March' ;
						break ;
		case 4: $m = 'April' ;
					break ;
		case 5: $m = 'May' ;
						break ;
		case 6: $m = 'June' ;
						break ;
		case 7: $m = 'July' ;
					break ;
		case 8: $m = 'August' ;
						break ;
		case 9: $m = 'September' ;
						break ;
		case 10: $m = 'October' ;
						break ;
		case 11: $m = 'November' ;
							break ;
		case 12: $m =  'December' ;
							break ;
	}
	return $m ;
}
date_default_timezone_set('Asia/Kolkata');
$date = date('m d,Y');
$parts = explode(' ', $date) ;
$monthnum=$parts[0];
$m=month($monthnum) ;
$pdate= $m .' '. $parts[1] ;

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'ncw');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
session_start() ;
$usr= $_SESSION['login_user'] ;
$sql = "SELECT id FROM users WHERE username = '$usr' ";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$r = $row['id'] ;
$sql = "SELECT name, sem, year, rollno, branch, sec, mobno FROM user_info WHERE id = '$r'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$name = $row['name'] ;
$sem = $row['sem'] ;
$year = $row['year'] ;
$rno = $row['rollno'] ;
$branch = $row['branch'] ;
$sec = $row['sec'] ;
$smobi = $row['mobno'] ;

?>
<script>
	document.title="Hostel Leave" ;
</script>
<?php   include '../header.php'  ; ?>
<div id="main-body">
  <div id="pbody">
	<p class="main-body">
       To,<br>The HOD<br>KIET Group of institutions<br>Ghaziabad<br><br>Date:<?php echo ' '.$pdate ; ?><br><br>Subject: Hostel Leave Application
  </p>
	<p class="main-body">
    Hostel name:<?php echo $hname ;?>
  </p>
  <p class="main-body">
    Name:<?php echo $name ;?><br>
    Branch:<?php echo $branch ;?><br>
		Year:<?php echo $year ;?><br>
    Room No.:<?php echo $rmno ;?><br>
    Mobile no.(self):<?php echo $smobi ;?>
  </p>
  <p class="main-body">
    I want to go to my HOME/LG'S home due to <?php echo $_SESSION['reason'] ;?> from <?php echo $_SESSION['pdfrom'] ;?> to <?php echo $_SESSION['pdto'] ;?>.I have taken permission from my parents for doing so.
  </p>
	<p class="main-body">
    Address during Leave:<?php echo $addr ;?><br>
		Name & Phone No.:<?php echo $pname ;?>, <?php echo $pmobi ;?><br>
		Relationship with Student :<?php echo $relation ;?><br>
  </p>
	<p class="main-body">
    Warden Incharge of the floor:<?php echo $warden ;?>
  </p>
	 </div>
   <div id="btn">
 		<ul>
 			<li><button onClick="printapp('pbody')" class="button">PRINT</li></button>
 			<li><a href="/ncw/home.php" class="button">HOME</a></li>
 		</ul>
 	</div>
</div>
<?php   include '../footer.php'  ; ?>
<script>
function printapp(divName) {
  var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
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
}
</script>
