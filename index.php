<?php include "header.php" ; 
 if(isset($_REQUEST['modal_sub'])){
 $cat = $_REQUEST['new_cat'];
$insert = "insert into ".TABLE_PREFIX."events set event_name='".$_REQUEST['new_event']."',
                                                  event_cat='".$cat."',
												  Event_des= '".$_REQUEST['new_des']."',
												  event_date= '".$_REQUEST['event_date']."',
												  event_created= NOW(),
												  status='Yes'";
mysql_query($insert); 

$_SESSION["cat_eve"] = "New Event added" ;
 
 header("location:index.php?event=added") ; }
 
?>

	<section class="spiral_section_tc">
		<div class="spiral_section_content">
			<div class="spiral_container">
			<?php  if(isset($_SESSION["cat_eve"]) != ''){
			  ?>
			<div class="spiral_alert_success" id="alert_clo">
										<i class="ci_icon-check"></i><strong>Success!</strong> <?=$_SESSION["cat_eve"] ; ?>
										<a class="spiral_alert_box_close" onclick="document.getElementById('alert_clo').style.display='none'"  title="Close"><i class="ci_icon-close"></i></a>
									</div> <br/>
						<?php 	//unset($_SESSION["cat_eve"]) ; 
						} ?>			
				
				<div class="spiral_column_tc_span4">
					<div class="spiral_pricing-table-2 spiral_pricing-table-dark ">
						<div class="spiral_plan spiral_plan5">
							<div class="spiral_pricebox_header">
								<span class="spiral_pricebox_name">Your Categories</span>
								<div class="spiral_pricebox_info">
									<span class="spiral_pricebox_currency"></span>
									
								</div>
							</div>
							<span class="spiral_pricebox_feature"><strong></strong>
							<?php  $sel = "select * from ".TABLE_PREFIX."categ order by cat_id desc limit 5" ; 
							
							$result = mysql_query($sel) ;
							while( $cat = mysql_fetch_array($result)){
							/* ---showing the recent added events and by click you can see the event as well.*/ ?>
<ul class="tab">
  <li><a href="#" class="tablinks" ><?=$cat['cat_name'] ;?></a></li>
  </ul>
  
</span>
 <? } ?>
							<div class="spiral_pricebox_feature spiral_pricebox_feature_button">
								<a href="see-all.php" target="_self" class="spiral-button_light spiral-button_rounded ripplelink spiral-button_small">See All
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a><button id="myBtn2">Add More</button>
							</div>
						</div>
					</div>
				</div>
				<div class="spiral_column_tc_span4">
					<div class="spiral_pricing-table-2 spiral_pricing-table-red spiral_popular-plan ">
						<div class="spiral_plan spiral_plan6 spiral_popular-plan">
							<div class="spiral_pricebox_header">
								<span class="spiral_pricebox_name">Upcoming Events(d-m-y)</span>
								<div class="spiral_pricebox_info">
									<span class="spiral_pricebox_currency"></span>
									
								</div>
							</div>
							<?php $result = select('events',' order by e_id desc limit 5') ; 
							//echo $result ;
							while( $cat = mysql_fetch_array($result)){
							/* ---showing the recent added events and by click you can see the event as well.*/ ?>
							<span class="spiral_pricebox_feature"><strong><i class="ci_icon-check" ></i>
							</strong> <?=$cat['event_name'] ;?> &nbsp;on&nbsp; <?=date('d-m-y',strtotime($cat['event_date'])) ;?>
                                 </span> 
							<?php    }  ?>
					<!-- <span class="spiral_pricebox_feature"><strong><i class="ci_icon-close"></i></strong> <div id="txt"></div>
							</span> -->
							
							<div class="spiral_pricebox_feature spiral_pricebox_feature_button">
								<a href="see-all.php" target="_self" class="spiral-button spiral-button_light spiral-button_rounded ripplelink spiral-button_large">See All
									<i class="fa fa-eye"></i>
								</a>
								<button id="myBtn">Add More</button>
							</div>
						</div>
					</div>
				</div>
				<div class="spiral_column_tc_span3">
					<div class="spiral_pricing-table-2 spiral_pricing-table-dark ">
						<div class="spiral_plan spiral_plan7">
							<div class="spiral_pricebox_header">
								<span class="spiral_pricebox_name">Tomorrow To-Do</span>
								<div class="spiral_pricebox_info">
									<span class="spiral_pricebox_currency"></span>
								</div>
							</div>
							<span class="spiral_pricebox_feature"><strong></strong> <canvas id="canvas" width="190" height="200"
style="background-color:#333">
</canvas>
</span>
						
							<div class="spiral_pricebox_feature spiral_pricebox_feature_button">
								<a href="#" target="_self" class="spiral-button spiral-button_light spiral-button_rounded ripplelink spiral-button_large">See All
									<i class="fa fa-eye" aria-hidden="true"></i>

								</a>
							</div>
						</div>
					</div>
				</div>
				
				<div class="spiral_column_tc_span1"></div>
			</div>
		</div>
		
<!-- ---modal to add category----- -->
<div id="myModal2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <a href="#" style="float:right"onclick="document.getElementById('myModal2').style.display='none'"  title="Close"><i class="ci_icon-close"></i></a>
      <h2>Add New Category</h2>
    </div>
    <div class="modal-body">
      <p><form action="addcat_action.php" method="post" enctype="multipart/form-data">
	  <label><h4>Add Category</h4></label>
	  <input type="text" name="new_cat" class="span6"/>
	  </p>
    </div>
    <div class="modal-footer">
      <h3><button type="submit" value="cat_sub" name="cat_sub">Submit</button></h3>
	  </div> </form>
  </div>
</div>		
		<!-- The Modal for adding event -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">×</span>
      <h2>Add New Event</h2>
    </div>
    <div class="modal-body">
      <p><form action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
	  <label><h4>Add Category</h4></label>
	  <select name="new_cat" class="span6">
	  <?php $result = mysql_query("select * from ".TABLE_PREFIX."categ") ; 
							while( $cat = mysql_fetch_array($result)){
							 ?>
	  <option value="<?=$cat['cat_id'];?>"> <?=$cat['cat_name'] ;?> </option>
	  <?php } ?>
	  </select>
	  <label><h4>Add Event </h4></label>
	  <input type="text" name="new_event" class="span6"/>
	  <label><h4>Event Description </h4></label>
	  <input type="text" name="new_des" class="span6"/>
<label><h4>Add Event Date</h4></label>
	  <input type="date" name="event_date" class="span6" placeholder="yyyy-mm-dd" onblur="isRealDate()"/>	  
	  </p>
    </div>
    <div class="modal-footer">
      <h3><button type="submit" value="sub" name="modal_sub">Add Event</button></h3>
	  </div> </form>
  </div>

</div>


	</section>
	
	<script>
	/*  ---------check date validation */
	function isRealDate($date) 
{ 
    if (false === strtotime($date)) 
    { 
        return false;
    } 
    else
    { 
        list($year, $month, $day) = explode('-', $date); 
        if (false === checkdate($month, $day, $year)) 
        {  alert("Your date format is wrong") ;
            return false;
        } 
    } 
    return true;
}
/*  --------- */
	//get tab contents
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tabcontent.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}
/*modal for adding category starts */
var modal2 = document.getElementById('myModal2');
var btn2 = document.getElementById("myBtn2");
btn2.onclick = function() {
    modal2.style.display = "block";
}
/*modal for adding category ends */
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script>
// getting the clock
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>

	<?php include "footer.php" ; ?>