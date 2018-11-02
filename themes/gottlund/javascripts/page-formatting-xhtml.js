// Pagination

$(document).ready(function() {

    // wrap content between pb-tags (page tags) in DIV
    $('.pb').each(function() {
       if ($(this).nextUntil('.pb')) {
           $(this).nextUntil('.pb').andSelf().wrapAll('<div xmlns="http://www.w3.org/1999/xhtml" class="page"></div>');
       } else {
           $(this).nextAll('lg').andSelf().wrapAll('<div xmlns="http://www.w3.org/1999/xhtml" class="page"></div>');
       }
     });

    // hide all but first page at start
    $('.page').not('.page:eq(0)').hide();

});
