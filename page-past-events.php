<?php get_header(); 

       pageBanner(array(
        'title' => 'Past Events',
        'subtitle' => 'Our past events'
    ));
  ?>

      <?php 
      
        $today = date('Ymd');
        $pastEvents = new WP_Query(array(
            'paged' => get_query_var('paged', 1),
            'post_type' => 'event',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today,
                'type' => 'numeric'
            )
            )
        ));
    
      ?>

      

    <section class="events events-p">
        <div class="events-list">
            <?php 
            if ($pastEvents->have_posts()) {
                while ($pastEvents->have_posts()) {
                    $pastEvents->the_post();
                    $eventDate = new DateTime(get_field('event_date')); ?>
                    
                    <div class="event">
                        <h4><?php the_title(); ?></h4>
                        <?php the_content(); ?>
                        <span>Date: <?php echo $eventDate->format('d M Y'); ?></span>
                        <a href="<?php the_permalink(); ?>">Learn more</a>
                    </div>
                
                <?php }
            } else {
                echo '<h2>There are no past events.</h2>';
            } ?>
        </div>
    </section>



<?php get_footer(); ?>