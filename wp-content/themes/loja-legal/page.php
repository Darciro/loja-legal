<?php get_header(); ?>
  
<div class="container">
    <div class="row mb-5">
        <div class="col">
            <h3 class="text-center"><?php the_title(); ?></h3>
        </div>
    </div>
    <div class="row mb-5">
        
        <?php if ( have_posts() ) :
            while ( have_posts() ) : the_post(); ?>
            <div class="col-12 px-5">
                <?php the_post_thumbnail('large', array('class' => 'card-img-top', 'title' => 'Feature image')); ?>
                <p class="text-center card-text"><?php the_content(); ?></p>
            </div>
            <?php endwhile; ?>

        <?php else : ?>
            <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </div>

</div>
  
<?php get_footer(); ?>