<div class="item record">
    <?php
    $title = metadata($item, array('Dublin Core', 'Title'));
    $date = metadata($item, array('Dublin Core', 'Date'));
    ?>
    <h3><?php echo link_to($item, 'show', strip_formatting($title)); ?></h3>
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image('square_thumbnail', array(), 0, $item),
            array('class' => 'image'), 'show', $item
        );
    }
    ?>
    <!-- recent items: date in format d.m.yyyy; -->
        <p class="item-description">
          <?php $date = metadata($item, array('Dublin Core', 'Date'));
          $temp_date = $date;
          if (substr_count($date, '-00') == 0) {
            $temp_date = date('j.n.Y', strtotime($date));
          } else if (substr_count($date, '-00') == 1) {
            $temp_date = date('n.Y', strtotime(substr($date, 0, 7)));
          } else if (substr_count($date, '-00') > 1) {
            $temp_date = substr($date, 0, 4);
          }
          ?>
          <?php echo __('Date').": ".$temp_date; ?><br />
          <?php echo "Kirjoituspaikka: ".metadata($item, array('Item Type Metadata','Location')); ?>
        </p>
</div>
