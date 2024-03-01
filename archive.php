<?php get_header(); 

    pageBanner(array(
      'title' => get_the_archive_title(),
      'subtitle' => get_the_archive_description(),
    ))

?>


    <section class="blog-list">
        <?php while(have_posts()) : the_post(); ?>
            <div class="blog">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <span>Posted by <?php the_author_posts_link();  the_time(' d M Y');  ?></span>
                <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
            </div>
        <?php endwhile; ?>
    </section>

    <?php echo paginate_links(); ?>

<?php get_footer(); ?>