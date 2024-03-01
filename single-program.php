<?php get_header();  pageBanner();?>
  
      <section class="program-info">
        <p>
          <?php the_content(); ?>
        </p>

        <?php
    $today = date('Ymd');
      $relatedProfessors = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'professor', 
            'meta_query' => array(
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"',
                )
            ),
            'orderby' => 'title',
            'order' => 'ASC'
        ));

      ?>

      <section class="events events-p">
        <?php if ($relatedProfessors->have_posts()) { ?>
            <h4 class="related-events">Related <?php echo get_the_title(); ?> Professors: </h4>

            <div class="professor-info">
                <?php while ($relatedProfessors->have_posts()) : $relatedProfessors->the_post(); ?>
                    <ul>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    </ul>
                <?php endwhile; ?>
            </div> 
            <hr>
        <?php } ?>
        </section>
      <?php

      wp_reset_postdata();

      $today = date('Ymd');
        $homepageEvents = new WP_Query(array(
            'posts_per_page' => 4,
            'post_type' => 'event', 
            'meta_query' => array(
                'relation' => 'AND', 
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                ),
                array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"' . get_the_ID() . '"',
                )
            ),
            'orderby' => 'meta_value_num',
            'order' => 'ASC'
        ));

      ?>

      <section class="events events-p">
        <?php if ($homepageEvents -> have_posts()) { ?>
        <h4 class="related-events">Related <?php echo get_the_title(); ?> Events: </h4>

        <div class="events-list">
        <?php while($homepageEvents -> have_posts()) : $homepageEvents -> the_post(); 

            $eventDate = new DateTime(get_field('event_date'));
        ?>
          <div class="event">
            <h4><?php the_title(); ?></h4>
            <p>
             <?php if (has_excerpt()) {
              echo get_the_excerpt();
             } else {
              echo wp_trim_words(get_the_content(), 16);
             }  ?>
            </p>
            <span>Date: <?php echo $eventDate->format('d M Y'); ?></span>
            <a href="<?php the_permalink(); ?>">Learn more</a>
          </div>
        <?php endwhile; ?>      
        </div>
       <?php } ?>
      </section>

<?php get_footer(); ?>