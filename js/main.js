$(document).foundation();
$("#index-s3-owl,#services-s2-owl").owlCarousel({
    loop:true,
    responsive:{
        0:{items:1},
        640:{items:3},
        1024:{items:4}
    }
});