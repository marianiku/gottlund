
// Show/hide markings (deletion, addition, underline, unclear, gap) in transcription attached
// to UniversalViewer. Find elements by class name and change css styles as necessary

function toggleMarkingsXML() {

  var doc = document.getElementById('exhibit3b');

  var elems = doc.getElementsByClassName('del');
  for (var i = 0; i < elems.length; i++) {
    if (elems[i].style.textDecoration == "none" || elems[i].style.color == "#444444") {
      elems[i].style.textDecoration = "line-through";
      elems[i].style.color = "#f22b0e"
    } else {
      elems[i].style.textDecoration = "none";
      elems[i].style.color = "#444444";
    }
  }

  var elems1 = doc.getElementsByClassName('sup');
  for (var i = 0; i < elems1.length; i++) {
    if (elems1[i].style.verticalAlign == "baseline" || elems1[i].style.color == "#444444") {
      elems1[i].style.verticalAlign = "super";
      elems1[i].style.color = "#3361a1";
    } else {
      elems1[i].style.verticalAlign = "baseline";
      elems1[i].style.color = "#444444";
    }
  }

  var elems2 = doc.getElementsByClassName('underline');
  for (var i = 0; i < elems2.length; i++) {
    if (elems2[i].style.textDecoration == "none") {
      elems2[i].style.textDecoration = "underline";
    } else {
      elems2[i].style.textDecoration = "none";
    }
  }

  var elems3 = doc.getElementsByClassName('unclear');
  for (var i = 0; i < elems3.length; i++) {
    if (elems3[i].style.color == '') {
      elems3[i].style.color = "#444444";
    } else {
      elems3[i].style.color = '';
    }
  }

  var elems4 = doc.getElementsByClassName('gap');
  for (var i = 0; i < elems4.length; i++) {
    if (elems4[i].style.display == '') {
      elems4[i].style.display = "none";
    } else {
      elems4[i].style.display = '';
    }
  }
}

// Show/hide comments in transcription attached to UniversalViewer
function toggleCommentsXML() {

  $(document).ready(function() {

    // Method to check if comment (class 'comm') has tooltip class
    function classExists() {
      if ($('#exhibit3b').find('.comm').hasClass('tooltip bt')) {
        return true;
      } else {
        return false;
      }
    }

    // If comment has tooltip class = popups are displayed, remove tooltip class
    if (classExists()) {
      $('#exhibit3b').find('.comm')
      .removeClass('tooltip bt')
      .css({'color':'#444444', 'border-bottom':'none'})
      .hover(function() { $(this).css('text-decoration', 'none'); })
      .next().hide();
      // if comment doesn't have tooltip class = popups are hidden, add the class
    } else {
      $('#exhibit3b').find('.comm')
      .addClass('tooltip bt')
      .css({'color':'','border-bottom':''})
      .hover(function() { $(this).css('text-decoration', ''); })
      .next()
      .css('display', '');
    }
  });
}

$(document).ready(function() {

  $('#commentary-button').click(function() {
    if ($('#commentary-frame').is(':hidden')) {
      $('#commentary-frame').slideDown("fast", function() {

      });
    } else {
      $('#commentary-frame').slideUp("fast", function() {

      });
    }
  });

});
