<?php
error_reporting(0) ;

// if(!isset($_SESSION['login_user']))
// {
//     header("location: /ncw/index.php");
// }
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
$sql = "SELECT name, sem, year, rollno, branch, sec FROM user_info WHERE id = '$r'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$name = $row['name'] ;
$sem = $row['sem'] ;
$year = $row['year'] ;
$rno = $row['rollno'] ;
$branch = $row['branch'] ;
$sec = $row['sec'] ;

?>
<script>
	document.title="Leave Application" ;
</script>
<?php   include '../header.php'  ; ?>
<div id="main-body">
<div id="pbody">
	<p class="main-body">
		To,<br>The HOD<br>KIET Group Of Institution<br>Ghaziabad<br><br>Date:<?php echo ' '.$pdate ; ?><br><br>Subject: Regarding Leave Form College.
	</p>
	<p class="main-body">
		Sir,<br>With Due respect, I <?php echo $name.' ' ?> want to say that i will not be able to attend my classes form <?php echo $_SESSION['pdfrom'] ; ?> to <?php echo $_SESSION['pdto'] ; ?> due to <?php echo $_SESSION['reason'] ; ?>
	</p>
	<p class="main-body">
		I request you to kindly grant me leave for the above said period. I will be thankful to you.
	</p>
	<p class="main-body">
		Thanking You<br>Yours Sincerely<br>
	</p>
	<p class="main-body">
		<?php echo $name ; ?><br>
		( <?php echo $branch ; ?> )
		( <?php echo $year ; ?> ) <br>( <?php echo $sec ; ?> )
		( <?php echo $rno ; ?> )
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
