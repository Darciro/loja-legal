<form action="<?php echo home_url(); ?>" method="get" class="form-inline my-2 my-lg-0">
    <label for="search" class="sr-only">Search in <?php echo home_url( '/' ); ?></label>
    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" class="form-control mr-sm-2"/>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
</form>