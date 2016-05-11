<?php  include "header.php" ; ?>
	<section class="spiral_section_tc section_with_header no_padding_bottom">
		<header>
			<div class="spiral_container">
				<h3>
					Default Toggles
				</h3>
			</div>
		</header>
		<div class="spiral_section_content">
			<div class="spiral_container">
				<div class=""><span class="spiral_pricebox_feature">
				<?php $result = select('events',' limit 5') ; 
							//echo $result ;
							while( $cat = mysql_fetch_array($result)){
					/* ---showing the recent added events and by click you can see the event as well.--*/ ?>
					<div class="spiral-accordion spiral-toggle" data-expanded="0">
						<h3>
							<?=$cat['event_cat'] ;?>
						</h3>
						</span>
						<div class="spiral-accordion-body">
							<h4><?=$cat['event_cat'] ;?></h4> <br> <?=$cat['event_name'] ;?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</section>
	
	
	<?php  include "footer.php" ; ?>