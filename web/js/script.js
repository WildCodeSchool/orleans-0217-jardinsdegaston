/* -------------------------------------------------------///
 ------------ Scripts Jardins de Gaston ------------------///
///-------------------------------------------------------*/


/* Script beforeAfter - effet avant/apres dans les realisations */

var divisor = document.getElementById("divisor"),
    slider = document.getElementById("slider");
function moveDivisor() {
    divisor.style.width = slider.value+"%";
}

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

/* Script slideUp - remontee automatique du menu burger  */

$(function(){
    var navMain = $(".navbar-collapse"); // avoid dependency on #id
    // "a:not([data-toggle])" - to avoid issues caused
    // when you have dropdown inside navbar
    navMain.on("click", "a:not([data-toggle])", null, function () {
        navMain.collapse('hide');
    });
});

/*--------------- Fin -----------*/
