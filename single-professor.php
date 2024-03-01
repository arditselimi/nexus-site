<?php get_header();  ?>

      <?php pageBanner(); ?>

      <?php $relatedPrograms = get_field('related_programs'); ?>

      

      <div class="professor-info">
        <?php the_content(); ?>
        
        <?php if ($relatedPrograms) { ?>
          <h4>Subjects that <?php the_title(); ?> teach: </h4>
      
            <ul>
            <?php foreach($relatedPrograms as $program) { ?>
              <li><a href="<?php echo get_the_permalink($program); ?>"><?php echo get_the_title($program); ?></a></li>
              <?php } 
            ?>
        </ul>
      <?php } ?>
      </div>

<?php get_footer();  ?>