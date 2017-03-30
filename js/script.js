/* -------------------------------------------------------///
 ------------ Scripts Jardins de Gaston ------------------///
///-------------------------------------------------------*/


/* Script beforeAfter - effet avant/apres dans les realisations */

$('body').ready(function(){

    var where = $('#where');
    var startx = 0;

    $('.beforeAfter').each(function(){

        var banda = $(this);
        var bandaX = this.offsetLeft;
        var before = $(this).find('.before');
        var after = $(this).find('.after');
        var afterWidth = 0;

        banda.bind('touchstart', function(event){
            var e = event.originalEvent;
            var touchobj = e.targetTouches[0].pageX; // reference first touch point (ie: first finger)
            $('#where').text(touchobj.clientX);
            startx = parseInt(touchobj.clientX); // get x position of touch point relative to left edge of browser
            afterWidth = (touchobj - bandaX) + 'px';
            after.width(afterWidth);
            after.css({
                'border-right': 'solid 4px black'
            });
            e.preventDefault()
        });

        banda.bind('touchmove', function(event){
            var e = event.originalEvent;
            var touchobj = e.changedTouches[0]; // reference first touch point for this event
            $('#where').text(touchobj.clientX);
            after.width((touchobj.clientX - bandaX) + 'px');
            e.preventDefault();
        });

        banda.bind('touchend', function(event){
            var e = event.originalEvent;
            var touchobj = e.changedTouches[0]; // reference first touch point for this event
            $('#where').text(touchobj.clientX);
            afterWidth = 0;
            after.width(0);
            after.css({
                'border': 'none'
            });
            $('#where').text('0');
            e.preventDefault();
        });

        banda.bind('mouseenter', function(e){
            banda.bind('mousemove', function(e){
                $('#where').text(e.pageX);
                afterWidth = (e.pageX - bandaX) + 'px';
                after.width(afterWidth);
                after.css({
                    'border-right': 'solid 4px black'
                });
            });
        });

        banda.bind('mouseleave', function(e){
            afterWidth = 0;
            after.width(0);
            after.css({
                'border': 'none'
            });
            $('#where').text('0');
        });

    });

});

/* Script navbar - changement de couleur de la navbar au scroll */

$(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-inverse");
        $nav.toggleClass('scrolled', $(this).scrollTop() > 700);
    });
});

/* Script Tagline - disparition de Jardinier par nature dans le header  */

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

/*--------------- Fin -----------*/
