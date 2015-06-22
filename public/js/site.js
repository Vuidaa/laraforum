$(document).ready(function() {

 var wbbOpt = {
  buttons: "bold,italic,underline,|,img,link,|,quote,code",
  allButtons: {
    quote: {
      transform: {
        '<div class="quote"><cite>{AUTHOR} wrote:</cite>{SELTEXT}</div>':'<div>[quote={AUTHOR}]{SELTEXT}[/quote]</div>'
      }
    }
  }
 }

$("#post").wysibb(wbbOpt);

$('.comment-link').prop('disabled', false);

$(".comment-link").click(function(){

    var commentBody = $(this).closest('.media').find('.post-body').clone();

    commentBody = commentBody.find('blockquote').remove().end();

    commentBody = $.trim(commentBody.text());

    var username = $(this).closest('.media').find('.username').text();

    $('#post').execCommand('quote',{author: username ,seltext:commentBody});

  $('.comment-link').prop('disabled', true);
});

$('select').selectpicker();

});