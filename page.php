<?php get_header(); ?>

      <?php pageBanner(); ?>

      <?php $theParent = wp_get_post_parent_id(); 
            $hasChildren = get_pages(array(
                'child_of' => get_the_ID()
            ));
      ?>

      <div class="page-info">
        <p>
            <?php the_content(); ?>
        </p>

        <?php if ($theParent or $hasChildren) { ?>
            <div class="page-info-related">
            <ul>
                <?php 
                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        $findChildrenOf = get_the_ID();
                    }
    
                    wp_list_pages(array(
                        'title_li' => NULL, 
                        'child_of' => $findChildrenOf,
                        'sort_column' => 'menu_order'
                    ));
    
                ?>
            </ul>
            </div>
        <?php  } ?>

<?php get_footer(); ?>