$(document).ready(function(){
    $(".message a").click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
});

/* $(function(){
  $('#settingstabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    $('#settingstabs ul li a').removeClass('selected');
    $(this).addClass('selected');
    $('#content section').each(function(){
      if(!$(this).hasClass('hide')) { $(this).addClass('hide'); }
    });
    $(newcontent).removeClass('hide');
  });
}); */

$(document).bind('DOMSubtreeModified', function() {
  $('#settingstabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    $('#settingstabs ul li a').removeClass('selected');
    $(this).addClass('selected');
    $('#content section').each(function(){
      if(!$(this).hasClass('hide')) { $(this).addClass('hide'); }
    });
    $(newcontent).removeClass('hide');
  });
});


