<?php get_header(); 

    pageBanner(array(
      'title' => 'All Programs',
      'subtitle' => 'There are all our programs. Have a look around!'
    ));
?>

    

      <section class="programs">
          <ul>
        <?php while (have_posts()) : the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
          <?php endwhile; ?>
        </ul>
      </section>

<?php get_footer(); ?>