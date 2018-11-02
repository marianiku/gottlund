<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>

    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <span id="elementTitle"><?php echo html_escape(__($elementName)); ?></span><br />
        <?php foreach ($elementInfo['texts'] as $text): ?>

          <?php
           if ($elementName == 'XML-tiedosto' || strpos($elementName, 'Kuva') !== false) {
		           $text = str_replace('http://localhost/uploads/', '', $text);
           }
	        ?>
          <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;
