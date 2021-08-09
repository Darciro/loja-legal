<?php

function ll_scripts()
{
    wp_enqueue_style('bootstrap-style', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', array(), '1.0');
    wp_enqueue_style('ll-style', get_template_directory_uri() . '/style.css', array('bootstrap-style'), '1.0');

    wp_enqueue_script('bootstrap-scripts', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js', array('jquery'), '1.0', true);
    wp_enqueue_script('ll-scripts', get_template_directory_uri() . '/main.js', array('jquery', 'bootstrap-scripts'), '1.0', true);
}

add_action('wp_enqueue_scripts', 'll_scripts');

function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/LL.jpg);
		height:65px;
		width:242px;
		background-size: 320px 65px;
		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Loja Legal';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// Adiciona suporte à miniaturas de artigos
add_theme_support('post-thumbnails');

function wpb_custom_new_menu()
{
    register_nav_menu('main-menu', __('Menu principal'));
}

add_action('init', 'wpb_custom_new_menu');

// Função que retorna o resumo de um artigo
function ll_get_excerpt($limit = 190)
{
    $excerpt = explode(' ', get_the_excerpt(), $limit);

    if (count($excerpt) >= $limit) {
        array_pop($excerpt);
        $excerpt = implode(" ", $excerpt) . '...';
    } else {
        $excerpt = implode(" ", $excerpt);
    }

    $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

    return $excerpt;
}

// Adiciona meta box
function wporg_add_custom_box()
{
    add_meta_box(
        'car_value_metabox',            // Unique ID
        'Valor do carro',             // Box title
        'car_value_metabox_html',    // Content callback, must be of type callable
        array('post')                       // Post type
    );
    add_meta_box(
        'km_value_metabox',
        'Km percorrido',
        'km_value_metabox_html',
        array('post')
    );
}

add_action('add_meta_boxes', 'wporg_add_custom_box');

// Imprime o HTML para o metabox
function car_value_metabox_html($post)
{
    $car_value = get_post_meta($post->ID, 'car_value', true);
    ?>

    <label for="car_value">Defina um valor para o carro:</label>
    <input type="text" name="car_value" id="car_value" value="<?php echo $car_value; ?>">

    <?php
}

function km_value_metabox_html($post)
{
    $km_value = get_post_meta($post->ID, 'km_value', true);
    ?>

    <label for="km_value">Digite a kilometragem:</label>
    <input type="text" name="km_value" id="km_value" value="<?php echo $km_value; ?>">

    <?php
}

// Função responsável por salvar o valor do carro
function car_metadata_save($post_id)
{
    if (array_key_exists('car_value', $_POST)) {
        update_post_meta($post_id, 'car_value', $_POST['car_value']);
    }

    if (array_key_exists('km_value', $_POST)) {
        update_post_meta($post_id, 'km_value', $_POST['km_value']);
    }
}

add_action('save_post', 'car_metadata_save');

