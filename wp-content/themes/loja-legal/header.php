<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Loja Legal!</title>

    <?php wp_head(); ?>
</head>
<body>

<nav class="navbar navbar-dark navbar-expand-md bg-dark mb-5">
    <a href="<?php echo home_url(); ?>" class="navbar-brand text-center">Loja Legal</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php
            if( is_user_logged_in() ){
                $auth_link = '<a class="auth_link" href="'. wp_logout_url( home_url() ) .'">Log out</a>';
            } else {
                $auth_link = '<a class="auth_link" href="'. wp_login_url( home_url() ) .'">Login</a>';
            }
            wp_nav_menu( array(
                'menu' => 'navbarSupportedContent',
                'theme_location' => 'main-menu',
                'container' => '',
                'items_wrap'  => '<ul id="%1$s" class="%2$s navbar-nav mr-auto">%3$s</ul>' )
            );
            echo $auth_link;
        ?>
        <?php get_search_form(); ?>
    </div>
</nav>