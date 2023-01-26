<?php

/**
 * The template for displaying Course Header
 *
 * Override this template by copying it to yourtheme/course/single/header.php
 *
 * @author 		VibeThemes
 * @package 	vibe-course-module/templates
 * @version     2.1
 */
if (!defined('ABSPATH')) exit;
do_action('bp_before_course_header');

?>
<div id="item-header-avatar">
	<?php bp_course_avatar(); ?>
</div><!-- #item-header-avatar -->

<div id="item-header-content">
	<?php $free_Includes = get_field('free_includes_heading'); ?>

	<!-- <span class="highlight"><?php bp_course_type(); ?></span> -->
	<h3><?php bp_course_name(); ?></h3>

	<div class="students_undertaking">
		<?php
		$students_undertaking = array();
		$students_undertaking = bp_course_get_students_undertaking();
		$students = get_post_meta(get_the_ID(), 'vibe_students', true);

		echo '<span><i class="fa fa-graduation-cap" aria-hidden="true"></i> ' . '<strong>' . $students . '</strong>' . __(' STUDENTS ALREADY ENROLLED', 'vibe') . '</span>';
		?>
	</div>

	<?php do_action('bp_before_course_header_meta'); ?>
</div><!-- #item-header-content -->
<?php
$enable_instructor = apply_filters('wplms_display_instructor', true, get_the_ID());
if ($enable_instructor) {
?>
	<div id="item-admins">

		<h3><?php _e('Instructors', 'vibe'); ?></h3>
		<?php
		bp_course_instructor();

		do_action('bp_after_course_menu_instructors');
		?>
	</div><!-- #item-actions -->
<?php
}
do_action('bp_after_course_header');
?>