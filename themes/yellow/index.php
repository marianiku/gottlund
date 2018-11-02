<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col')); ?>

<div id="primary">
  <p style="text-align:center;"><img src="<?php echo img('OMEKA_tunnuskuva_teksti_pyorea.png'); ?>" /></p>
  <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p>
      <?php echo $homepageText; ?>
    </p>
  <?php endif; ?>
  <?php if (get_theme_option('Display Featured Item') == 1): ?>
    <!-- Featured Item -->
    <div id="featured-item">
      <h2><?php echo __('Featured Item'); ?></h2>
      <?php echo random_featured_items(1); ?>
    </div><!--end featured-item-->
  <?php endif; ?>
  <?php if (get_theme_option('Display Featured Collection')): ?>
    <!-- Featured Collection -->
    <div id="featured-collection">
      <h2><?php echo __('Featured Collection'); ?></h2>
      <?php echo random_featured_collection(); ?>
    </div><!-- end featured collection -->
  <?php endif; ?>
  <?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
    <!-- Featured Exhibit -->
    <?php echo exhibit_builder_display_random_featured_exhibit(); ?>
  <?php endif; ?>

</div><!-- end primary -->

<div id="secondary" style="margin-top:30px;">
  <?php
  $recentItems = get_theme_option('Homepage Recent Items');
  if ($recentItems === null || $recentItems === ''):
    $recentItems = 3;
  else:
    $recentItems = (int) $recentItems;
  endif;
  if ($recentItems):
    ?>
    <div id="recent-items">
      <h2><?php echo __('Recently Added Letters'); ?></h2>
      <?php echo recent_items($recentItems); ?>
    </div><!--end recent-items -->
  <?php endif; ?>

  <?php fire_plugin_hook('public_home', array('view' => $this)); ?>

</div><!-- end secondary -->
<?php echo foot(); ?>
