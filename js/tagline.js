function tagline() {
    var scroll = $(window).scrollTop();
    if ($(window).width() > 200) {
        if (scroll >= 600) {
            $('#accroche').addClass('hidden');
        } else {
            $('#accroche').removeClass('hidden');
        }

    }
}

tagline();

$(function() {
    if ($(window).width() > 200) {
        $(window).scroll(function () {
            tagline();
        });
    }
});

$(function(){
    var navMain = $(".navbar-collapse"); // avoid dependency on #id
    // "a:not([data-toggle])" - to avoid issues caused
    // when you have dropdown inside navbar
    navMain.on("click", "a:not([data-toggle])", null, function () {
        navMain.collapse('hide');
    });
});