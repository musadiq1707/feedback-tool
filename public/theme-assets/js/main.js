$(document).ready(function(){
  $(window).load(function() {
	$(".loader").delay(3000).fadeOut("fast");
});
    $('.categories-slider').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: false,
        responsive: [
            {
              breakpoint: 1025,
              settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
        ]
    });
    
    
    $("#country_selector").countrySelect({
        defaultCountry: "pk",
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // responsiveDropdown: true,
        preferredCountries: ['ca', 'gb', 'us']
    });

    var className = $('.flag').attr('class').split(' ')[1];
    $('.flag').text(className)

    $("ul.country-list li").click(function(){
        var countryname = $(this).attr("data-country-code");
        $('.flag').text(countryname);
    })
    

    $('.deals-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      infinite: true,
      dots: true,
      arrows: false,
      responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 3,
              infinite: true,
              dots: true
            }
          },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 480,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
      ]
  });
  $(".mobile-menu").click(function(){
    $(".mobile-menu-canvas").toggleClass("open");
  })
  $(".close-mobile-menu").click(function(){
    $(".mobile-menu-canvas").toggleClass("open");
  });

  $(".pagination li a").click(function(){
    $(".pagination li a").removeClass("active");
    $(this).addClass("active");
  })

  
  $(".passwordshow").click(function(){
    if($("input#password").attr("type") == 'password'){
      $("input#password").attr("type","text");
      $(".passwordshow").removeClass("fa-eye");
      $(".passwordshow").addClass("fa-eye-slash");
    }else{
      $("input#password").attr("type","password");
      $(".passwordshow").removeClass("fa-eye-slash");
      $(".passwordshow").addClass("fa-eye");
    }
  })
});

$('.brands-slider').slick({
  slidesToShow: 4,
  slidesToScroll:4,
  autoplay: true,
  infinite: true,
  dots: true,
  arrows: false,
  responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
  ]
});

$(".bf-header a").click(function(){
  $(".bf-header a").removeClass("active");
  $(this).addClass("active");
  
  $('.bfcontent').addClass("hidden");
  var activeTab = $(this).attr('href');
  $(activeTab).removeClass("hidden");
    return false;
})


$(".accordian-item h3").click(function(){
  var acContent = $(this).next(".accordian-content");
  if(acContent.hasClass("hidden")){
    acContent.slideDown("slow");
    acContent.removeClass("hidden");
  }
  else{
    acContent.slideUp("slow");
    acContent.addClass("hidden");
  }
  $(this).find("i").toggleClass("fa-chevron-down fa-chevron-up")
})


$(".dropdown-toggle a").click(function(){
  var ddContent = $(this).next(".dropdown-content");
  if(ddContent.hasClass("hidden")){
    ddContent.slideDown("slow");
    ddContent.removeClass("hidden");
  }
  else{
    ddContent.slideUp("slow");
    ddContent.addClass("hidden");
  }
})

$(document).on("click", function(event){
  var $trigger = $(".dropdown-toggle");
  if($trigger !== event.target && !$trigger.has(event.target).length){
      $(".dropdown-content").slideUp("fast");
      $(".dropdown-content").addClass("hidden");
  }            
});

$(".close-modal").click(function(){
  $(".modal").toggleClass("hidden");
})