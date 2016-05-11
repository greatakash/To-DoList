<?php include("header.php") ;
?>
	<section class="spiral_section_tc no_padding_bottom">
		<div class="spiral_section_content">
			<div class="spiral_container">
				<div class="spiral_column_tc_span12">
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
				</div>
			</div>
		</div>
	</section>
		<script>
		/********************Delete****************/
	function deleteone(id)
	{  //alert("kkk") ;
	     var cnf = confirm("Are you sure to delete?");
		
		if(cnf)
		{
			$('.portlet .tools a.reload').click();
			$.post('ajax/delevent.php',{ feedid : id, mode : 'single' },
				function(data)
				{//deletecinematic
					$('#tablesec').html(data);
					/************************************ Table JS ************************************/
					$('#sample_2').dataTable({
						"aLengthMenu": [
							[5, 15, 20, -1],
							[5, 15, 20, "All"]
						],
						// set the initial value
						"iDisplayLength": 15,
						"sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
						"sPaginationType": "bootstrap",
						"oLanguage": {
							"sLengthMenu": "_MENU_ records per page",
							"oPaginate": {
								"sPrevious": "Prev",
								"sNext": "Next"
							}
						},
						"aoColumnDefs": [{
							'bSortable': false,
							'aTargets': [0]
						}]
					});
					
					jQuery('#sample_2 .group-checkable').change(function () {
						var set = jQuery(this).attr("data-set");
						var checked = jQuery(this).is(":checked");
						jQuery(set).each(function () {
							if (checked) {
								$(this).attr("checked", true);
							} else {
								$(this).attr("checked", false);
							}
						});
						jQuery.uniform.update(set);
					});
					
					var test = $("input[type=checkbox]:not(.toggle), input[type=radio]:not(.toggle, .star)");
					if (test) {
						test.uniform();
					}
					
					$(".chosen").chosen();
					
					/************************************ Table JS ************************************/
				}
			);
		}
	}
	</script>
<?php include("footer.php") ; ?>