<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta name="description" content="<?php if (is_single()) {
      single_post_title('', true);
        } else {
          bloginfo('name');
          echo " - ";
          bloginfo('description');
        }
      ?>"/>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180"
          href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32"
          href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16"
          href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/safari-pinned-tab.svg"
          color="#5bbad5">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config"
          content="<?php echo asset('images/favicon/browserconfig.xml'); ?>">
    <meta name="theme-color" content="#ffffff">
    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php do_action('get_header'); ?>

    <div id="app">
      <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>
    </div>

    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
  </body>
</html>
