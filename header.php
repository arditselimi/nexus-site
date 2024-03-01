<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
  </head>
  <body <?php body_class();  ?> >
    <!-- header -->
    <div class="container section-padding">
      <header class="header">
        <h2><a href="/">Nexus University</a></h2>
        <ul>
          <li><a href="<?php echo site_url('/about-us'); ?>">About us</a></li>
          <li><a href="<?php echo get_post_type_archive_link('program'); ?>">Programs</a></li>
          <li><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
          <li><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
        </ul>

        <div>
          <a class="btn" href="/">Log in</a>
          <a class="btn" href="/">Sign up</a>
          <i class="ri-search-line" id="searchBtn"></i>
          <i class="ri-menu-line menu"></i>
        </div>
      </header>