<?php

$senaste_antal_nyheter = get_sub_field('senaste_antal_nyheter');
$senaste_nyhetsavsnittet_blid = get_sub_field('senaste_nyhetsavsnittet_blid');
$args = array(
	'post_type' => 'nyhet',
	'posts_per_page' => $senaste_antal_nyheter,
	'tax_query' => array(
		array(
			'taxonomy' => 'nyhetstyp',
			'field' => 'slug',
			'terms' => 'nyhet',
		)
	),

);
$senaste_nyheter = new WP_Query($args);
?>

<section class="mot_vara_studentavdelning home-section easyanimator clearfix">

	<div class="container">

		<div class="row">
			<div class="aspekter-entry col-12 p-2">
				<div class="senaste-nyhetsavsnittet_image_container float-right mb-4 col-md-6 col-12">
					<a href="/nyheter" title="Läs alla våra intervjuer"><img class="senaste-nyhetsavsnittet_image img-fluid z-depth-2 float-right"
					src="<?php echo $senaste_nyhetsavsnittet_blid['url'] ?>"
					alt="Nyhetsavsnittet blid"/></a></div>
					<div class="senaste-nyhetsavsnittet_container float-left col-md-6 col-12">
						<h2 class="section_title text-left pt-2 pb-2">Senaste nytt hos oss</h2>

						<?php if ($senaste_nyheter->have_posts()) : while ($senaste_nyheter->have_posts()) : $senaste_nyheter->the_post();
							$title = get_the_title();
							$permalink = get_the_permalink();
							?>

							<a href="<?php echo $permalink; ?>" title="<?php echo $title; ?> link">
								<h3
								class="nyheter_title card-title"><?php echo $title; ?></h3></a>
								<p class="publish_date"><?php echo get_the_date(); ?></p>
								<?php
                    // end the inner loop, no reset
							endwhile; endif;
							wp_reset_postdata();
							?>

							<p class="las-mer"><a href="/nyheter" title="Läs alla våra intervjuer">Gå in till vår nyhetsrum
								>></a></p>


							</div>




						</div>


					</div>
				</div>

			</section>