<?php echo head(array('bodyid'=>'home', 'bodyclass' =>'two-col'));
?>

<div id="primary">
  <p style="text-align:left;"><img src="<?php echo img('gottlund.png'); ?>" /></p>
  <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
    <p><?php echo $homepageText; ?></p>
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
<script type="text/javascript" src="//eu1.snoobi.com/snoop.php?tili=codicesfennici_fi"></script>
