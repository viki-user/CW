<?php
error_reporting(0) ;
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
$sql = "SELECT ishosteller FROM user_info WHERE id = '$r'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$ishostel = $row['ishosteller'] ;
echo '<input id="hvalue" type="hidden" value="'.$ishostel.'">' ;
  include '../header.php'  ;
  ?>
  <script>
  	document.title="Submit Application" ;
  </script>
      <div id="main-body">
        <div id="pbodyapp">
        <span id=appspan>Application Type:</span><select>
          <option>-- SELECT ONE --</option>
          <option value="leave">LEAVE APPLICATION</option>
          <option id="hleave" value="hostel">HOSTEL LEAVE APPLICATION</option>
          <option value="apology">APOLOGY APPLICATION</option>
          <option value="attendence">UNDERTAKING FOR SHORT ATTENDENCE </option>
        </select>
        <div id="leave" class="leave options">
        <form method="POST" action="/ncw/scripts/validate_leave.php">
          <span class="lop">Date From <input type="date" class="leave-option" name="datef"></span>
          <span class="lop">Date To <input type="date" class="leave-option" name="datet"></span>
          <span class="lop">Reason <input type="text" class="leave-option" placeholder="reason for absence" name="reason" autocomplete="off"></span>
          <div id="btn">
            <ul>
              <li><input type="submit" class="button"></li>
              <li><a href="/ncw/home.php" class="button">HOME</a></li>
            </ul>
          </div>
          </form>
        </div>
        <div id="hostel" class="hostel options">
        <form method="POST" action="/ncw/scripts/validate_hostel_leave.php">
        <span class="lop">Date From <input type="date" class="leave-option" name="datef"></span>
        <span class="lop">Date To <input type="date" class="leave-option" name="datet"></span>
        <span class="lop">Reason <input type="text" class="leave-option" placeholder="reason for absence" name="reason" autocomplete="off"></span>
          <div id="btn">
            <ul>
              <li><input type="submit" class="button"></li>
              <li><a href="/ncw/home.php" class="button">HOME</a></li>
            </ul>
          </div>
          </form>
        </div>
        <div id="apology" class="apology options">
        <form method="POST" action="/ncw/scripts/validate_apology.php">
            <span class="lop">Reason <input type="text" class="leave-option" placeholder="reason of apology" name="reason" autocomplete="off"></span>
          <div id="btn">
            <ul>
              <li><input type="submit" class="button"></li>
              <li><a href="/ncw/home.php" class="button">HOME</a></li>
            </ul>
          </form>
        </div>
        </div>
        <div id="attendence" class="attendence options">
        <form method="POST" action="/ncw/scripts/validate_short_attendence.php">
            <span class="lop">Attendence Percentage <input type="text" class="leave-option" placeholder="%age of attendence" name="attend" autocomplete="off"></span>
          <div id="btn">
            <ul>
              <li><input type="submit" class="button"></li>
              <li><a href="/ncw/home.php" class="button">HOME</a></li>
            </ul>
          </div>
          </form>
        </div>
        </div>
      </div>

  <?php include '../footer.php' ?>

  <script type="text/javascript">
  $(document).ready(function(){
      $("select").change(function(){
          $(this).find("option:selected").each(function(){
              var optionValue = $(this).attr("value");
              if(optionValue){
                  $(".options").not("." + optionValue).hide();
                   $('#'+$(this).val()).fadeIn();
                  $("." + optionValue).show();
              } else{
                  $(".options").hide();
              }
          });
      }).change();
  });
  var a = document.getElementById("hvalue").value ;
  if(a==0){
    document.getElementById("hleave").style.display = "none" ;
    console.log(a) ;
  }
  </script>
