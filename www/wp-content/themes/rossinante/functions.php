<?php

require_once get_template_directory() . '/inc/post-type-realisation.php';

function rossinante_supports()
{
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('align-wide');
    add_theme_support('post-thumbnails');
    register_nav_menu('header', 'Menu de navigation');
}
add_action('after_setup_theme', 'rossinante_supports');

function rossinante_register_assets()
{
    $ver = 3.5;
    // wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', []);
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);

    if (WP_DEBUG === true) {
        wp_register_style('rossinante_css', 'http://localhost:8081/style.css');
        wp_register_script('app_js', 'http://localhost:8081/app.js', [], false, true);
    } else {
        wp_register_style('rossinante_css', get_template_directory_uri() . '/rossinante.css', [], $ver);
        wp_register_script('app_js', get_template_directory_uri() . '/app.js', [], $ver, true);
    }
    //wp_deregister_script('jquery');
    //wp_register_script('jquery','https://code.jquery.com/jquery-3.5.1.js',[],false,true);
    //wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('app_js');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('rossinante_css');
}
add_action('wp_enqueue_scripts', 'rossinante_register_assets');

remove_filter('the_content', 'wptexturize');


add_filter('wp_nav_menu_items', 'add_outline_to_menu', 10, 2);
function add_outline_to_menu($items, $args)
{
    $items .= '<span class="outline_active"></span>';
    return $items;
}

function rossinante_post_classes($classes, $class, $post_id)
{
    if (is_page(494) || is_page(261)) {
        $classes[] = 'rossinante_contact';
    }

    if (is_page(24) || is_page(497)) {
        $classes[] = 'rossinante_point_of_vue';
        $classes[] = 'row';
    }

    if (is_page(58) || is_page(495)) {
        $classes[] = 'rossinante_communaute';
    }


    return $classes;
}
add_filter('post_class', 'rossinante_post_classes', 10, 3);


/**
 * Enqueue supplemental block editor styles.
 */
function rossinante_editor_style()
{
    // Enqueue the editor styles.
    wp_enqueue_style('style-editor', get_theme_file_uri('style-editor.css'));
}

add_action('enqueue_block_editor_assets', 'rossinante_editor_style', 1, 1);




function register_navwalker()
{
    require_once get_template_directory() . '/inc/walker.php';
}

function jb_editor_content($content)
{
    // Polylang sets the 'from_post' parameter
    if (isset($_GET['from_post'])) {
        $my_post = get_post($_GET['from_post']);
        if ($my_post)
            return $my_post->post_content;
    }

    return $content;
}
add_filter('default_content', 'jb_editor_content');


function jb_editor_title($title)
{
    // Polylang sets the 'from_post' parameter
    if (isset($_GET['from_post'])) {
        $my_post = get_post($_GET['from_post']);
        if ($my_post)
            return $my_post->post_title;
    }

    return $title;
}
add_filter('default_title', 'jb_editor_title');



add_action('after_setup_theme', 'register_navwalker');




function rossinante_traduction()
{
    load_theme_textdomain('rossinante', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'rossinante_traduction');
