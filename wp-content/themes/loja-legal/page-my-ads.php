<?php
/* Template Name: Página meus anúncios */
get_header(); ?>
  
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h3 class="text-center"><?php the_title(); ?></h3>
        </div>
    </div>
    <div class="row mb-5">
        
        <?php  $query = new WP_Query( array( 'author' =>get_current_user_id() ) );
        if ( $query->have_posts() ) :
            while ( $query->have_posts() ) : $query->the_post(); ?>
            <div class="col-12 px-5">
                <?php $query->the_post_thumbnail('large', array('class' => 'card-img-top', 'title' => 'Feature image')); ?>
                <p class="text-center card-text"><?php $query->the_content(); ?></p>
            </div>
            <?php endwhile; ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>

</div>
  
<?php get_footer(); ?>