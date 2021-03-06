<?php
/**
 * Template Name: Past Members 
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prime
 */

 ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php get_header();?>

<main>
    <div class="container">
		<article>
			<div class="row">
				<div class="col-lg-12">
				
					<?php if( get_field('lead_headline') ): ?>
						<div class="lead-section">
							<p class="lead">
								<?php the_field("lead_headline"); ?>
							</p>

							<?php if( get_field('lead_intro_text') ): ?>
								<?php the_field("lead_intro_text"); ?>
							<?php endif; ?>
						</div>
					<?php endif; ?>
					<?php the_content(); ?>
				</div>
			</div>
		<?php endwhile; endif; ?>

			<div class="row">
				<div class="col-lg-3">
					<select class="custom-select custom-select-lg mb-3 select-filter2">
						<option value="filter-all">View by Lab</option>
						<option value="filter-all">All Labs</option>
						<option value="filter-lab-ackermannlab">Ackermann Lab</option>
						<option value="filter-lab-bonhoefferlab">Bonhoeffer Lab</option>
						<option value="filter-lab-corderolab">Cordero Lab</option>
						<option value="filter-lab-gorelab">Gore Lab</option>
						<option value="filter-lab-hwalab">Hwa Lab</option>
						<option value="filter-lab-levinelab">Levine Lab</option>
						<option value="filter-lab-moranlab">Moran Lab</option>
						<option value="filter-lab-orphanlab">Orphan Lab</option>
						<option value="filter-lab-sauerlab">Sauer Lab</option>
						<option value="filter-lab-stockerlab">Stocker Lab</option>
					</select>
				</div>
				<div class="col-lg-3">
					<select class="custom-select custom-select-lg mb-3 select-filter3">
						<!-- Loop through custom taxonomy terms -->
						<option value="filter-area-all">View by Research Area</option>
						<option value="filter-all">All Research Areas</option>
						<option value="filter-physiology">Physiology</option>
						<option value="filter-communities">Communities</option>
						<option value="filter-behavior">Behavior</option>
						<option value="filter-modeling">Modeling</option>
					</select>
				</div>

				<div class="col-lg-3">
				</div>
				
				<div class="col-lg-3">
				</div>
			</div>
			
			<div class="row">


			
						<?php $args = array(
							'post_type' => array( 'profiles' ),
							'numberposts' => -1,	
							'orderby'        => 'last_name',
							'order'          => 'ASC'
						);

						// The Query
						$query = new WP_Query( $args ); ?>

						<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>

						

							<div class="col-md-6 filter-content-single 

							<?php if( !get_field('past_member') ) { ?>
									hide-content 
								<?php } ?>

								<?php $hasterms = get_the_term_list( get_the_ID(), 'research_areas'); ?>

								<?php if( $hasterms) { ?>
					
									<?php foreach ( get_the_terms( get_the_ID(), 'research_areas' ) as $tax ) {
										echo 'filter-' . strtolower($tax->name); 
									} ?>
								<?php } ?>

								<?php $authornme = get_the_title();
								$nameclass = strtolower(str_replace(' ', '', $authornme)); ?>

								filter-author-<?php echo $nameclass; ?>


								<?php $labname = get_field("lab"); 
								$labnameclass = strtolower(str_replace(' ', '', $labname)); ?>
								?>

								filter-lab-<?php echo $labnameclass; ?>

								filter-all
							
							
							
							">
								<div class="bio">
									<a href="<?php the_permalink(); ?>" class=" bio-headshot">
										<img src="<?php the_field("photo"); ?>" alt="" class="img-fluid" alt="<?php the_title(); ?>">
									</a>

									<div class="bio-details">
										<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
										<p><?php the_field("role_or_title"); ?></p>

										<p>
											<strong>Location: </strong><?php the_field("location"); ?><br>
											<strong>Lab: </strong><?php the_field("lab"); ?>
										</p>

										<?php $hasterms = get_the_term_list( get_the_ID(), 'research_areas'); ?>

										<?php if( $hasterms) { ?>
											<p><strong>Research Areas: </strong> 
												<?php foreach ( get_the_terms( get_the_ID(), 'research_areas' ) as $tax ) {
													echo '<span>' . __( $tax->name ) . '</span> ';
												} ?>
											</p>
										<?php } ?>

									</div>
								</div>
							</div>
					
						<?php endwhile; endif; ?>
						<?php wp_reset_postdata(); ?>

				
				</div>

			</div>
		</div>
	</article>
</main>
	


	
<?php get_footer(); ?>