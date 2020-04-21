$(function(){
    $(".mobile-menu-toggler").click(() => {
        $(".mobile-navigation").addClass('mobile-navigation--shown');
    });
    $(".mobile-navigation__toggle").click(() => {
        $(".mobile-navigation").removeClass('mobile-navigation--shown');
    });
});
