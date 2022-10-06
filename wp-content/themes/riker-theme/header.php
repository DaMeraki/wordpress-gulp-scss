<?php
/**
 * Header
 * @package riker-theme
 */
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <header class="header">
      <div class="wrapper">
        <h1>
          <a href="<?php echo esc_url( home_url() ) ;?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </h1>
      </div>
    </header><!-- end .header -->

    <div class="wrapper">