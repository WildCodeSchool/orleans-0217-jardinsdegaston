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
