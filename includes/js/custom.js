//FOR SPLITTING JS
Splitting();
//FOR SPLITTING JS @end

//MATERIALIZE
$('.nav-bar-site-logo').on('click', function () {
    window.location.href = "./index.php";
});
$(document).ready(function () {
    $('.sidenav').sidenav();
    $('.carousel').carousel({
        fullWidth: true,
        indicators: true
    });
    $('.modal').modal();
    $('.tabs').tabs();
    $('.slider').slider();
    $('.parallax').parallax();
    $('select').formSelect();
    
    //range slider
});
//MATERIALIZE @end

//FOR LOADING SCREEN 
$body = $("body");

$(document).on({
    ajaxStart: function () {
        $body.addClass("loading_wrap");
    },
    ajaxStop: function () {
        $body.removeClass("loading_wrap");
    }
});

// $(window).on('load', function () {
//     $('.preloader-background').delay(1400).fadeOut('slow');

//     $('.loading-text')
//         .delay(1350)
//         .fadeOut('slow');
//     $('.preloader-wrapper')
//         .delay(1350)
//         .fadeOut('slow');
// });

//FOR LOADING SCREEN  @end

//ON SCROLL ANIMATION
AOS.init({
    offset: 0,
    duration: 1000
});
//ON SCROLL ANIMATION @end

//FOR DASHBOARD
$(".post_dashboard").hide(0);
$(".welcome_dashboard").delay(1400).show();
$(".pass_dashboard").hide(0);
$(".users_dashboard").hide(0);
$(".create_post_dashboard").hide(0);
$(".dashboard_loader").delay(1400).fadeOut('slow');

$(document).ready(function () {
    $(".postbtn_dashboard").click(function () {
        $(".dashboard_loader").show();
        $(".create_post_dashboard").hide(400);
        $(".dashboard_loader").delay(1400).fadeOut('slow');
        $(".welcome_dashboard").hide(400); 
        $(".pass_dashboard").hide(400);
        $(".users_dashboard").hide(400);
        $(".post_dashboard").delay(1400).fadeIn(1000);
        $(".result").fadeIn(2000);
        $(".users_result").hide(400);

        //FOR LIVE SEARCH ON DASHBOARD
        setTimeout(function () {
            $.get("dashboard_search.php", {
                "search": "%"
            }, function ($data) {
                $(".result").html($data);
            });
        }, 600);
        //FOR LIVE SEARCH ON DASHBOARD @end
    });
    $(".passbtn_dashboard").click(function () {
        $(".create_post_dashboard").hide(400);
        $(".dashboard_loader").show();
        $(".dashboard_loader").delay(1400).fadeOut('slow');
        $(".post_dashboard").hide(400);
        $(".welcome_dashboard").hide(400);
        $(".pass_dashboard").fadeIn(1000);
        $(".users_dashboard").hide(400);
        $(".result").hide(400);
        $(".users_result").hide(400);
        
    });
    $(".usersbtn_dashboard").click(function () {
        $(".create_post_dashboard").hide(400);
        $(".dashboard_loader").show();
        $(".dashboard_loader").delay(1400).fadeOut('slow');
        $(".post_dashboard").hide(400);
        $(".welcome_dashboard").hide(400);
        $(".pass_dashboard").hide(400);
        $(".users_dashboard").fadeIn(1000);
        $(".users_result").fadeIn(2000);
        $(".result").hide(400);

        //FOR LIVE SEARCH USERS DASHBOARD
        setTimeout(function() {
                $.get("dashboard_user_results.php", {
                    "search7": "%"
                }, function ($data) {
                    $(".users_result").html($data);
                })
            
        }, 600);
        //FOR LIVE SEARCH USERS DASHBOARD @end
    });
    $(".welcomebtn_dashboard").click(function () {
        $(".create_post_dashboard").hide(400);
        $(".dashboard_loader").show();
        $(".dashboard_loader").delay(1400).fadeOut('slow');
        $(".post_dashboard").hide(400);
        $(".welcome_dashboard").fadeIn(1000);
        $(".pass_dashboard").hide(400);
        $(".users_dashboard").hide(400);
        $(".result").hide(400);
        $(".users_result").hide(400);
        
    });
    $(".newpostbtn_dashboard").click(function () {
        $(".create_post_dashboard").fadeIn(1000);
        $(".dashboard_loader").show();
        $(".dashboard_loader").delay(1400).fadeOut('slow');
        $(".post_dashboard").hide(400);
        $(".welcome_dashboard").hide(400);
        $(".pass_dashboard").hide(400);
        $(".users_dashboard").hide(400);
        $(".result").hide(400);
        $(".users_result").hide(400);

    });
});
//FOR DASHBOARD @end
$('.btn_toogle_disable').on('click', function () {
    $('.toogle_disable input').prop('disabled', function (i, v) {
        return !v;
    });
})
//FOR LIVE SEARCH ON DASHBOARD
$(".posts_search").on("input", function () {
    $search = $(".posts_search").val();
    if ($search.length > 0) {
        $.get("dashboard_search.php", {
            "search": $search
        }, function ($data) {
            $(".result").html($data);
        })
    } else if ($search.length == 0) {
        $.get("dashboard_search.php", {
            "search": "%"
        }, function ($data) {
            $(".result").html($data);
        })
    }
});
//FOR LIVE SEARCH ON DASHBOARD @end
$('.slides').slick({
    infinite: true,
    speed: 600,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    fade: true,
    autoplaySpeed: 4000,
    pauseOnHover: false,
    pauseOnFocus: false,
    dots: false,
    arrows: false,
    mobileFirst: true
});

