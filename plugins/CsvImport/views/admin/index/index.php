<?php
    echo head(array('title' => __('CSV Import')));
?>
<?php echo common('csvimport-nav'); ?>
<div id="primary">
    <?php echo flash(); ?>
    <h2><?php echo __('Step 1: Select file and item settings'); ?></h2>
    <?php echo $this->form; ?>
</div>
<script type="text/javascript">
//<![CDATA[
jQuery(document).ready(function () {
    jQuery('#column_delimiter_name').click(Omeka.CsvImport.updateColumnDelimiterField);
    jQuery('#enclosure_name').click(Omeka.CsvImport.updateEnclosureField);
    jQuery('#element_delimiter_name').click(Omeka.CsvImport.updateElementDelimiterField);
    jQuery('#tag_delimiter_name').click(Omeka.CsvImport.updateTagDelimiterField);
    jQuery('#file_delimiter_name').click(Omeka.CsvImport.updateFileDelimiterField);
    Omeka.CsvImport.updateOnLoad(); // Need this to reset invalid forms.
});
//]]>
</script>
<?php
    echo foot();
