<?php 
include "`../lib/connect.php";

if($_REQUEST['mode'] == "single")
{
	$feedid = $_REQUEST['feedid'];

	 $delsingle = "DELETE FROM ".TABLE_PREFIX."events WHERE e_id = '".$feedid."'";
	mysql_query($delsingle) or die(mysql_error());

}

?>
<div class="spiral-table spiral-table-alternative spiral-table-striped" id="tablesec">
						<table class="table table-striped table-bordered table-hover" id="sample_2">
							<tbody>
								<tr>
									<th>Category Name</th>
									<th>Event Name</th>
									<th>Description</th>
									<th>Occuring date</th>
									<th>Created date</th>
									<th>Status</th>
									<th>Delete</th>
								</tr>
								
								<?php $result = select('events',' limit 5') ; 
							//echo $result ;
							while( $cat = mysql_fetch_array($result)){
							/* ---showing the recent added events and by click you can see the event as well.*/ ?>
								<tr>
  								    <td><?=$cat['event_cat'] ;?></td>
									<td><?=$cat['event_name'] ;?></td>
									<td>NA</td>
									<td><?=$cat['event_date'] ;?></td>
									<td><?=$cat['event_cat'] ;?></td>
									<td><?=$cat['status'] ;?></td>
									<td><a onclick="deleteone(<?=$cat['e_id']?>)" data-toggle="modal" href="#" class="btn mini red">
									<button style="background-color:purple;" class="btn small">Delete</button>
									</a></td>
								</tr>
								<? } ?>
							</tbody>
						</table>
					</div>