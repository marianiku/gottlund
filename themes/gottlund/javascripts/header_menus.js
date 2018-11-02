$(document).ready(function() {

   /* Open/close extended search form */
   $('#searchbtn').click(function() {

     if ($('#ext-search').is(':hidden')) {
       $('#ext-search').slideDown('fast', function() {});
       /* preselect 'contains' in FI/SE/EN */
       $('select[title = "Haun tyyppi"]')
       .find('option[value="contains"]')
       .attr('selected', true)
       $('select[title = "Search Type"]')
       .find('option[value="contains"]')
       .attr('selected', true)
       $('select[title = "Sök typ"]')
       .find('option[value="contains"]')
       .attr('selected', true)
     } else {
       $('#ext-search').slideUp('fast', function() {});
     }
   });

   /* This is for hiding the applied facets background in Solr search results
   when facets are not applied */
   if ($('#solr-applied-facets ul li').size() == 0) {
     $('#solr-applied-facets ul').hide();
   }

});
