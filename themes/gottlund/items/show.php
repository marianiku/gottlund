<?php
/* Load scripts */
queue_js_file('jquery-1.12.4.min');
queue_js_file('page-formatting-xhtml');
queue_js_file('toggles-xhtml');
queue_js_file('uv-image-viewer-xhtml');

echo head(array('title' => metadata('item', array('Dublin Core', 'Title')),'bodyclass' => 'item show')); ?>

<h1 style="margin-bottom:1em;margin-top:0.5em;">
  <?php
  /* Display writing date for each item, format d.m.yyyy. If day/month is '00', display just year/month or year */
  $date = metadata('item', array('Dublin Core', 'Date'));
  $temp_date = $date;
  if (substr_count($date, '-00') == 0) {
    $temp_date = date('j.n.Y', strtotime($date));
  } else if (substr_count($date, '-00') == 1) {
    $temp_date = date('n.Y', strtotime(substr($date, 0, 7)));
  } else if (substr_count($date, '-00') > 1) {
    $temp_date = substr($date, 0, 4);
  }
  echo metadata('item', array('Dublin Core', 'Title')).", ".$temp_date;
?>
</h1>


<div id="exhibit3">
  <div id="exhibit3a">
    <?php
    echo get_specific_plugin_hook_output('UniversalViewer', 'public_items_show', array(
      'view' => $this,
      'record' => $item,
    ));
    ?>
  </div>
  <div id="exhibit3b">
    <!-- Buttons for showing/hiding transcription markings and commentaries, download link for TEI -->
    <span style="display:inline;float:left;">
      <input type="checkbox" onclick="toggleMarkingsXML()" checked/><?php echo __('Markings');?>&nbsp;&nbsp;
      <?php echo '<a style="color:#444444;border-bottom:none;" href="'
      .metadata('item', array('Item Type Metadata', 'XML')).'" download><i class="fa fa-download"></i> '
      ."TEI".'</a>';?>
    </span>
    <!-- Buttons for moving back and forth in pictures and transcription-->
    <span style="float:right;">
      <a id="btPrevXML" title="<?php echo __('Previous Page'); ?>" style="cursor:pointer;"><i class="fa fa-arrow-left"></i></a>
      <a id="btNextXML" title="<?php echo __('Next Page'); ?>" style="cursor:pointer;"><i class="fa fa-arrow-right"></i></a>
    </span>
    <!-- Frame for displaying commentaries -->
    <!-- Frame for displaying transcription -->
    <div class="textFrame">
      <?php
      // Load TEI file attached to item, load XSL stylesheet, transform TEI to XHTML
      $files = $item->Files;
      foreach ($files as $file):
        if ($file->getExtension() == 'xml'):
          $xmlDoc = new DOMDocument();
          $xmlDoc->load('http://localhost/gottlund/files/original/'.metadata($file,'filename'));
          $xslDoc = new DOMDocument();
          $xslDoc->load('http://localhost/gottlund/files/original/TEI-to-HTML.xsl');
          $proc = new XSLTProcessor();
          $proc->importStylesheet($xslDoc);
          echo $proc->transformToXML($xmlDoc);
        endif;
      endforeach;
      ?>
    </div>
  </div>
</div>

<!-- The following prints a list of all tags associated with the item -->
<?php if (metadata('item', 'has tags')): ?>
  <div id="item-tags" class="element">
    <h3><?php echo __('Tags'); ?></h3>
    <div class="element-text"><?php echo tag_string('item'); ?></div>
  </div>
<?php endif;?>

<nav>
  <ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
  </ul>
</nav>

<?php echo foot(); ?>
<script type="text/javascript" src="//eu1.snoobi.com/snoop.php?tili=codicesfennici_fi"></script>

<!-- The following prints a citation for this item. -->
<!--<div id="item-citation" class="element">
<h3><?php echo __('Citation'); ?></h3>
<div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
</div>-->

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<!--<?php if (metadata('item', 'Collection Name')): ?>
<div id="collection" class="element">
<h3><?php echo __('Collection'); ?></h3>
<div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>-->