$(document).ready(function () {
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if (path == '') {
        path = 'index.php';
    }

    var target = $('#nav-mobile a[href="' + path + '"]');
    // Add active class to target link
    target.addClass('nav_active');
})

//LISTING

//LISTING @end

/* ---- particles.js config ---- */

particlesJS("particles-js1", {
    "particles": {
        "number": {
            "value": 600,
            "density": {
                "enable": true,
                "value_area": 400
            }
        },
        "color": {
            "value": "#ffffff"
        },
        "shape": {
            "type": "circle",
            "stroke": {
                "width": 0,
                "color": "#000000"
            },
            "polygon": {
                "nb_sides": 5
            },
            "image": {
                "src": "img/github.svg",
                "width": 100,
                "height": 100
            }
        },
        "opacity": {
            "value": 1,
            "random": true,
            "anim": {
                "enable": true,
                "speed": 1,
                "opacity_min": 0,
                "sync": false
            }
        },
        "size": {
            "value": 3,
            "random": true,
            "anim": {
                "enable": false,
                "speed": 4,
                "size_min": 0.3,
                "sync": false
            }
        },
        "line_linked": {
            "enable": false,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
        },
        "move": {
            "enable": true,
            "speed": 1,
            "direction": "none",
            "random": true,
            "straight": false,
            "out_mode": "out",
            "bounce": false,
            "attract": {
                "enable": false,
                "rotateX": 600,
                "rotateY": 600
            }
        }
    },
    "interactivity": {
        "detect_on": "canvas",
        "events": {
            "onhover": {
                "enable": true,
                "mode": "bubble"
            },
            "onclick": {
                "enable": true,
                "mode": "repulse"
            },
            "resize": true
        },
        "modes": {
            "grab": {
                "distance": 400,
                "line_linked": {
                    "opacity": 1
                }
            },
            "bubble": {
                "distance": 250,
                "size": 0,
                "duration": 2,
                "opacity": 0,
                "speed": 3
            },
            "repulse": {
                "distance": 400,
                "duration": 0.4
            },
            "push": {
                "particles_nb": 4
            },
            "remove": {
                "particles_nb": 2
            }
        }
    },
    "retina_detect": true
});
