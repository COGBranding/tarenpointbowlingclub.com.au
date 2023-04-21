<?php

function countdown_timer($atts){
	extract( shortcode_atts(
        array(
            'id' => '',
        ), $atts )
    );
	if($id){
		$tz = 'Australia/Sydney';
		$timestamp = time();
		$dt = new DateTime("now", new DateTimeZone($tz)); //first argument "must" be a string
		$dt->setTimestamp($timestamp); //adjust the object to correct timestamp
		$date =  $dt->format('Y-m-d H:i:s');

		$args = array(
			'post_type' => 'draws',
			'p' => $id,
		);

		$the_query = new WP_Query( $args );
		ob_start();
		?>
			<div class="countdown-timer" id="countdown-timer">
					<?php if ( $the_query->have_posts() ):
							while ( $the_query->have_posts() ) : $the_query->the_post();
									$draw_end = '';
									$prev_date = '31500000';
									if(have_rows('draw_end_date_repeater')):
										while(have_rows('draw_end_date_repeater')): the_row();
											if(get_sub_field('draw_end_date') > $date && get_sub_field('draw_end_date') < $prev_date ){
												$draw_end = get_sub_field('draw_end_date');
												$prev_date = get_sub_field('draw_end_date');
											}
									endwhile;
									else:
									endif;
									?>
									<div class="countdown-timer__nextDrawDate">
											<p id="countdown-timer__nextDrawDate--text" class="countdown-timer__nextDrawDate--text">NEXT DRAW: <?php echo date("F jS, Y", strtotime($draw_end));?></p>
									</div>
									<div class="countdown-timer__counter">
											<div class="countdown-timer__counter--div countdown-timer__counter--days"><p class="countdown-timer__counter--days-number countdown-timer__counter--number" id="countdown-timer__counter--days-number"></p><p class="countdown-timer__counter--days-label">Day(s)</p></div>
											<div class="countdown-timer__counter--div countdown-timer__counter--hours"><p class="countdown-timer__counter--hours-number countdown-timer__counter--number" id="countdown-timer__counter--hours-number"></p><p class="countdown-timer__counter--hours-label">Hour(s)</p></div>
											<div class="countdown-timer__counter--div countdown-timer__counter--minutes"><p class="countdown-timer__counter--minutes-number countdown-timer__counter--number" id="countdown-timer__counter--minutes-number"></p><p class="countdown-timer__counter--minutes-label">Minute(s)</p></div>
											<div class="countdown-timer__counter--div countdown-timer__counter--seconds"><p class="countdown-timer__counter--seconds-number countdown-timer__counter--number" id="countdown-timer__counter--seconds-number"></p><p class="countdown-timer__counter--seconds-label">Second(s)</p></div>
									</div>


											<script>
											var countDownDate = <?php echo strtotime($draw_end) ?> * 1000;
											var now = <?php echo  strtotime($date) ?> * 1000;

											// Update the count down every 1 second
											var x = setInterval(function() {

												now = now + 1000;

												// Find the distance between now an the count down date
												var distance = countDownDate - now;

												// Time calculations for days, hours, minutes and seconds
												var days = Math.floor(distance / (1000 * 60 * 60 * 24));
												var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
												var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
												var seconds = Math.floor((distance % (1000 * 60)) / 1000);

												// Output the result in the element
												days = (days < 10)? "0" + days : days;
												document.getElementById("countdown-timer__counter--days-number").innerHTML = days;
												document.getElementById("countdown-timer__counter--hours-number").innerHTML = ('0' + hours).slice(-2);
												document.getElementById("countdown-timer__counter--minutes-number").innerHTML = ('0' + minutes).slice(-2);
												document.getElementById("countdown-timer__counter--seconds-number").innerHTML = ('0' + seconds).slice(-2);

												if (distance < 0) {
													clearInterval(x);
													location.reload();
												}
											}, 1000);
											</script>

									<?php
							endwhile;	
						else: 
						endif;
					?>
			</div>


		<?php
		return ob_get_clean();
	}
}

add_shortcode('countdown_timer', 'countdown_timer');