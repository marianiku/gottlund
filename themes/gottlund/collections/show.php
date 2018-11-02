<?php
$collectionTitle = strip_formatting(metadata('collection', array('Dublin Core', 'Title')));
?>

<?php echo head(array('title'=> $collectionTitle, 'bodyclass' => 'collections show')); ?>

<h1><?php echo $collectionTitle; ?></h1>

<p><?php echo metadata('collection', array('Dublin Core', 'Description')); ?></p>

<?php echo pagination_links(); ?>

<div id="collection-items">
    <?php if (metadata('collection', 'total_items') > 0): ?>
        <?php foreach (loop('items') as $item): ?>
        <?php $itemTitle = strip_formatting(metadata('item', array('Dublin Core', 'Title'))); ?>
        <div class="item hentry">
            <p><?php echo link_to_item($itemTitle, array('class'=>'permalink')); ?></p>

            <?php if (metadata('item', 'has thumbnail')): ?>
            <div class="item-img">
                <?php echo link_to_item(item_image('square_thumbnail', array('alt' => $itemTitle))); ?>
            </div>
            <?php endif; ?>
            <div class="item-date">
              <?php
              $date = metadata('item', array('Dublin Core', 'Date'));
              echo "Kirjoitusaika: ".date('j.n.Y', strtotime($date)); ?>
            </div>
            <?php if ($text = metadata('item', array('Item Type Metadata', 'Text'), array('snippet'=>250))): ?>
            <div class="item-description">
                <p>
                  <?php echo $text; ?>
                </p>
            </div>
            <?php elseif ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet'=>250))): ?>
            <div class="item-description">
                <?php echo $description; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p><?php echo __("Kokoelmassa ei ole kirjeitä."); ?></p>
    <?php endif; ?>
</div><!-- end collection-items -->

<?php fire_plugin_hook('public_collections_show', array('view' => $this, 'collection' => $collection)); ?>

<?php echo foot(); ?>
<script type="text/javascript" src="//eu1.snoobi.com/snoop.php?tili=codicesfennici_fi"></script>
