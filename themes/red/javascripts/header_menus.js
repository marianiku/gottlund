$(document).ready(function() {

   /* Open/close extended search form */
   $('#searchbtn').click(function() {

     if ($('#ext-search').is(':hidden')) {
       $('#ext-search').slideDown('fast', function() {});
       $('select[title = "Haun tyyppi"]')
       .find('option[value="contains"]')
       .attr('selected', true)
       /*$('select[title = "Hakutyyppi"]').hide();*/
     } else {
       $('#ext-search').slideUp('fast', function() {});
     }
   });

   /* Open/close instruction links menu */
   $('#infobtn').click(function() {
     if ($('#instructions').is(':hidden')) {
       $('#instructions').slideDown('fast', function() {});
     } else {
       $('#instructions').slideUp('fast', function() {});
     }
   });

   /* This is for hiding the applied facets background in Solr search results
   when facets are not applied */
   if ($('#solr-applied-facets ul li').size() == 0) {
     $('#solr-applied-facets ul').hide();
   }

});
