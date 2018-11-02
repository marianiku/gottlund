<?php
$bodyclass = 'page simple-page';
if ($is_home_page):
    $bodyclass .= ' simple-page-home';
endif;

$sp_title = metadata('simple_pages_page', 'title');

switch ($sp_title) {
  case "Markings Used in Transcriptions":
    $sp_title = __('Markings Used in Transcriptions');
    break;
  case "Preface":
    $sp_title = __('Preface');
    break;
}

echo head(array(
    'title' => $sp_title,
    'bodyclass' => $bodyclass,
    'bodyid' => metadata('simple_pages_page', 'slug')
));
?>
<div id="primary">
    <?php if (!$is_home_page): ?>
    <h2 style="margin-top: 1em; margin-bottom: 2em;"><?php echo $sp_title; ?></h2>
    <?php endif; ?>
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
    ?>
</div>

<?php echo foot(); ?>
<script type="text/javascript" src="//eu1.snoobi.com/snoop.php?tili=codicesfennici_fi"></script>
