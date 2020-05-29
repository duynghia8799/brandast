// (function ($) {
//     setInterval(function () {
//         var getDate = new Date();
//         var getTime = getDate.getHours();

//         if (getTime >= 18) {
//             $('body').addClass('nightmode-theme');
//         } else {
//             $('body').removeClass('nightmode-theme');
//         }
//     }, 1000);

// })(jQuery);
//Action Video
(function ($) {
    if ($('.group-1-right-video').length > 0) {
        $("#video-homepage").prop('muted', false);

        $('.sound-btn').click(function () {
            $(this).toggleClass('off');
            if ($("#video-homepage").prop('muted')) {
                $("#video-homepage").prop('muted', false);

            } else {
                $("#video-homepage").prop('muted', true);

            }
        });

        $('#video-homepage').click(function () {
            this.paused ? this.play() : this.pause();
            this.paused ? $('.overlay-video').addClass('pause') : $('.overlay-video').removeClass('pause');

        });
    }


})(jQuery);


(function ($) {
    var position = $(window).scrollTop();
    var widthwd = $(window).width();
    $(window).scroll(function () {
        var scroll = $(window).scrollTop();
        if (widthwd > 860) {

            if (scroll >= 100) {
                $(".header-col-left").addClass("sticky");
                $(".header-col-right").addClass("sticky");
            } else {
                $(".header-col-left").removeClass("sticky");
                $(".header-col-right").removeClass("sticky");
            }

            //Sticky Scroll up menu
            if ((scroll > position) || (scroll === 0)) {
                $('#header').removeClass('sticky')
            } else {
                $('#header').addClass('sticky');
            }

            position = scroll;

        }


    });
    $('#single-service #contactform').click(function (e) {
        $('body').addClass('no-scroll');
        if(widthwd > 480){
            $('#header-contact').addClass('active');
        }else {
            $('#header-contact-responsive').addClass('active');
        }
        e.preventDefault();
    });



})(jQuery);

//Start Header Action
$(".menu-item-has-children").each(function (index) {
    var eq = index + 1;
    $(this).hover(function (e) {
        $('#form-contact-header').removeClass('active');
        $('.menu-item-has-children').removeClass('active');
        $(this).addClass('active');
        $('#mainmenu-col-right').removeClass().addClass('background' + eq)
        // e.preventDefault();
    });

    $('.menu-item-contact-header').hover(function (e) {
        $('#form-contact-header').addClass('active');
        e.preventDefault();
    });
});


$('#button-mainmenu').click(function () {
    $('body').addClass('no-scroll');
    $('#header-mainmenu').addClass('active');
});
$('#btn-close-mainmenu').click(function () {
    $('body').removeClass('no-scroll');
    $('#header-mainmenu').removeClass('active');

});

$('#go-to-page-contact').click(function (e) {
    $('body').addClass('no-scroll');
    $('#header-contact').addClass('active');
    e.preventDefault();
});

$('.margin-contact-button').click(function (e) {
    if ($(window).width() < 560) {
        $('#header-mainmenu-responsive').addClass('active');
    } else {
        $('body').addClass('no-scroll');
        $('#header-contact').addClass('active');
    }
    e.preventDefault();
});


$('#btn-close-contact').click(function () {
    $('body').removeClass('no-scroll');
    $('#header-contact').removeClass('active');

});

//Responsive menu
$('#button-mainmenu-responsive').click(function () {
    $('body').addClass('no-scroll');
    $('#header-mainmenu-responsive').addClass('active');
});

$('#btn-close-mainmenu-responsive').click(function () {
    $('body').removeClass('no-scroll');
    $('#header-mainmenu-responsive').removeClass('active');

});

$('.contact-responsive-button').click(function (e) {
    $('#header-contact-responsive').addClass('active');
    $('#header-mainmenu-responsive').removeClass('active');
    e.preventDefault();
});

$('#btn-close-contact-responsive').click(function () {
    $('body').removeClass('no-scroll');
    $('#header-contact-responsive').removeClass('active');
});


//End Header Action


//Start Slider Group 1 HomePage
if ($('#homepage .slider-group-1').length > 0) {
    var swiperslidergroup1 = new Swiper('#homepage .slider-group-1', {
        slidesPerView: 1,
        loop: false,
        effect: 'fade',
        navigation: {
            nextEl: '.gr1-button-next',
            prevEl: '.gr1-button-prev',
        },

        autoplay: {
            delay: 3000,
        },
        speed: 1500,
    });
}
//End Slider Group 1 HomePage

// Start Slider Group 2 HomePage
if ($('#homepage .list-title-group-2').length > 0) {
    var swiperslidergroup2 = new Swiper('#homepage .list-title-group-2', {
        direction: 'vertical',
        // effect: 'flip',
        loop: true,
        autoplay: {
            delay: 3000,
        },
        speed: 1500,
    });
}
//End Slider Group 2 HomePage

//Start Toggle FAQ Group 3
$('#homepage .faq-group-3 ul li').click(function () {
    $('.faq-group-3 ul li').removeClass('active');
    $(this).toggleClass('active');
    var eq = $(this).attr('data-eq');
    $('.group-3-left ul li').removeClass('active');
    $('.group-3-left ul li[data-active=' + eq + ']').addClass('active');
});
//End Toggle FAQ Group 3

