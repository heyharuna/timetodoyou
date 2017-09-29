
/*
WYSIWYG Editor by Monty Shokeen
https://code.tutsplus.com/tutorials/create-a-wysiwyg-editor-with-the-contenteditable-attribute--cms-25657
*/

$(function() {
  var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'];
  var forePalette = $('.fore-palette');
  var backPalette = $('.back-palette');

  for (var i = 0; i < colorPalette.length; i++) {
      forePalette.append('<a href="#" data-command="forecolor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
      backPalette.append('<a href="#" data-command="backcolor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
  }

  $('.toolbar a').click(function(e) {
      var command = $(this).data('command');
      if (command == 'h1' || command == 'h2' || command == 'p') {
          document.execCommand('formatBlock', false, command);
      }
      if (command == 'forecolor' || command == 'backcolor') {
          document.execCommand($(this).data('command'), false, $(this).data('value'));
      }
      if (command == 'createlink' || command == 'insertimage') {
          url = prompt('Enter the link here: ', 'http:\/\/');
          document.execCommand($(this).data('command'), false, url);
      }
      else {
          document.execCommand($(this).data('command'), false, null);
      }
  });

  //change editor's html tag to #chnageContent's variable
  $('#submitBtn').click(function() {
    $('#changeContent').val($('#editor').html());
    //$('#insertImage').val($(''));
  });

  // $('#submitBtn').click(function() {
  //   $('#changeContent').val($('#editor').html());
  //   $('#insertImage').val($(''));
  // });

  $("#imageSelect_1").change(function() {
    $("#showPhoto_1").attr("src", $(this).val());
  });

  $("#imageSelect_2").change(function() {
    $("#showPhoto_2").attr("src", $(this).val());
  });


})
