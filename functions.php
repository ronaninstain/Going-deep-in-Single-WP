<?php
add_action('wp_enqueue_scripts', 'wplms_child_theme_enqueue_styles');
function wplms_child_theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}


function ali_child_enqueue_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('single', get_theme_file_uri('/css/single-course.css'), false, time(), 'all');
    wp_enqueue_style('all-course', get_theme_file_uri('/css/all-course.css'), false, time(), 'all');
}
add_action('wp_enqueue_scripts', 'ali_child_enqueue_styles');

function register_ali_child_theme_scripts()
{
    wp_register_script('ali-Js', get_stylesheet_directory_uri() . '/js/ali-Js.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'register_ali_child_theme_scripts');

function enqueue_ali_child_theme_scripts()
{
    wp_enqueue_script('ali-Js');
}
add_action('wp_enqueue_scripts', 'enqueue_ali_child_theme_scripts');


//For Course Tags

add_action('init', 'create_course_tag_taxonomy', 0);
function create_course_tag_taxonomy()
{

    $labels = array(
        'name' => _x('Course Tags', 'Tag general name'),
        'singular_name' => _x('course_tag', 'Tag singular name'),
        'search_items' =>  __('Search Tag'),
        'all_items' => __('All Tag'),
        'edit_item' => __('Edit Tag'),
        'update_item' => __('Update Tag'),
        'add_new_item' => __('Add New Tag'),
        'new_item_name' => __('New Tag Name'),
        'menu_name' => __('Course Tag'),
    );

    register_taxonomy('coursetag', array('course'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
    ));
}

// For Changing Course button tag

function custom_wplms_course_button_label($label)
{
    return 'Start Course Now';
}
add_filter('wplms_take_this_course_button_label', 'custom_wplms_course_button_label');



// callback function for handling the ajax request

/* add_action('wp_ajax_custom_post_like', 'custom_post_like');
add_action('wp_ajax_nopriv_custom_post_like', 'custom_post_like');
function custom_post_like()
{
    $post_id = $_POST['post_id'];
    var_dump($post_id);
    echo '<h1> Hello Function! </h1>';
} */
