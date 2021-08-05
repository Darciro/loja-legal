<?php get_header(); ?>
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h3 class="text-center">Automoveis</h3>
            <button type="button" class="btn btn-primary">Venda o seu carro</button>
        </div>
    </div>
    <div class="row mb-5">
        <?
        $args = array(
            'posts_type' => 'post',
            'posts_per_page' => 6
        );
        $the_query = new WP_Query( $args ); ?>

        <?php if ( $the_query->have_posts() ) : ?>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <div class="col-12 col-md-4">
                    <div class="card">
                        <?php the_post_thumbnail(array(350,200), array('class' => 'card-img-top', 'title' => 'Feature image')); ?>
                        <div class="card-body">
                            <h5 class="text-center card-title"><?php the_title(); ?></h5>
                            <p class="text-center card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>


    </div>

</div>
<?php get_footer(); ?>