<?php get_header(); pageBanner(); ?>

      <?php $relatedPrograms = get_field('related_programs'); ?>

      <div class="event-info">
      <?php the_content(); ?>

      <?php if ($relatedPrograms) { ?>
          <h4>Related Program(s):</h4>
      
            <ul>
            <?php foreach($relatedPrograms as $program) { ?>
              <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
              <?php } 
            ?>
        </ul>
      <?php } ?>
      </div>


<?php get_footer(); ?>