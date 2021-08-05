<?php
// Adiciona suporte à miniaturas de artigos
add_theme_support('post-thumbnails');

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
function wporg_add_custom_box() {
    add_meta_box(
        'car_value_metabox',            // Unique ID
        'Valor do carro',             // Box title
        'car_value_metabox_html',    // Content callback, must be of type callable
        array('post')                       // Post type
    );
}
add_action( 'add_meta_boxes', 'wporg_add_custom_box' );

// Imprime o HTML para o metabox
function car_value_metabox_html ($post) {
    $car_value = get_post_meta( $post->ID, 'car_value', true );
    ?>

    <label for="car_value">Defina um valor para o carro:</label>
    <input type="text" name="car_value" id="car_value" value="<?php echo $car_value; ?>">

    <?php
}

// Função responsável por salvar o valor do carro
function car_value_save( $post_id ) {
    if ( array_key_exists( 'car_value', $_POST ) ) {
        update_post_meta($post_id, 'car_value', $_POST['car_value']);
    }
}
add_action( 'save_post', 'car_value_save' );