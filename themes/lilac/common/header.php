<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
  <?php endif; ?>
  <?php
  if (isset($title)) {
    $titleParts[] = strip_formatting($title);
  }
  $titleParts[] = option('site_title');
  ?>
  <title><?php echo __("Elias Lönnrot Letters"); ?></title>


  <?php echo auto_discovery_link_tags(); ?>

  <!-- Plugin Stuff -->

  <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>

  <!-- Stylesheets -->
  <?php
  queue_css_file(array('style', 'font-awesome/css/font-awesome.min'));
  queue_css_url('//fonts.googleapis.com/css?family=Overpass');
  echo head_css();

  echo theme_header_background();
  ?>

  <?php
  ($backgroundColor = get_theme_option('background_color')) || ($backgroundColor = "#FFFD0");
  ($textColor = get_theme_option('text_color')) || ($textColor = "#444444");
  ($linkColor = get_theme_option('link_color')) || ($linkColor = "#888888");
  ($buttonColor = get_theme_option('button_color')) || ($buttonColor = "#000000");
  ($buttonTextColor = get_theme_option('button_text_color')) || ($buttonTextColor = "#FFFFFF");
  ($titleColor = get_theme_option('header_title_color')) || ($titleColor = "#000000");
  ?>
  <style>
  body {
    background-color: <?php echo $backgroundColor; ?>;
    color: <?php echo $textColor; ?>;
  }
  #site-title a:link, #site-title a:visited,
  #site-title a:active, #site-title a:hover {
    color: <?php echo $titleColor; ?>;
    <?php if (get_theme_option('header_background')): ?>
    text-shadow: 0px 0px 20px #000;
    <?php endif; ?>
  }
  a:link {
    color: <?php echo $linkColor; ?>;
  }

  a:hover, a:focus {
    color: #888888 !important;
  }

  a:visited {
    color: #444444 !important;
  }

  .button, button,
  input[type="reset"],
  input[type="submit"],
  input[type="button"],
  .pagination_next a,
  .pagination_previous a {
    background-color: <?php echo $buttonColor; ?>;
    color: <?php echo $buttonTextColor; ?> !important;
  }

  #search-form input[type="text"] {
    border-color: <?php echo $buttonColor; ?>
  }

  .mobile li {
    background-color: <?php echo thanksroy_brighten($buttonColor, 40); ?>;
  }

  .mobile li ul li {
    background-color: <?php echo thanksroy_brighten($buttonColor, 20); ?>;
  }

  .mobile li li li {
    background-color: <?php echo thanksroy_brighten($buttonColor, -20); ?>;
  }
  </style>
  <!-- JavaScripts -->
  <?php
  queue_js_file('vendor/modernizr');
  queue_js_file('vendor/selectivizr', 'javascripts', array('conditional' => '(gte IE 6)&(lte IE 8)'));
  queue_js_file('vendor/respond');
  queue_js_file('vendor/jquery-accessibleMegaMenu');
  queue_js_file('globals');
  queue_js_file('default');
  queue_js_file('jquery-1.12.4.min');
  queue_js_file('header_menus');
  echo head_js();
  ?>
</head>
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<a href="#content" id="skipnav"><?php echo __('Skip to main content'); ?></a>

<header role="banner">
  <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
  <!-- Site title and SKS logo with link -->
  <div id="site-title" style="width:98%;height:10%;">
    <?php echo link_to_home_page($text = __("Elias Lönnrot Letters")); ?>
    <!-- Dropdown menu for language switching -->
    <?php fire_plugin_hook('public_body', array('view'=>$this)); ?>
    <a href="http://www.finlit.fi" target="_blank">
      <img width="200px" style="float:right;margin-right:16px;"
      src="<?php echo 'http://lonnrot.finlit.fi/omeka/sks_header_logo.png'; ?>" />
    </a>
  </div>
  <!-- main header links-->
  <div id="search-container" role="search">
    <span style="float:left;">
      <a style="margin-left:16px;font-size:18px;" href="<?php echo html_escape(url('items')); ?>">
        <?php echo __('Browse Letters'); ?>
      </a>
      <a style="margin-left:16px;font-size:18px;" href="<?php echo html_escape(url('collections')); ?>">
        <?php echo __('Browse Recipients'); ?></a>
        <a style="margin-left:50px;font-size:18px;" href="<?php echo html_escape(url('esipuhe')); ?>"><?php echo __('Information'); ?></a>
        <a id="infobtn"><?php echo __('Instructions'); ?></a>
        <!-- Extended search and Solr text search -->
    </span>
    <span style="float:right;margin-right:16px;">
        <a id="searchbtn"><?php echo __('Advanced Search'); ?></a>
        <?php echo search_form(); ?>
    </span>
  </div>
  <!-- Extended search form in dropdown -->
  <div id="ext-search" style="display: none;">
      <?php echo $this->partial('items/search-form.php',
      array('formAttributes' => array('id'=>'advanced-search-form'))); ?>
  </div>
  <!-- Instruction links, dropdown -->
  <div id="instructions" style="display: none;">
    <ul>
      <li><a href="<?php echo html_escape(url('ohjeet/merkinnat')); ?>"><?php echo __('Markings Used in Transcriptions'); ?></a></li>
    </ul>
  </div>
</header>

<div class="menu-button button">Menu</div>

  <!-- Vertical navigation panel hidden -->
  <div id="wrap">
    <!--<nav id="primary-nav" role="navigation">
    <?php echo public_nav_main(array('role' => 'navigation')); ?>
    <div id="search-container" role="search">
    <?php if (get_theme_option('use_advanced_search') === null || get_theme_option('use_advanced_search')): ?>
    <?php echo search_form(array('show_advanced' => true)); ?>
  <?php else: ?>
  <?php echo search_form(); ?>
<?php endif; ?>
</div>
</nav>-->
<div id="content" role="main" tabindex="-1">
  <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>
