<section class="top-ad-sec">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="for-ad-top">
					<div class="the-ad-div">
						<img src="<?php echo get_theme_file_uri(); ?>/assets/img/ad2.png" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="content" class="single-course">
	<div id="buddypress">
		<div class="<?php echo vibe_get_container(); ?>">
			<?php do_action('bp_before_course_home_content'); ?>
			<div class="row">
				<div class="for-specific-styling-left-sidebar">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div id="item-header-avatar">
							<?php bp_course_avatar(); ?>
						</div><!-- #item-header-avatar -->


						<div id="item-header-content">

							<?php $free_Includes = get_field('free_includes_heading'); ?>
							<h3><?php bp_course_name(); ?></h3>

							<div class="students_undertaking">
								<?php
								$students_undertaking = array();
								$students_undertaking = bp_course_get_students_undertaking();
								$students = get_post_meta(get_the_ID(), 'vibe_students', true);

								echo '<span><i class="fa fa-graduation-cap" aria-hidden="true"></i> ' . '<strong>' . $students . '</strong>' . __(' Learners Already Enrolled', 'vibe') . '</span>';
								?>
								<div class="ali-the-reactions">
									<?php echo do_shortcode('[posts_like_dislike]'); ?>
								</div>
								<!-- <div class="ali-rating">
									<div class="ali-rating__love">
										<span class="rating" data-val="5" data-l-tooltip="Loved it!"></span> <span class="course-love"><i class="fa fa-heart-o" aria-hidden="true"></i>
											892</span>
									</div>
									<div class="ali-rating__like">
										<span class="rating" data-val="2" data-l-tooltip="Liked it!"></span> <span class="course-like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 222</span>
									</div>
									<div class="ali-rating__no">
										<span class="rating" data-val="0"></span><i class="fa fa-frown-o" aria-hidden="true"></i> Not Interested
									</div>
								</div> -->
								<div class="the-ali-free-includes-div">
									<h4><?php echo $free_Includes; ?></h4>
									<div class="the-free-includes-list">
										<ul>
											<li><img src="<?php echo get_theme_file_uri() . '/assets/img/tick.svg'; ?>" alt="img" />
												<?php $course_duration = get_post_meta(get_the_ID(), 'vibe_duration', true);
												echo  number_format((float)($course_duration / 24), 2, '.', ''); ?> Hours of Learning</li>
											<?php
											// check if the repeater field has rows of data

											if (have_rows('sidebar_free_course_includes_list')) :
												// loop through the rows of data
												while (have_rows('sidebar_free_course_includes_list')) : the_row();

											?>
													<li>
														<img src="<?php echo get_theme_file_uri() . '/assets/img/tick.svg'; ?>" alt="img" />
														<?php the_sub_field('free_course_includes_list_items'); ?>
													</li>
											<?php


												endwhile;
											else :
											// no rows found
											endif;
											?>
										</ul>
									</div>
								</div>
							</div>

							<?php do_action('bp_before_course_header_meta'); ?>


							<div class="widget pricing">
								<div class="left-start-course-ali">
									<?php the_course_button(); ?>
								</div>
							</div>

							<?php $author_id = get_the_author_meta('ID');
							$author_name = get_the_author_meta('display_name', $author_id);
							$author_link = get_author_posts_url($author_id);
							?>

							<div class="left-side-publisher">
								<div class="profile-avatar">
									<?php echo get_avatar($author_id); ?>
								</div>
								<div class="profile-name">
									<h6>Course Publisher</br> <?php echo '<a href="' . $author_link . '">' . $author_name . '</a>'; ?></h6>
								</div>
							</div>
							<!-- <div id="reaction-box">
								<button id="loved-it" data-reaction="loved">Loved it</button>
								<button id="like-button" data-reaction="liked" postId="<?php echo get_the_ID(); ?>" class="like-button">Liked it</button>
								<button id="not-interested" data-reaction="not-interested">Not interested</button>
							</div> -->
						</div><!-- #item-header-content -->
						<div id="item-nav">
							<div class="<?php echo vibe_get_container(); ?>">
								<div class="item-list-tabs no-ajax" id="object-nav" role="navigation">
									<ul>
										<?php bp_get_options_nav(); ?>
										<?php

										global $current_user;
										$user_roles = $current_user->roles;
										$user_role = array_shift($user_roles);

										if (is_user_logged_in() & $user_role !== 'student' & $user_role !== 'subscriber')
											bp_course_nav_menu();


										?>
										<?php do_action('bp_course_options_nav'); ?>
									</ul>
								</div>
							</div><!-- #item-nav -->
						</div>
					</div>
					<div class="col-md-7 col-sm-12 col-xs-12">