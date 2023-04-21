<?php

function home_slider_cb(){
	$args = array(
		'post_type' => 'hero-slider'
	);
	$the_query = new WP_Query( $args ); 
	ob_start(); ?>
		<div class="homepage-sliders" id="homepage-sliders">
				<script>
				// Slick slider
				jQuery(function ($) {
					$(".slider-hero.desktop_slide_wrapper").slick({
						slidesToShow: 1,
						slidesToScroll: 1,
						autoplay: true,
						autoplaySpeed: 8000,
						dots: false,
						fade: true,
						prevArrow:$('.prev-slide'),
						nextArrow:$('.next-slide'),
					});
					$(".slider-hero.mobile_slide_wrapper").slick({
						slidesToShow: 1,
						slidesToScroll: 1,
						autoplay: true,
						autoplaySpeed: 8000,
						dots: false,
						fade: true,
						prevArrow:$('.mob-prev-slide'),
						nextArrow:$('.mob-next-slide'),
					});
				});
			</script>
			<div class="slider-hero desktop_slide_wrapper">
				<?php 
				if ( $the_query->have_posts() ):
					while ( $the_query->have_posts() ) : $the_query->the_post();
								$id = get_the_ID();	
								$desktopImage = get_field('desktop_image', $id);
								$mobileImage = get_field('mobile_image', $id);
								$url = get_field('redirect_url', $id);
							?>

							<div class="desktop_slide">
								<a href="<?php echo $url?>" target="_blank">
									<img class="desktop_image" src="<?php echo $desktopImage?>" />
								</a>
							</div>
						<?php
						endwhile;
					else: 
				endif; ?>
				
			</div>
			
			<div class="slider-hero mobile_slide_wrapper">
				<?php 
				if ( $the_query->have_posts() ):
					while ( $the_query->have_posts() ) : $the_query->the_post();
								$id = get_the_ID();	
								$mobileImage = get_field('mobile_image', $id);
								$url = get_field('redirect_url', $id);
							?>

							<div class="mobile_slide">
								<a href="<?php echo $url?>" target="_blank">
									<img class="mobile_image" src="<?php echo $mobileImage?>" />
								</a>
							</div>
						<?php
						endwhile;
					else: 
				endif; ?>
			</div>
			<div class="prev-slide"></div>
			<div class="next-slide"></div>
			<div class="mob-prev-slide"></div>
			<div class="mob-next-slide"></div>
		</div>

		
	<?php
	return ob_get_clean();
}

add_shortcode('get_slides', 'home_slider_cb');