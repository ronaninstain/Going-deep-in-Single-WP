<?php

if (!defined('ABSPATH')) exit;
$id = vibe_get_bp_page_id('course');


?>

<section class="ali-all-course-top-ad">
	<div class="the-actual-top-add">
		<img src="<?php echo get_theme_file_uri(); ?>/assets/img/all-course-top-ad.png" alt="">
	</div>
</section>

<section class="ali-controling-the-top-sec-all-course">
	<?php do_action('wplms_before_title'); ?>
	<div class="<?php echo vibe_get_container(); ?>">
		<div class="row">
			<div class="col-md-12">
				<div class="for-first-flexing">
					<div class="pagetitle">
						<?php
						if (is_tax()) {
							echo '<h1>';
							single_cat_title();
							echo '</h1>';
							echo do_shortcode(category_description());
						} else {
							echo '<h1>' . vibe_get_title($id) . '</h1>';
							the_sub_title($id);
						}
						?>
						<div class="dir-search" role="search">
							<?php bp_directory_course_search_form(); ?>
						</div><!-- #group-dir-search -->
					</div>
					<div class="content-right-img">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/img/diploma.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="the-ali-categories">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="the-actual-categories-div center">
					<?php
					$args = array(
						'taxonomy' => 'course-cat',
						'hide_empty' => false
					);
					$categories = get_terms($args);
					if (!empty($categories)) {
						echo '<ul>';
						foreach ($categories as $category) {
							// $count = $category->count;
							$category_link = get_term_link($category);
							echo '<li>' . '<a href="' . esc_url($category_link) . '">' . $category->name . '</li>';
						}
						echo '</ul>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="content" class="ali-all-course-controling-content">
	<div id="buddypress" class="directory5">
		<div class="<?php echo vibe_get_container(); ?>">

			<?php do_action('bp_before_directory_course_page'); ?>

			<div class="padder">

				<?php do_action('bp_before_directory_course'); ?>
				<div class="row">
					<div class="col-md-12">
						<form action="" method="post" id="course-directory-form" class="dir-form">

							<?php do_action('bp_before_directory_course_content'); ?>

							<?php do_action('template_notices'); ?>

							<?php if (current_user_can('administrator')) : ?>
								<div class="item-list-tabs" role="navigation">
									<ul>
										<li class="selected" id="course-all"><a href="<?php echo trailingslashit(bp_get_root_domain() . '/' . bp_get_course_root_slug()); ?>"><?php printf(__('All Courses <span>%s</span>', 'vibe'), bp_course_get_total_course_count()); ?></a></li>
										<?php if (is_user_logged_in()) : ?>
											<li id="course-personal"><a href="<?php echo trailingslashit(bp_loggedin_user_domain() . bp_get_course_slug()); ?>"><?php printf(__('My Courses <span>%s</span>', 'vibe'), bp_course_get_total_course_count_for_user(bp_loggedin_user_id())); ?></a></li>
											<?php if (is_user_instructor()) : ?>
												<li id="course-instructor"><a href="<?php echo trailingslashit(bp_loggedin_user_domain() . bp_get_course_slug()); ?>"><?php printf(__('Instructing Courses <span>%s</span>', 'vibe'), bp_course_get_instructor_course_count_for_user(bp_loggedin_user_id())); ?></a></li>
											<?php endif; ?>
										<?php endif; ?>
										<?php do_action('bp_course_directory_filter'); ?>
									</ul>
								</div><!-- .item-list-tabs -->
							<?php endif; ?>

							<div class="item-list-tabs" id="subnav" role="navigation">
								<ul>
									<?php do_action('bp_course_directory_course_types'); ?>
									<li>
										<?php
										if (is_tax()) {
											echo '<h1>';
											single_cat_title();
											echo '</h1>';
										} else {
											echo '<h1>' . vibe_get_title($id) . '</h1>';
										}
										?>
									</li>
									<li id="course-order-select" class="last filter">

										<label for="course-order-by"><?php _e('Order By:', 'vibe'); ?></label>
										<select id="course-order-by">
											<?php
											?>
											<option value=""><?php _e('Select Order', 'vibe'); ?></option>
											<option value="newest"><?php _e('Newly Published', 'vibe'); ?></option>
											<option value="alphabetical"><?php _e('Alphabetical', 'vibe'); ?></option>
											<option value="popular"><?php _e('Most Members', 'vibe'); ?></option>
											<option value="rated"><?php _e('Highest Rated', 'vibe'); ?></option>
											<option value="start_date"><?php _e('Start Date', 'vibe'); ?></option>
											<?php do_action('bp_course_directory_order_options'); ?>
										</select>
									</li>
								</ul>
							</div>
							<div id="course-dir-list" class="course dir-list">
								<?php locate_template(array('course/course-loop.php'), true); ?>
							</div><!-- #courses-dir-list -->

							<?php do_action('bp_directory_course_content'); ?>

							<?php wp_nonce_field('directory_course', '_wpnonce-course-filter'); ?>

							<?php do_action('bp_after_directory_course_content'); ?>

						</form><!-- #course-directory-form -->
					</div>
				</div>
				<?php do_action('bp_after_directory_course'); ?>

			</div><!-- .padder -->

			<?php do_action('bp_after_directory_course_page'); ?>
		</div><!-- #content -->
	</div>
</section>
<section class="for-ali-all-course-right-ad">
	<div class="the-all-course-ad-div">
		<img src="<?php echo get_theme_file_uri(); ?>/assets/img/all-course-right-ad.png" alt="">
	</div>
</section>

<section class="for-all-course-bottom-ad">
	<div class="the-all-course-bottom-ad-div">
		<img src="<?php echo get_theme_file_uri(); ?>/assets/img/all-course-bottom-ad.png" alt="">
	</div>
</section>

<section class="ali-course-accord">
	<div class="row">
		<div class="container">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Collapsible Group Item #1
							</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
							on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
							raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								Collapsible Group Item #2
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
							on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
							raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
							<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Collapsible Group Item #3
							</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird
							on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
							raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>