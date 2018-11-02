<!-- Some English titles replaced with Finnish ones-->
<?php
$pageTitle = __('Browse Items');
echo head(array('title'=>$pageTitle,'bodyclass' => 'items browse'));
?>

<!--<h3 style="margin-top:0.5em;margin:left:0.5em;margin-bottom:none;"><?php echo __('%s total', $total_results); ?></h3>-->

<!--<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>-->




<?php if ($total_results > 0): ?>

<?php

/* Sort options for items: writing date, recipient (in title) */
$sortLinks[__('Date')] = 'Dublin Core,Date';
$sortLinks[__('Recipient')] = 'Dublin Core,Title';
?>

<div style="float:left;width:100%;">
  <?php echo item_search_filters(); ?>
  <span style="font-size: 20px;display:inline;">
    <?php echo __("%s letters", $total_results); ?>
    <!-- buttons for downloading TEI files as zip, transcriptions as plain text -->
    <form class="zip" method='post' action=''>
      <label for="tei"><i class="fa fa-download"></i> <?php echo __('Download TEI Files'); ?></label>
      <input id="tei" type='submit' name='tei' hidden />
    </form>
    <form class="txt-browse" method='post' action=''>
      <label for="txt-browse"><i class="fa fa-download"></i> <?php echo __('Download transcriptions'); ?></label>
      <input id="txt-browse" type='submit' name='txt-browse' hidden />
    </form>
  </span>
</div>

<div id="sort-links">
    <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<?php echo pagination_links(); ?>
<?php endif; ?>

<div id="item-main-list">
  <?php if ($total_results == 0): ?>
    <p><?php echo __('The Search returned no results'); ?></p>
  <?php else: ?>
    <?php foreach (loop('items') as $item): ?>
      <div class="item hentry">
        <p><?php echo link_to_item(metadata('item', array('Dublin Core', 'Title')), array('class'=>'permalink')); ?></p>
        <div class="item-meta">
          <?php if (metadata('item', 'has files')): ?>
            <div class="item-img">
              <?php echo link_to_item(item_image('square_thumbnail')); ?>
            </div>
          <?php endif; ?>

          <?php if ($date = metadata('item', array('Dublin Core', 'Date'), array('snippet'=>250))): ?>
            <div class="item-date">
              <?php
              /* Display writing date for each item, format d.m.yyyy. If day/month is '00', display just year/month or year */
              if (substr_count($date, '-00') == 0) {
                echo __('Date').': '.date('j.n.Y', strtotime($date));
              } else if (substr_count($date, '-00') == 1) {
                echo __('Date').': '.date('n.Y', strtotime(substr($date, 0, 7)));
              } else if (substr_count($date, '-00') > 1) {
                echo __('Date').': '.substr($date, 0, 4);
              }
              ?>

            </div>
          <?php else: ?>
            <div class="item-date">
              <?php
              echo __('Date').': '; ?>
            </div>
          <?php endif; ?>

          <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
            <div class="item-description">
              <!--replace description with translatable 'sent from' + location picked from TEI-->
              <?php $files = $item->Files;
              foreach($files as $file) {
                if ($file->getExtension() == 'xml') {
                  $xml = simplexml_load_file("http://lonnrot.finlit.fi/omeka/files/original/".metadata($file,'filename'));
                  $location = $xml->text->body->div->opener->dateline->placeName;
                  if ($location == 'puuttuu') { // if location 'puuttuu'/'empty', replace with translatable word
                    $location = str_replace($location, __('missing'), $location);
                  }
                  echo __('Sent from').': '.$location;
                }
              }
              ?>
            </div>
          <?php endif; ?>
          <!-- adding document type to item listings, needs translations -->
          <?php if ($type = metadata('item', array('Dublin Core', 'Type'), array('snippet'=>250))): ?>
            <?php $type = str_replace('merkinta_konseptikirjassa', __('note in draft letter book'), $type);
                $type = str_replace('kirjekonsepti', __('draft letter'), $type);
                $type = str_replace('kirje', __('letter'), $type);
            ?>
            <div style="margin-top:1em;">
              <!--replace description with translatable 'sent from' + location picked from TEI-->
              <?php if ($type == 'merkinta_konseptikirjassa') {
                echo 'merkintä konseptikirjassa';
              } else {
                echo $type;
              }
              ?>
            </div>
          <?php endif; ?>

          <?php if (metadata('item', 'has tags')): ?>
            <div class="tags"><p><strong><?php echo __('Tags'); ?>:</strong>
              <?php echo tag_string('items'); ?></p>
            </div>
          <?php endif; ?>

          <?php fire_plugin_hook('public_items_browse_each', array('view' => $this, 'item' =>$item)); ?>

        </div><!-- end class="item-meta" -->
      </div><!-- end class="item hentry" -->
    <?php endforeach; ?>
  <?php endif; ?>
</div>

<?php echo pagination_links(); ?>

<div id="outputs">
    <span class="outputs-label"><?php echo __('Formats:'); ?></span>
    <?php echo output_format_list(false); ?>
</div>

<?php fire_plugin_hook('public_items_browse', array('items'=>$items, 'view' => $this)); ?>

<?php echo foot(); ?>
<script type="text/javascript" src="//eu1.snoobi.com/snoop.php?tili=codicesfennici_fi"></script>
