<!-- Some English titles replaced with Finnish ones -->
<?php
$pageTitle = __('Collections');
echo head(array('title'=>$pageTitle,'bodyclass' => 'collections browse'));
?>

<?php echo pagination_links(); ?>

<?php
/* Sort options for collections: title, added date */
$sortLinks[__('Title')] = 'Dublin Core,Title';
$sortLinks[__('Date Added')] = 'added';
?>
<div id="sort-links">
  <span><?php echo __('(%s collections)', $total_results); ?></span>
  <span class="sort-label"><?php echo __('Sort by: '); ?></span><?php echo browse_sort_links($sortLinks); ?>
</div>

<div id="collection-list">
  <?php foreach (loop('collections') as $collection): ?>

    <div class="collection">

      <!-- Link to separate collection page replaced with link to items in the collection; variable for correspondence years,
      value depends on collection title -->
      <h2 style="padding-bottom: 0.5em;">
        <?php $title = metadata('collection', array('Dublin Core', 'Title'));
        $years = '';
        switch ($title) {
          case "Andersson, Anders":
            $years = '1831';
            break;
          case "Andersson, Mårten":
            $years = '1821';
            break;
          case "Hakkarainen, Josef Hindriksson":
            $years = '1812 - 1826';
            break;
          case "Hartikainen, Hindrik Hindriksson":
            $years = '1822';
            break;
          case "Havuinen, Johan Nilson":
            $years = '1822';
            break;
          case "Hindriksson, Joseph":
            $years = '1822';
            break;
          case "Honkoinen, Johan Olssen":
            $years = '1822';
            break;
          case "Hähmä, Olli Martinpoika":
            $years = '1823';
            break;
          case "Hämäläinen, Matti":
            $years = '1830 - 1831';
            break;
          case "Hämäläinen, Matts Olsson":
            $years = '1830';
            break;
          case "Hämäläinen, Olof":
            $years = '1823';
            break;
          case "Immoinen, Staffan":
            $years = '1824 - 1826';
            break;
          case "Johnsen, Ole":
            $years = '1821';
            break;
          case "Karvainen, Johannes Pederson":
            $years = '1866';
            break;
          case "Karvainen, Pekka Matinpoika":
            $years = '1823 - 1873';
            break;
          case "Kavalainen, Hindrik Mattson (Heikki Matinpoika)":
            $years = '0000';
            break;
          case "Kavalainen, Matts (Matti)":
            $years = '1822';
            break;
          case "Kiiskinen, Tahvo":
            $years = '1823';
            break;
          case "Kymöinen, Lauri":
            $years = '1823';
            break;
          case "Kähköinen, Jan Jansson":
            $years = '1823';
            break;
          case "Lehmoinen, Daniel Halvorsen":
            $years = '1822';
            break;
          case "Liukkoinen, Jan Mattson":
            $years = '1822 - 1823';
            break;
          case "Moijainen, Nils Nilsson":
            $years = '1823';
            break;
          case "Muhoinen, Olof Olsson":
            $years = '1823';
            break;
          case "Mulikka, Heikki Ollinpoika":
            $years = '1823';
            break;
          case "Mulikka, Olli Ollinpoika":
            $years = '1823';
            break;
          case "Månsson, Petter":
            $years = '1823';
            break;
          case "Oinoinen, Olli Ollinpoika":
            $years = '1823';
            break;
          case "Orainen, Erich":
            $years = '1822';
            break;
          case "Orainen, Matts Påhlsson":
            $years = '1831';
            break;
          case "Orainen, Nils":
            $years = '1822';
            break;
          case "Orainen, Nils Nilsson":
            $years = '1822 - 1831';
            break;
          case "Orainen, Olof Nilsson":
            $years = '1822';
            break;
          case "Porkka, Antti":
            $years = '1822 - 1832';
            break;
          case "Reituinen, Matti (Mattes) Mattesson":
            $years = '1822';
            break;
          case "Riekinen, Anders Andersson":
            $years = '1831';
            break;
          case "Riekinen, Jan Jansson":
            $years = '1823 - 1831';
            break;
          case "Riekkinen, Johan":
            $years = '1822';
            break;
          case "Riekkinen, Nils Sigfridsson":
            $years = '1823';
            break;
          case "Räisäinen, Juhoi":
            $years = '1825 - 1848';
            break;
          case "Räisäinen, Paavo":
            $years = '1822 - 1848';
            break;
          case "Rämäinen, Maria Olsdotter":
            $years = '1831';
            break;
          case "Sikainen, Heikki Pietarinpoika":
            $years = '1823';
            break;
          case "Sikainen, Tahvo (Staffan Carlsen)":
            $years = '1823';
            break;
          case "Siekkinen, Olof Danielsson":
            $years = '1825';
            break;
          case "Soikainen, Brita Jansdotter":
            $years = '1831';
            break;
          case "Soikkainen, Erik":
            $years = '1831';
            break;
          case "Soikkainen, Jaan/Johan (Juhoi)":
            $years = '1823 - 1831';
            break;
          case "Soikkaiset (Alla Bogsfinnar)":
            $years = '1831';
            break;
          case "Tarwainen, Hindrich Jansson":
            $years = '1822';
            break;
          case "Torbjörnson, Ammun A.T.S.":
            $years = '1829';
            break;
          case "Toiskainen, Peder Mathisen":
            $years = '1826';
            break;
          case "Walkoinen, Mickoi Heikinpoika":
            $years = '1823';
            break;
        }
        ?>
        <?php echo link_to_items_browse(__($title), array('collection' => metadata('collection', 'id'))); ?>
        <?php $count = metadata($collection, 'total_items');
        /* Show number of letters and correspondence years for each collection */
        /*echo __('(%1$s letters, %2$s)', $count, $years);*/
        ?>
      </h2>
      <?php if ($collectionImage = record_image('collection', 'square_thumbnail')): ?>
        <!-- Link to separate collection page removed from collection thumbnail -->
        <div class="image"><?php echo $collectionImage; ?></div>
      <?php endif; ?>

      <?php if (metadata('collection', array('Dublin Core', 'Subject'))): ?>
        <div class="collection-description">
          <?php $count = metadata($collection, 'total_items');
          /* Show number of letters and correspondence years for each collection */
          ?>
          <?php if ($count > 1) : ?>
            <?php $descr = __('%1$s letters, %2$s', $count, $years); ?>
          <?php else : ?>
            <?php $descr = __('%1$s letter, %2$s', $count, $years); ?>
          <?php endif ?>
          <?php /*metadata('collection', array('Dublin Core', 'Subject'));*/ ?>
          <?php echo text_to_paragraphs(__($descr));  ?>
          <?php echo text_to_paragraphs(metadata('collection', array('Dublin Core', 'Description'))); ?>
        </div>
      <?php endif; ?>

      <?php if ($collection->hasContributor()): ?>
        <div class="collection-contributors">
          <p>
            <strong><?php echo __('Contributors'); ?>:</strong>
            <?php echo metadata('collection', array('Dublin Core', 'Contributor'), array('all'=>true, 'delimiter'=>', ')); ?>
          </p>
        </div>
      <?php endif; ?>

      <p class="view-items-link">&#8594; <?php echo link_to_items_browse(__('Letters in the collection', metadata('collection', array('Dublin Core', 'Title'))), array('collection' => metadata('collection', 'id'))); ?></p>

      <?php fire_plugin_hook('public_collections_browse_each', array('view' => $this, 'collection' => $collection)); ?>

    </div><!-- end class="collection" -->

  <?php endforeach; ?>
</div>
<?php echo pagination_links(); ?>

<?php fire_plugin_hook('public_collections_browse', array('collections'=>$collections, 'view' => $this)); ?>

<?php echo foot(); ?>
<script type="text/javascript" src="//eu1.snoobi.com/snoop.php?tili=codicesfennici_fi"></script>
