$(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-inverse");
        $nav.toggleClass('scrolled', $(this).scrollTop() > 700);
    });
});