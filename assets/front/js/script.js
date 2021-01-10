$(document).ready(function() {
  $('#autoWidth').lightSlider({
      autoWidth:true,
      loop:true,
      onSliderLoad: function() {
          $('#autoWidth').removeClass('cS-hidden');
      } 
  });  
});

$(function(){
  //fungsi dibawah hanya berjalan untuk semua tag <a> yang diawali (^) dengan hash (#)
  $('a[href^="#"]').on('click', function(e){
    target = $(this.hash);
    jarak = 160;
    $('html, body').stop().animate(
        {
            'scrollTop' : target.offset().top - jarak
        },
        100, //durasi dalam milisekon
        'swing', //efek transisi (opsi : swing / linear)
    );
  });
});

$(window).scroll(function() {
  var scrollDistance = $(window).scrollTop();
  // Assign active class to nav links while scolling
  $('.main__description').each(function(i) {
      if ($(this).offset().top - 165 <= scrollDistance ) {
          $('.items.active').removeClass('active');
          $('.items').eq(i).addClass('active');
      }
  });
}).scroll();

const navbar = () =>{
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;
  
  if (window.pageYOffset > sticky) {
    navbar.classList.add("fixed")
  } else {
    navbar.classList.remove("fixed");
  }
}

// window.scrollBy({ 
//   top: 100, // could be negative value
//   left: 0, 
//   behavior: 'smooth' 
// });

// window.scroll({
//   top: 1500, 
//   left: 0, 
//   behavior: 'smooth'
// });

window.onscroll = function() {
  navbar()
};

var swiper = new Swiper('.swiper-container', {
    lazy: true,
    grabCursor: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    //   dynamicBullets: true,
    },
  });

  var btnModal = $(".btn-modal")
  var Modal = $(".container__modal");
  var Span = $(".modal__action");
  var bntTop = document.getElementById("btn__top")
  var containerBuy = document.getElementById("container__buy")

 $(btnModal).click(function(){
  //  $(Modal).addClass('modal__show');
  $(Modal).css("display","block")
  $(Modal).css("display","flex")
 })

 $(Span).click(function(){
  //  $(Modal).addClass('modal__show');
  $(Modal).css("display","none")
})

$(Modal).click(function(){
  $(Modal).css("display","none")
})

$(bntTop).click(function(){
  //  $(Modal).addClass('modal__show');
  containerBuy.classList.toggle("container__buy-active")
})



