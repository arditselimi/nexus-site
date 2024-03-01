<?php 

        function pageBanner($args = NULL) {
            
           if (!isset($args['title'])) {
                $args['title'] = get_the_title();
            }

            if (!isset($args['subtitle'])) {
                $args['subtitle'] = get_field('page_banner_subtitle');
            }

            if (!isset($args['photo'])) {
                if (get_field('page_banner_background_image') AND !is_archive() AND !is_home() ) {
                $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
                } else {
                $args['photo'] = get_theme_file_uri('/build/images/pageBanner.jpg');
                }
            }


            ?>

            <div class="page-banner">
                <div
                class="page-banner-content"
                style="
                    background: url('<?php echo $args['photo']; ?>');

                    object-fit: cover;
                    background-position: center;
                "
                >
                    <div>
                        <h4><?php echo $args['title']; ?></h4>
                        <p><?php echo $args['subtitle']; ?></p>
                    </div>
                </div>
            </div>

        <?php }

        function nexus_files()  {
            wp_enqueue_script('custom-js', get_theme_file_uri('/build/js/index.js'), [], '1.0', true);
            wp_enqueue_script('swiper-js', '//cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js', NULL, 1.0, true);
            wp_enqueue_style('custom-styles', get_theme_file_uri('/build/styles/index.css'));
            wp_enqueue_style('custom-icons', '//cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css');
        }


        add_action('wp_enqueue_scripts', 'nexus_files');


        function nexus_features() {
            add_image_size('pageBanner', 1200, 300, true);
        }

        add_action('after_setup_theme', 'nexus_features');