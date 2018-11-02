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
          case "Lönnrot &gt; Rabbe, Frans Johan":
            $years = '1833 - 1871';
            break;
          case "Lönnrot &gt; Castrén, Matthias Alexander":
            $years = '1839 - 1851';
            break;
          case "Lönnrot &gt; Keckman, Carl Niklas":
            $years = '1826 - 1838';
            break;
          case "Lönnrot &gt; Elmgren, Sven Gabriel":
            $years = '1848 - 1865';
            break;
          case "Lönnrot &gt; Ahlqvist, August Engelbrekt":
            $years = '1845 - 1881';
            break;
          case "Lönnrot &gt; Borg, Carl Gustaf":
            $years = '1863 - 1884';
            break;
          case "Lönnrot &gt; Cajan, Johan Fredrik":
            $years = '1836 - 1845';
            break;
          case "Lönnrot &gt; Collan, Fabian":
            $years = '1834 - 1852';
            break;
          case "Lönnrot &gt; Europaeus, David Emanuel Daniel":
            $years = '1845 - 1850';
            break;
          case "Lönnrot &gt; Ilmoni, Immanuel":
            $years = '1833 - 1849';
            break;
          case "Lönnrot &gt; Lindfors, Mårten Johan":
            $years = '1835 - 1843';
            break;
          case "Lönnrot &gt; Saxa, Carl":
            $years = '1833 - 1848';
            break;
          case "Lönnrot &gt; Sjögren, Anders Johan":
            $years = '1840 - 1852';
            break;
          case "Lönnrot &gt; Ståhlberg, Carl Henrik":
            $years = '1836 - 1876';
            break;
          case "Lönnrot &gt; Ticklén, Johan Fredrik":
            $years = '1833 - 1837';
            break;
          case "Lönnrot &gt; Warelius, Antero":
            $years = '1848 - 1883';
            break;
          case "Lönnrot &gt; Schildt-Kilpinen, Wolmar Styrbjörn":
            $years = '1843 - 1874';
            break;
          case "Lönnrot &gt; Granlund, Johan Fredrik":
            $years = '1856 - 1874';
            break;
          case "Lönnrot &gt; Akiander, Matthias":
            $years = '1840 - 1869';
            break;
          case "Lönnrot &gt; Barck, Christian Evert":
            $years = '1833 - 1865';
            break;
          case "Lönnrot &gt; Roos, Samuel":
            $years = '1831 - 1847';
            break;
          case "Lönnrot &gt; Snellman, Johan Vilhelm":
            $years = '1844 - 1868';
            break;
          case "Lönnrot &gt; Thuneberg, Bengt Adolf":
            $years = '1833 - 1840';
            break;
          case "Lönnrot &gt; Tikkanen, Paavo":
            $years = '1849 - 1870';
            break;
          case "Lönnrot &gt; Appelgren, Simon Wilhelm":
            $years = '1833 - 1837';
            break;
          case "Lönnrot &gt; Asp, Gustaf":
            $years = '1842 - 1849';
            break;
          case "Lönnrot &gt; Forbus, Adolf":
            $years = '1833 - 1868';
            break;
          case "Lönnrot &gt; Hedberg, Andreas Erik":
            $years = '1833 - 1836';
            break;
          case "Lönnrot &gt; Höglund, Anders Magnus":
            $years = '1833 - 1849';
            break;
          case "Lönnrot &gt; Ingman, Erik Alexander":
            $years = '1834 - 1836';
            break;
          case "Lönnrot &gt; Ingman, Anders Wilhelm":
            $years = '1848 - 1872';
            break;
          case "Lönnrot &gt; Kellgren, August":
            $years = '1834 - 1847';
            break;
          case "Lönnrot &gt; Kiljander, Karl Mårten":
            $years = '1847 - 1871';
            break;
          case "Lönnrot &gt; Krohn, Julius Leopold Fredrik":
            $years = '1863 - 1882';
            break;
          case "Lönnrot &gt; Lindh, Anton":
            $years = '1847 - 1850';
            break;
          case "Lönnrot &gt; Linsén, Johan Gabriel":
            $years = '1834 - 1838';
            break;
          case "Lönnrot &gt; Rein, Gabriel":
            $years = '1835 - 1866';
            break;
          case "Lönnrot &gt; Rothsten, Frans Wilhelm":
            $years = '1871 - 1880';
            break;
          case "Lönnrot &gt; Skogman, Daniel Johan":
            $years = '1833 - 1836';
            break;
          case "Lönnrot &gt; Öhman, Alexander Constantin":
            $years = '1842 - 1847';
            break;
          case "Lönnrot &gt; Cannelin, Gustaf":
            $years = '1848 - 1875';
            break;
          case "Lönnrot &gt; Dahlberg, Karl":
            $years = '1869 - 1872';
            break;
          case "Lönnrot &gt; Ehrström, Carl Robert":
            $years = '1838 - 1877';
            break;
          case "Lönnrot &gt; Elfving, Johan Fredrik":
            $years = '1831 - 1874';
            break;
          case "Lönnrot &gt; Flander, Carl Peter":
            $years = '1835 - 1855';
            break;
          case "Lönnrot &gt; Runeberg, Johan Ludvig":
            $years = '1833 - 1838';
            break;
          case "Lönnrot &gt; Runeberg, Fredrika Charlotta":
            $years = '1833 - 1838';
            break;
          case "Lönnrot &gt; Törnegren, Carl Wilhelm":
            $years = '1824 - 1858';
            break;
          case "Lönnrot &gt; Törngren, Adolf":
            $years = '1828 - 1850';
            break;
          case "Lönnrot &gt; Törngren, Eva Agatha":
            $years = '1828 - 1847';
            break;
          case "Lönnrot &gt; Toppelius, Gustaf":
            $years = '1833 - 1853';
            break;
          case "Lönnrot &gt; Wirzén, Johan Ernst Adhemar":
            $years = '1833 - 1843';
            break;
          case "Lönnrot &gt; Frosterus, Robert Valentin":
            $years = '1847 - 1850';
            break;
          case "Lönnrot &gt; Holmström, Anders Nils":
            $years = '1837 - 1857';
            break;
          case "Lönnrot &gt; Johansson, Gustaf":
            $years = '1868 - 1872';
            break;
          case "Lönnrot &gt; Liljeblad, Jakob Fredrik":
            $years = '1835 - 1843';
            break;
          case "Lönnrot &gt; Savolin, Emil Joakim":
            $years = '1872 - 1878';
            break;
          case "Lönnrot &gt; Sirén, Carl Wilhelm":
            $years = '1844 - 1849';
            break;
          case "Lönnrot &gt; Essen von, Carl Gustav":
            $years = '1869 - 1883';
            break;
          case "Lönnrot &gt; Aejmelaeus, Carl":
            $years = '1834 - 1849';
            break;
          case "Lönnrot &gt; Appelgren, Gustaf Wilhelm":
            $years = '1859 - 1861';
            break;
          case "Lönnrot &gt; Haartman von, Carl Daniel":
            $years = '1835 - 1848';
            break;
          case "Lönnrot &gt; Topelius, Zacharias":
            $years = '1847 - 1882';
            break;
          case "Lönnrot &gt; Lagus, Jakob Johan Wilhelm":
            $years = '1870 - 1881';
            break;
          case "Lönnrot &gt; Karsten, Johan Anton":
            $years = '1843 - 1850';
            break;
          case "Lönnrot &gt; Lagervall, Jakob Fredrik":
            $years = '1836 - 1847';
            break;
          case "Lönnrot &gt; Lilius, Karl Adolf":
            $years = '1849 - 1853';
            break;
          case "Lönnrot &gt; Gottlund, Carl Axel":
            $years = '1829 - 1849';
            break;
          case "Family letters":
            $years = '1826 - 1883';
            break;
          case "Lönnrot &gt; Meurman, Otto Adolf Daniel":
            $years = '1847 - 1849';
            break;
          case "Lönnrot &gt; Bergström, I.":
            $years = '1835 - 1850';
            break;
          case "Lönnrot &gt; Heickell, Carl":
            $years = '1835';
            break;
          case "Lönnrot &gt; Hortling, Johan":
            $years = '1833 - 1853';
            break;
          case "Lönnrot &gt; Perander, Amalia":
            $years = '1860 - 1871';
            break;
          case "Lönnrot &gt; Perander, Sophie Louise":
            $years = '1868 - 1871';
            break;
          case "Lönnrot &gt; Sabelli, Johan Erik":
            $years = '1834 - 1835';
            break;
          case "Lönnrot &gt; Sachsendahl, Emil":
            $years = '1847 - 1851';
            break;
          case "Lönnrot &gt; Stockfleth, N. J. C. V.":
            $years = '1839 - 1849';
            break;
          case "Lönnrot &gt; Slöör, Karl":
            $years = '1869';
            break;
          case "Lönnrot &gt; Öhman, Johan Edvard":
            $years = '1843';
            break;
          case "Lönnrot &gt; Wasenius, G. O.":
            $years = '1837 - 1838';
            break;
          case "Lönnrot &gt; Malmgren, Petter":
            $years = '1848 - 1849';
            break;
          case "Lönnrot &gt; Bisi, Eric":
            $years = '1839 - 1849';
            break;
          case "Lönnrot &gt; Holmström, J.":
            $years = '1834 - 1839';
            break;
          case "Lönnrot &gt; Emeleus, Curt":
            $years = '1834 - 1835';
            break;
          case "Lönnrot &gt; Jurva, Karl Adolf":
            $years = '1872 - 1873';
            break;
          case "Diverse letters":
            $years = '1826 - 1884';
            break;
          case "Lists of recipients":
            $years = '1826 - 1884';
            break;
          case "Lönnrot &gt; Wichmann, Johan Kristian":
            $years = '1833 - 1847';
            break;
          case "Lönnrot &gt; Ticklén, Pehr":
            $years = '1835 - 1847';
            break;
          case "Lönnrot &gt; Tengström, Fr.":
            $years = '1834 - 1836';
            break;
          case "Lönnrot &gt; Salin, Serafina":
            $years = '1870 - 1875';
            break;
          case "Lönnrot &gt; Bergh, Johan Fredrik":
            $years = '1839 - 1863';
            break;
          case "Lönnrot &gt; Bäckvall, Johan":
            $years = '1847 - 1858';
            break;
          case "Lönnrot &gt; Durchman, Josef Wilhelm":
            $years = '1834 - 1870';
            break;
          case "Lönnrot &gt; Castrén, A. G.":
            $years = '1833 - 1852';
            break;
          case "Lönnrot &gt; Ståhlberg, F. A.":
            $years = '1851 - 1853';
            break;
          case "Lönnrot &gt; Borg, Aron Gustaf":
            $years = '1843 - 1881';
            break;
          case "Lönnrot &gt; Roos, Anders Jakob":
            $years = '1843 - 1849';
            break;
          case "Lönnrot &gt; Forssell, M.":
            $years = '1834 - 1836';
            break;
          case "Lönnrot &gt; Dahl, O. E.":
            $years = '1844 - 1853';
            break;
          case "Lönnrot &gt; Rajander, Anders":
            $years = '1847 - 1852';
            break;
          case "Lönnrot &gt; Malmgren, Anders Johan":
            $years = '1833 - 1873';
            break;
          case "Lönnrot &gt; Elfström":
            $years = '1850';
            break;
          case "Lönnrot &gt; Friman, Johan Alexander":
            $years = '1870';
            break;
          case "Lönnrot &gt; Högman, Gustaf Fredrik":
            $years = '1835 - 1849';
            break;
          case "Lönnrot &gt; Gosman, Carl E.":
            $years = '1835 - 1837';
            break;
          case "Lönnrot &gt; Ekelund, E.":
            $years = '1849 - 1850';
            break;
          case "Lönnrot &gt; Edlund, Gustaf Wilhelm":
            $years = '1870 - 1873';
            break;
          case "Lönnrot &gt; Collan, Claës":
            $years = '1834';
            break;
          case "Lönnrot &gt; Hougberg, M. V.":
            $years = '1836 - 1838';
            break;
          case "Lönnrot &gt; Durchman, J.":
            $years = '1835 - 1838';
            break;
          case "Lönnrot &gt; Frosterus, C. J.":
            $years = '1834 - 1853';
            break;
          case "Lönnrot &gt; Fellman, Jakob":
            $years = '1845 - 1856';
            break;
          case "Lönnrot &gt; Hahnsson, Johan Adrian":
            $years = '1848 - 1880';
            break;
          case "Lönnrot &gt; Carger, Henric":
            $years = '1833';
            break;
          case "Lönnrot &gt; Becker von, Frans":
            $years = '1848 - 1849';
            break;
          case "Lönnrot &gt; Bjugg, Lorenz Johan":
            $years = '1831 - 1835';
            break;
          case "Lönnrot &gt; Landzett, Clem":
            $years = '1870 - 1873';
            break;
          case "Lönnrot &gt; Latysev, Ivan Vasiljevits":
            $years = '1842 - 1843';
            break;
          case "Lönnrot &gt; Löwenmark, Gustaf":
            $years = '1849 - 1850';
            break;
          case "Lönnrot &gt; Lavonius, Alexander":
            $years = '1849 - 1872';
            break;
          case "Lönnrot &gt; Maconi, Peter Henrik":
            $years = '1835 - 1836';
            break;
          case "Lönnrot &gt; Melander, H. L.":
            $years = '1847';
            break;
          case "Lönnrot &gt; Montgomery, Edvard":
            $years = '1836 - 1839';
            break;
          case "Lönnrot &gt; Ståhlberg, Jacob Gabriel":
            $years = '1843 - 1851';
            break;
          case "Lönnrot &gt; Planting, Herman":
            $years = '1840 - 1849';
            break;
          case "Lönnrot &gt; Wallenius, Hilma":
            $years = '1872';
            break;
          case "Lönnrot &gt; Wegelius, Birger":
            $years = '1840 - 1847';
            break;
          case "Lönnrot &gt; Wennberg, Anders":
            $years = '1843 - 1868';
            break;
          case "Lönnrot &gt; Örnhjelm, Carl Erik":
            $years = '1836 - 1838';
            break;
          case "Lönnrot &gt; Lang, Adolf Reinhold":
            $years = '1835 - 1868';
            break;
          case "Lönnrot &gt; Lang, Adolf Reinhold &amp; Cavonius, Gustaf Adolf":
            $years = '1833';
            break;
          case "Lönnrot &gt; Neovius, Anders Fabian":
            $years = '1831 - 1835';
            break;
          case "Lönnrot &gt; Ravelin, Henrik":
            $years = '1850 - 1851';
            break;
          case "Lönnrot &gt; Ingman, Anna &amp; Eva":
            $years = '1867 - 1871';
            break;
          case "Lönnrot &gt; Elfving, Betty":
            $years = '1876 - 1880';
            break;
          case "Lönnrot &gt; Ahlstubbe, Lars Isaak":
            $years = '1833 - 1835';
            break;
          case "Lönnrot &gt; Alcenius, E. R.":
            $years = '1834 - 1836';
            break;
          case "Lönnrot &gt; Collan, Karl":
            $years = '1868 - 1871';
            break;
          case "Lönnrot &gt; Cygnaeus, Uno":
            $years = '1872 - 1879';
            break;
          case "Lönnrot &gt; Hazelius, Arthur":
            $years = '1872';
            break;
          case "Lönnrot &gt; Lagus, Eliel Thiodolf":
            $years = '1859 - 1872';
            break;
          case "Lönnrot &gt; Lindström, Knut Legat":
            $years = '1872 - 1875';
            break;
          case "Lönnrot &gt; Malmström, K. R.":
            $years = '1872 - 1875';
            break;
          case "Lönnrot &gt; Rafn, Carl Christian":
            $years = '1834 - 1842';
            break;
          case "Lönnrot &gt; Reinholm, Henrik August":
            $years = '1848 - 1849';
            break;
          case "Lönnrot &gt; Törmänen, Carl Edvard":
            $years = '1872 - 1873';
            break;
          case "Lönnrot &gt; Föreningen för värnlösa barns uppfostran":
            $years = '1870 - 1874';
            break;
          case "Lönnrot &gt; Bergenheim, Edvard":
            $years = '1863 - 1870';
            break;
          case "Lönnrot &gt; Grot, Jakov Karlovits":
            $years = '1840 - 1882';
            break;
          case "Lönnrot &gt; Suomalaisen Kirjallisuuden Seura":
            $years = '1831 - 1878';
            break;
          case "Lönnrot &gt; Cygnaeus, Fredrik":
            $years = '1852 - 1873';
            break;
          case "Lönnrot &gt; Helsingfors Morgonblad":
            $years = '1842 - 1877';
            break;
          case "Lönnrot &gt; Willebrand von, Knut Felix":
            $years = '1839 - 1869';
            break;
          case "Lönnrot &gt; Törngren, Johan Agapetus":
            $years = '1833 - 1836';
            break;
          case "Lönnrot &gt; Yliopiston rehtori":
            $years = '1828 - 1832';
            break;
          case "Lönnrot &gt; Finnish Literature Society":
            $years = '1831 - 1880';
            break;
          case __('Lönnrot &gt; Finnish Literature Society'):
            $years = '1831 - 1880';
            break;
          case "Lönnrot &gt; Finska Litteratursällskapet":
            $years = '1831 - 1880';
            break;
          case "Lönnrot &gt; Aschans Bokhandel":
            $years = '1849 - 1850';
            break;
          case "Lönnrot &gt; Forsström, Carl Johan":
            $years = '1853';
            break;
          case "Lönnrot &gt; Lagerborg, Robert Wilhelm":
            $years = '1833 - 1840';
            break;
          case "Lönnrot &gt; Monell, Gregor":
            $years = '1855 - 1882';
            break;
          case "Lönnrot &gt; Piponius, Jakobina":
            $years = '1849 - 1850';
            break;
          case "Lönnrot &gt; Rafn, Carl Christian":
            $years = '1834 - 1842';
            break;
          case "Lönnrot &gt; Durchman, Anders":
            $years = '1833 - 1850';
            break;
          case __('Lönnrot &gt; University rector'):
            $years = '1828 - 1832';
            break;
          case "Lönnrot &gt; Kejserliga Finska Hushållningssällskapet i Åbo":
            $years = '1857 - 1859';
            break;
          case "Lönnrot &gt; Malmström, Karl-Robert":
            $years = '1872 - 1875';
            break;
          case "Lönnrot &gt; Jalava, Antti":
            $years = '1873';
            break;
          case "Lönnrot &gt; Zetterqvist, Carl Gustaf":
            $years = '1845 - 1857';
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
          <?php $descr = __('%1$s letters, %2$s', $count, $years);
          /*metadata('collection', array('Dublin Core', 'Subject'));*/ ?>
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
