/* -------------------------------------------------------///
 ------------ Scripts Jardins de Gaston ------------------///
///-------------------------------------------------------*/


/* Script beforeAfter - effet avant/apres dans les realisations */

/* Caroussel 3 */
var divisor3 = document.getElementById("divisor3"),
    slider3 = document.getElementById("slider3");
function moveDivisor3() {
    divisor3.style.width = slider3.value+"%";
}

/* Caroussel 2 */
var divisor2 = document.getElementById("divisor2"),
    slider2 = document.getElementById("slider2");
function moveDivisor2() {
    divisor2.style.width = slider2.value+"%";
}

/* Caroussel 1 */
var divisor1 = document.getElementById("divisor1"),
    slider1 = document.getElementById("slider1");
function moveDivisor1() {
    divisor1.style.width = slider1.value+"%";
}

/* ------------------------------------------------------------ */


/* Script navbar - changement de couleur de la navbar au scroll */

$(function () {
    $(document).scroll(function () {
        var $nav = $(".navbar-inverse");
        $nav.toggleClass('scrolled', $(this).scrollTop() > 700);
    });
});

/* ------------------------------------------------------------ */


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

/* ------------------------------------------------------------ */


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
