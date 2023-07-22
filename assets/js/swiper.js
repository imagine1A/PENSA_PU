var menu = ['1', '2', '3']
var mySwiper = new Swiper ('.mySwiper1', {
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
			clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + (menu[index]) + '</span>';
        },
    },


  })