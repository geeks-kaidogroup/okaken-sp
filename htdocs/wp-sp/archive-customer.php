<?php include_once('header.php'); ?>
	<section class="l-contents">
		<section class="l-page-customer">
			<h2><img src="assets/img/page/real-voice/voice_headline.png" width="600" height="151" alt="本当のお客様の声"></h2>
			<?php
				$my_query = new WP_Query(
					array(
						'post_type' => 'customer',
						'posts_per_page' => 3,
						'post_status' => 'publish',
						'order'=>'DESC',
						'orderby'=>'date',
					)
				);
				while ($my_query->have_posts()) : $my_query->the_post();
			?>
			<div class="customer-box">
				<p class="customer-name"><?php echo get_post_meta($post->ID,'address-customer',true); ?></p>
				<div class="inner-customer-box">
					<div class="customer-img">
						<?php echo wp_get_attachment_image(get_post_meta($post->ID,"image-customer",true),array(550,290)); ?>
					</div>
					<div class="customer-voice">
						<h3 class="customer-voice-title"><?php the_title(); ?></h3>
						<p><?php echo get_post_meta($post->ID,'message-customer',true); ?></p>
					</div>
				</div>
			</div>
			<?php endwhile; ?>
			<?php wp_reset_query(); ?>
		</section>
<?php include_once('footer.php'); ?>
