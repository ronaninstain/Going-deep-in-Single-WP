<?php

/**
 * The template for displaying Course font
 *
 * Override this template by copying it to yourtheme/course/single/front.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.0
 */

if (!defined('ABSPATH')) exit;
global $post;
$id = get_the_ID();

do_action('wplms_course_before_front_main');


?>

<div class="course_title">
	<?php vibe_breadcrumbs(); ?>
	<?php echo '<h4>';
	the_title();
	echo '</h4>';
	?>

	<?php
	$short_heading = get_field('sub_heading');
	$short_des = get_field('short_heading');
	$Cert_head_des = get_field('certificate_description');
	$cert_feature_list_heading = get_field('cert_feature_heading');
	$sample_cert_heading = get_field('sample_cert_heading');
	$sample_certificate = get_field('sample_certificate');
	$final_cert_des = get_field('cert_final_des');
	$what_to_learn_heading = get_field('what_you_will_learn_heading');
	$what_to_learn_image = get_field('the_what_you_will_learn_image');
	$cpd_heading = get_field('the_cpd_main_heading');

	?>

	<h6><b><?php echo $short_heading; ?></b></h6>
	<h6><?php echo $short_des; ?></h6>
</div>
<?php
do_action('wplms_before_course_description');
?>

<?php $author_id = get_the_author_meta('ID');
$author_name = get_the_author_meta('display_name', $author_id);
$author_link = get_author_posts_url($author_id);
?>
<div class="course-publisher-and-start-btn">
	<div class="publisher">
		<span><?php echo get_avatar($author_id); ?></span>
		<h6>Course Publisher</br> <?php echo '<a href="' . $author_link . '">' . $author_name . '</a>'; ?></h6>
	</div>
	<div class="the-start-btn">
		<?php the_course_button(); ?>
	</div>
</div>

<div class="the-what-you-will-learn">
	<h4><?php echo $what_to_learn_heading ?></h4>

	<ul class="what-you-will-learn-list">
		<?php
		// check if the repeater field has rows of data
		if (have_rows('the_learning_list')) :
			// loop through the rows of data
			while (have_rows('the_learning_list')) : the_row();

		?>
				<li>
					<i class="fa fa-check-circle" aria-hidden="true"></i>
					<?php the_sub_field('the_learning_list_items'); ?>
				</li>
		<?php
			endwhile;
		else :
		// no rows found
		endif;
		?>

	</ul>

	<div class="for-absolute">
		<img src="<?php echo $what_to_learn_image; ?>" alt="">
	</div>
</div>

<div class="the-Tab-functional">
	<ul class="nav nav-tabs">
		<li class="active"><a data-toggle="tab" href="#menu0">Course Modules</a></li>
		<li><a data-toggle="tab" href="#menu1">Course Description</a></li>
		<li><a data-toggle="tab" href="#menu2">Alison Certificates</a></li>
	</ul>

	<div class="tab-content">
		<div id="menu0" class="tab-pane fade in active">
			<?php
			do_action('wplms_after_course_description');
			?>
		</div>
		<div id="menu1" class="tab-pane fade">
			<?php
			the_content();
			?>
			<div class="course-des-ali-btn">
				<?php the_course_button(); ?>
			</div>
		</div>
		<div id="menu2" class="tab-pane fade">
			<p>
				<?php echo $Cert_head_des; ?>
			</p>

			<h6><b><?php echo $cert_feature_list_heading; ?></b></h6>

			<ul class="cert-offers-ali">
				<?php
				// check if the repeater field has rows of data
				if (have_rows('certificate_features')) :
					// loop through the rows of data
					while (have_rows('certificate_features')) : the_row();
				?>
						<li>
							<img src="<?php echo get_theme_file_uri() . '/assets/img/tick.svg'; ?>" alt="img" />
							<?php the_sub_field('certificate_features_list'); ?>
						</li>
				<?php
					endwhile;
				else :
				// no rows found
				endif;
				?>

			</ul>

			<hr>

			<div class="the-div-sshowing-sample-cert-and-its-des">
				<div class="the-des-ali">
					<h5><?php echo $sample_cert_heading; ?></h5>

					<ol>
						<?php
						if (have_rows('sample_cert_description')) :
							while (have_rows('sample_cert_description')) : echo '<li>';
								the_row();
								the_sub_field('cert_description_items');
								echo '</li>';
							endwhile;
						else :
						// no rows found
						endif;
						?>
					</ol>
				</div>
				<div class="the-cert-img-btn different-btn-ali">
					<img src="<?php echo $sample_certificate; ?>" alt="">
					<?php the_course_button(); ?>
				</div>
			</div>

			<p>
				<?php echo $final_cert_des; ?>
			</p>

		</div>
	</div>

</div>

<div class="course-categories-div">
	<div class="catgories-starting-heading">
		<i class="fa fa-lightbulb-o" aria-hidden="true"></i>
		<h4>Knowledge & Skills You Will Learn</h4>
	</div>

	<?php
	$course_id = get_the_ID();
	$terms = get_the_terms($course_id, 'coursetag');
	if (!empty($terms) && !is_wp_error($terms)) {
		echo '<ul class="course-tags">';
		foreach ($terms as $term) {
			$term_link = get_term_link($term);
			echo '<li><a href="' . esc_url($term_link) . '">' . $term->name . '</a></li>';
		}
		echo '</ul>';
	}
	?>

</div>

<div class="ali-cpd-cert-div">
	<div class="the-ali-cpd-head">
		<h3><?php echo $cpd_heading; ?></h3>
	</div>
	<div class="the-ali-cpd-item-list-and-img-div">
		<div class="ali-itmes-list-imgs">
			<?php if (have_rows('the_actual_fields')) : ?>
				<ul>
					<?php while (have_rows('the_actual_fields')) : the_row();
						// vars
						$cpd_image = get_sub_field('the_feature_list_image');
						$cpd_heading = get_sub_field('the_cpd_list_heading');
						$cpd_description = get_sub_field('the__cpd_list_des');
					?>
						<li>
							<img src="<?php echo $cpd_image['url']; ?>" alt="<?php echo $cpd_image['alt'] ?>" />
							<div class="for-flexing-cpd-list-head-des">
								<h3><?php echo $cpd_heading; ?></h3>
								<p><?php echo $cpd_description; ?></p>
							</div>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php endif; ?>

		</div>
		<div class="the-cert-img-btn  different-btn-ali">
			<img src="<?php echo $sample_certificate; ?>" alt="">
			<?php the_course_button(); ?>
		</div>

	</div>
</div>

<div class="course_reviews">
	<?php
	comments_template('/course-review.php', true);
	?>
</div>
<?php
