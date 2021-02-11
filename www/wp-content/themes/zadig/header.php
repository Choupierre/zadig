<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="height=device-height, width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="container zadig_menu">
    <nav class="navbar navbar-expand-md <?= is_front_page() ? 'navbar-invert' : '' ?>" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand" href="<?= home_url() ?>"></a>
            <button id="nav-icon" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ross-navbar-collapse" aria-controls="ross-navbar-collapse" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-theme-slug'); ?>">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </button>

            <?php
            wp_nav_menu(array(
                'theme_location'    => 'header',
                'container'         => 'div',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'ross-navbar-collapse',
                'menu_class'        => 'nav navbar-nav',
                'walker'            => new Ross_Menu_Walker(),
            ));
            ?>
        </nav>
    </header>
    <main class="container">