// Pagination of XHTML-transformed TEI file

$(document).ready(function() {


  // Loop through p-elements in text frame, move page breaks (.pb) from inside
  // p-elements to same level with them
  $('.textFrame p').each(function() {

    // If p-element has one page break element
    if ($(this).children('.pb') && $(this).children('.pb').length == 1) {

      // page break element stored in variable
      var child = $(this).find('.pb');

      // split p-element HTML in two at page break element, store in array
      var content = $(this).html().split(child[0].outerHTML);

      // replace p-element's original HTML with above two parts wrapped in p-tags,
      //  with page break in between.
      $(this).replaceWith('<p xmlns="http://www.w3.org/1999/xhtml">' +
      content[0] + '</p>' + child[0].outerHTML + '<p xmlns="http://www.w3.org/1999/xhtml">'
      + content[1] + '</p>');
    }

    // If p-element has multiple page break elements (.pb)
    if ($(this).children('.pb') && $(this).children('.pb').length > 1) {

      // empty placeholder div for temporary storage
      var div = $('<div xmlns="http://www.w3.org/1999/xhtml"></div');

      // loop through page break elements
      $(this).find('.pb').each(function() {

        // Start position at end of current page break element
        var thisIndex = $(this).parent().html().indexOf($(this)[0].outerHTML) + $(this)[0].outerHTML.length;

        // if not last page break element inside the p-element
        if ($(this).nextAll(".pb").length) {
          // next page break element
          var nextPb = $(this).nextAll('.pb').first();
          // position of next page break element inside p-element
          var nextIndex = $(this).parent().html().indexOf(nextPb[0].outerHTML);
          // get substring from end of current page break to start of next page break
          var subst = $(this).parent().html().substring(thisIndex, nextIndex);
          // insert page break element in placeholder div
          div.append($(this)[0].outerHTML);
          // wrap substring from above in p tags and insert in placeholder div
          div.append('<p xmlns="http://www.w3.org/1999/xhtml">' + subst + '</p>');
        // if last page break element inside the p-element
        } else {
          // get substring from end of page break to end of p-element
          var subst = $(this).parent().html().substring(thisIndex, $(this).parent().html().length);
          // insert page break element in placeholder div
          div.append($(this)[0].outerHTML);
          // wrap substring in p tags and insert in placeholder div
          div.append('<p xmlns="http://www.w3.org/1999/xhtml">' + subst + '</p>');
        }
      });

      // Split original p-element HTML in two at its first page break element
      var content = $(this).html().split($(this).find('.pb:eq(0)')[0].outerHTML);
      // Replace p-element's HTML with first part from preceding line
      $(this).html(content[0]);
      // Append contents of placeholder div
      $(this).after(div.children());
    }

  });

  // loop through page break elements (.pb) and create pages
  $('.textFrame .pb').each(function() {
    // get next page break element and wrap everything between current and next page break
    // in div tags
    if ($(this).nextUntil('.pb')) {
      $(this).nextUntil('.pb').andSelf().wrapAll('<div xmlns="http://www.w3.org/1999/xhtml" class="page"></div>');
    } else {
      $(this).nextAll('p').andSelf().wrapAll('<div xmlns="http://www.w3.org/1999/xhtml" class="page"></div>');
    }
  });

  // Hide everything but first page
  $('#exhibit3b').find('.page').not('.page:eq(0)').hide();
  
  // Hide page break elements
  $('#exhibit3b').find('.pb').hide();

});
