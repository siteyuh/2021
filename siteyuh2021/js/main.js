$(function(){
  
  $('.carousel').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    centerMode: true,
    centerPadding: '2em',
    arrows: true,
//    dots: true,
    autoplay: true,
    initialSlide: 3,
    appendArrows: $('#arrows'),
    adaptiveHeight: true,
    responsive: [{
      breakpoint: 640, settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: '0px',
        dots: false,
      }
    }, {
      breakpoint: 800, settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
//        dots: true,
      }
    }],
  });
  
  $('.carousel').slick("slickNext");
  $('.carousel').slick("slickPrev");
  
  $('#announce').click(function(){
    $("html, body").animate({scrollTop:375}, 500, "swing");
    $('.catmem').fadeIn();
  });
  
  $('#announce').hover(
    function(){
//      console.log('hover');
      $('.opencat').css("text-decoration", "underline");
    },function(){
      $('.opencat').css("text-decoration", "none");
    }
  );
  
  $('.mobmenu').click(function(){
    $('#menu').fadeToggle();
  });
  
  $('.closebtn', 'body').click(function(){
    $('#menu').fadeToggle();
  });
  
  $('.closedlg').click(function(){
    $(this).parent().fadeToggle();
//    $('#profile').fadeToggle();
  });

  $('.profopen').click(function(){
    $('#profile').fadeToggle();
    $('#information').hide();
    $('#mailform').hide();
  });
  
  $('.infoopen').click(function(){
    $('#information').fadeToggle();
    $('#profile').hide();
    $('#mailform').hide();
  });
  
  $('.mailopen').click(function(){
    $('#mailform').fadeToggle();
    $('#profile').hide();
    $('#information').hide();
  });
  
  $('#mesbox').focus(function(){
    console.log('mesbox');
    $('#mailform').animate({scrollTop:100}, 500, "swing");
  });
  
  $('#pwbox').focus(function(){
    console.log('pw');
    $('#mailform').animate({scrollTop:400}, 500, "swing");
  });
  
  $('#name').click(function(){
    console.log('name');
    $('.name').focus();
  });
  $('#from').click(function(){
    $('.from').focus();
  });
  $('#comm').click(function(){
    $('.comm').focus();
  });
  $('#pw').click(function(){
    $('.pw').focus();
  });
  
/*
  var frss = 'json.php';
  $.getJSON(frss, loadrss);
  
  function loadrss(data){
//    var len = data.length;
    var entryArray = data.entry;
    $.each(entryArray, function(i){
      var strDate = entryArray[i].updated;
      strDate = strDate.slice(0, 10);
      strDate = strDate.replace('-', '.');
      strDate = strDate.replace('-', '.');
      $('.infoarea').append($('<dt>').text(strDate));
      $('.infoarea').append($('<dd class="text-black">').html(entryArray[i].content));

    });
  }
  
  $('.info').click(function(){
    $('#modal').show();
    blured();
    $('#info').fadeIn();
  });

  
  $.get('https://docs.google.com/spreadsheets/d/e/2PACX-1vTKfVLlme4Bx3K6eNLEqcX-ahJwvbIdOFKJPH_q5oyAEFq3O10TCqpFKIjVcwbxPa1qEGyr378DBhil/pub?output=csv', function(data){
    var csv = $.csv.toArrays(data);
//    console.log(csv);
    var item = '';
    
    $(csv).each(function(index){
      console.log(index);
      if (index !== 0) {
        item += '<h3>'+this[0]+'</h3>';
        item += '<ul class="profarea">';
        var dataArray = this[1].split(/\s+/); // this[1]は半角スペース区切りのセル
        console.log(dataArray);
        $(dataArray).each(function(index, val){
          item += '<li>'+ val+'</li>';
        });
        item += '</ul>';
      }
    });
    $("#prof .inner .profarea").append(item);
  }, 'text');
  
  $('.profile').click(function(){
    $('#modal').show();
    blured();
    $('#prof').fadeIn();
  });
  
  $.getJSON('tw.php', function(data){
    var len = data.length;
    console.log(data);
    for(var i = 0; i < len; i++){
      $('.tweetarea').append($('<li class="text-black">').html(data[i].text));
    }
  });
  
  $('.mobmenu').click(function(){
    $(this).next().fadeToggle();
  });
  
  $('.cancel, #modal, .close'). click(function(){
    $('#modal, #mes, #prof, #tweet, #thanks, #err, #info').fadeOut();
    console.log('close');
    $('nav, header, #contents, footer').css('filter', 'blur(0)');
  });
  
  $('.cancel').click(function(){
    $('#mailform #name, #mailform #from, #mailform #comm').val('');
  });
  
  $('.tw').click(function(){
    $('#modal').show();
    blured();
    $('#tweet').fadeIn();
  });
  
  $('.mes').click(function(){
    $('#modal').show();
    blured();
    $('#mes').fadeIn();
  });
  
  // 画面を回転したときにメニューが消えるのを防ぐ
  $(window).resize(function(){
    if ($(window).width() > 640) {
      $('nav ul').css('display', 'flex');
    } else {
      $('nav ul').css('display', 'none');
    }
  });
  
  function blured(){
    $('nav, header, #contents, footer').css('filter', 'blur(4px)');
  }
*/
});