//Start Slider Group 1 HomePage
if ($('#homepage .slider-group-4').length > 0) {
    var swiperslidergroup4 = new Swiper('#homepage .slider-group-4', {
        slidesPerView: 4,
        slidesPerColumn: 3,
        speed: 2000,
        autoplay: {
            delay: 3000,
        },

        breakpoints: {

            768: {
                slidesPerView: 3,
                slidesPerColumn: 3,
            },
        }
    });
}
//End Slider Group 1 HomePage


// Start Slider Group 2 ServicePage
if ($('#about-page .item-slider-content').length > 0) {
    var sliderabout = new Swiper('#about-page .item-slider-content', {
        direction: 'vertical',
        loop: true,
        autoplay: {
            delay: 5000,
        },
        speed: 2500,

    });
}

// Start Slider Group 2 ServicePage
if ($('.list-title-group-1').length > 0) {
    var slidersv1 = new Swiper('.list-title-group-1', {
        direction: 'vertical',
        loop: true,
        autoplay: {
            delay: 3000,
        },
        speed: 1500,
    });
}


// Start Slider Group 2 ServicePage

if ($('.list-title-project-top').length > 0) {
    var sliderpjct = new Swiper('.list-title-project-top', {
        direction: 'vertical',
        loop: true,
        autoplay: {
            delay: 3000,
        },
        speed: 1500,
    });
}
//End Slider Group 2 ServicePage

//Start Slider Service Post
if ($('#single-service .slider-group-1').length > 0) {
    var swiperslidergroup1svpost = new Swiper('#single-service .slider-group-1', {
        slidesPerView: 1,
        loop: false,
        effect: 'fade',
        navigation: {
            nextEl: '.gr1-button-next',
            prevEl: '.gr1-button-prev',
        },

        autoplay: {
            delay: 5000,
        },
        speed: 1500,
    });
}
//End Slider Service Post

// Start Toogle Item Service Post
// $('#single-service #group-2 .group-2-right ul li').click(function () {
//     $('.group-2-right ul li').removeClass('active');
//     $(this).toggleClass('active');
//     var eq = $(this).attr('data-eq');
// });
$('#single-solution #group-2 .list-option-solution .box .box-content ul li').click(function () {
    $('.list-option-solution .box .box-content ul li').removeClass('active');
    $(this).toggleClass('active');
    var eq = $(this).attr('data-eq');
});

$('#single-service #group-2-duplicate .group-2-left-duplicate ul li').click(function () {
    $('.group-2-left-duplicate ul li').removeClass('active');
    $(this).toggleClass('active');
    var eq = $(this).attr('data-eq');
});

$('#single-service #group-6 .group-6-right ul li').click(function () {
    $('.group-6-right ul li').removeClass('active');
    $(this).toggleClass('active');
    var eq = $(this).attr('data-eq');
});

$('#single-service #group-6 .group-6-left ul li').click(function () {
    $('.group-6-left ul li').removeClass('active');
    $(this).toggleClass('active');
    var eq = $(this).attr('data-eq');
});

$('#single-service #group-7 .group-7-right ul li').click(function () {
    $('.group-7-right ul li').removeClass('active');
    $(this).toggleClass('active');
    var eq = $(this).attr('data-eq');
});
// End Toogle Item Service Post
if ($('#navigation-toc').length > 0) {
    // Cache selectors
    var lastId,
        navigationMenu = $("#navigation-toc"),
        navigationMenuHeight = navigationMenu.outerHeight() + 30,
        // All list items
        menuItems = navigationMenu.find("a"),
        // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
            var item = $($(this).attr("href"));
            if (item.length) {
                return item;
            }
        });

    menuItems.click(function (e) {
        var href = $(this).attr("href"),
            offsetTop = href === "#" ? 0 : $(href).offset().top - navigationMenuHeight + 1;
        $('html, body').stop().animate({
            scrollTop: offsetTop
        }, 500);
        e.preventDefault();
    });

    // Bind to scroll
    $(window).scroll(function () {
        // Get container scroll position
        var fromTop = $(this).scrollTop() + navigationMenuHeight;

        // Get id of current scroll item
        var cur = scrollItems.map(function () {
            if ($(this).offset().top < fromTop)
                return this;
        });
        // Get the id of the current element
        cur = cur[cur.length - 1];
        var id = cur && cur.length ? cur[0].id : "";

        if (lastId !== id) {
            lastId = id;
            // Set/remove active class
            menuItems
                .parent().removeClass("active")
                .end().filter("[href='#" + id + "']").parent().addClass("active");
        }
    });
}


if ($('#group-project-top .project-term .title').length > 0) {
    var $termproject = $('#group-project-top .project-term .title');
    $termproject.click(function (e) {
            // $termproject.parent().removeClass('active');
            $(this).parent().toggleClass('active');
            e.preventDefault()
        }
    )
}

$('.remove-overlay').click(function () {
    $('body').removeClass('no-scroll');
    $('#header-mainmenu').removeClass('active');
});

// Protect Not Coppy - Ctrl U - Ctrl C - Ctrl V
//
// $(document).ready(function () {
//     //Disable full page
//     $("body").on("contextmenu", function (e) {
//         return false;
//     });
//
//     //Disable full page
//     $('body').bind('cut copy paste', function (e) {
//         e.preventDefault();
//     });
//
//     //Disable mouse right click
//     $("body").on("contextmenu", function (e) {
//         return false;
//     });
//
//     $(document).keydown(function (event) {
//         if (event.keyCode == 123 || (event.ctrlKey && event.keyCode == 85) || (event.ctrlKey && event.shiftKey && event.keyCode == 73 || event.keyCode == 116)) {
//             return false;
//         } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
//             return false; //Prevent from ctrl+shift+i
//         }
//     });
//
// });
