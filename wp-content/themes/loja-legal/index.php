<?php get_header(); ?>
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h3 class="text-center">Automoveis</h3>
            <button type="button" class="btn btn-primary">Venda o seu carro</button>
        </div>
    </div>
    <div class="row mb-5">
        
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
            <div class="col-12 col-md-4">
                <div class="card">
                    <?php the_post_thumbnail(array(350,200), array('class' => 'card-img-top', 'title' => 'Feature image')); ?>
                    <div class="card-body">
                        <h5 class="text-center card-title"><?php the_title(); ?></h5>
                        <?php $car_value = get_post_meta( $post->ID, 'car_value', true );?>
                        <p class="text-center"><?php echo $car_value;?>€</p>
                        <p class="text-center card-text"><?php echo ll_get_excerpt(30); ?></p>
                        <p class="text-center"><a href="<?php the_permalink(); ?>" class="btn btn-primary">Detalhes</a></p>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>

</div>
<?php get_footer(); ?>