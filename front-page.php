<?php get_header(); ?>

     <section class="hero">
        <div class="hero__left">
          <h1>Welcome to Nexus University</h1>
          <p>
            With programs in Mathematics, Biology, Computer Science, and
            Medicine, our vibrant campus community invites you to explore,
            learn, and thrive.
          </p>
          <a href="<?php echo get_post_type_archive_link('program'); ?>">Find a major</a>
        </div>
        <div class="hero__right">
          <img loading="lazy" src="<?php echo get_theme_file_uri('/build/images/heroImg.jpg'); ?>" alt="person" />
        </div>
      </section>

      <?php 
      
      $today = date('Ymd');
      $homepageEvents = new WP_Query(array(
        'posts_per_page' => 4,
        'post_type' => 'event', 
        'meta_key' => 'event_date',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
          'key' => 'event_date',
          'compare' => '>=',
          'value' => $today,
          'type' => 'numeric'
        )
      ));
      
      ?>

      <section class="events home">
        <li>Events</li>

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
        <a href="<?php echo get_post_type_archive_link('event');  ?>" class="event-btn">View all</a>
      </section>

      <section class="offer">
        <swiper-container class="mySwiper" navigation="false">
          <swiper-slide>
            <div>
              <h4>Free Food</h4>
              <p>Nexus University offers lunch plans for those in need.</p>
              <img src="<?php echo get_theme_file_uri('build/images/food.jpg'); ?>" alt="" />
            </div>
          </swiper-slide>
          <swiper-slide>
            <div>
              <h4>Free Transport</h4>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Architecto, suscipit!
              </p>
              <img src="<?php echo get_theme_file_uri('build/images/transport.jpg'); ?>" alt="" />
            </div>
          </swiper-slide>
          <swiper-slide>
            <div>
              <h4>Free Coffe</h4>
              <p>
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Architecto, suscipit!
              </p>
              <img src="<?php echo get_theme_file_uri('build/images/freeCoffe.jpg'); ?>" alt="" />
            </div>
          </swiper-slide>
        </swiper-container>
      </section>


     <div class="modal">
      <div class="modal__content">
        <form>
          <input type="text" placeholder="Search something..."  id="searchInput"/>
          <i class="ri-close-line closeBtn"></i>
        </form>

        <div class="modal__results">
          <div class="result-section">
            <h6>Blog</h6>
            <p><a href="/">This is the post</a></p>
          </div>
          <div class="result-section">
            <h6>Programs</h6>
            <p><a href="/">This is the post</a></p>
          </div>
          <div class="result-section">
            <h6>Professors</h6>
            <p><a href="/">This is the post</a></p>
          </div>
          <div class="result-section">
            <h6>Events</h6>
            <p><a href="/">This is the post</a></p>
          </div>
        </div>
      </div>
    </div>


<?php get_footer(); ?>