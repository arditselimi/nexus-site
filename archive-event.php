<?php get_header(); 


      pageBanner(array(
        'title' => 'All Events',
        'subtitle' => 'See all our events.'
      ));
?>


      <section class="events">
        <div class="events-list">

        <?php while(have_posts()) : the_post();
            $eventDate =  new DateTime(get_field('event_date'));
        ?>
            <div class="event">
                <h4><?php the_title(); ?></h4>
                <?php the_content(); ?>
                <span>Date: <?php echo $eventDate -> format('d M Y'); ?></span>
                <a href="<?php the_permalink(); ?>">Learn more</a>
            </div>
        <?php endwhile; ?>          
        </div>

        
    </section>

    <p class="past-events">Lookin for the past events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events.</a></p>

<?php get_footer(); ?>

