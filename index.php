<?php get_header(); 

    pageBanner(array(
        'title' => 'Our Blog',
        'subtitle' => 'Keep up with the latest news.'
    ));
?>

    

      <section class="blog-list">
        <?php while(have_posts()) : the_post(); ?>
            <div class="blog">
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <span>Posted by <?php the_author_posts_link();  the_time(' d M Y '); ?><strong><?php echo get_the_category_list(', '); ?></strong></span>
                <a href="<?php the_permalink(); ?>" class="read-more">Read more</a>
            </div>
        <?php endwhile; ?>
      </section>

    
  
    
<?php get_footer(); ?> 