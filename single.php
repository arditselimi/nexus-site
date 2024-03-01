<?php get_header(); pageBanner() ?>
   

    <div class="post">
        <p><?php the_content(); ?></p>
        <p><?php echo get_the_category_list(', '); ?></p>
    </div>


<?php get_footer(); ?>
