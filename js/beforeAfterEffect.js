/**
 * Created by wilder3 on 22/03/17.
 */


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

/*jQuery(document).ready(function($){
    //function to check if the .cd-image-container is in the viewport here
    // ...

    //make the .cd-handle element draggable and modify .cd-resize-img width according to its position
    $('.cd-image-container').each(function(){
        var actual = $(this);
        drags(actual.find('.cd-handle'), actual.find('.cd-resize-img'), actual);
    });

    //function to upadate images label visibility here
    // ...
});*/
/*
//draggable funtionality - credits to http://css-tricks.com/snippets/jquery/draggable-without-jquery-ui/
function drags(dragElement, resizeElement, container) {
    dragElement.on("mousedown vmousedown", function(e) {
        dragElement.addClass('draggable');
        resizeElement.addClass('resizable');

        var dragWidth = dragElement.outerWidth(),
            xPosition = dragElement.offset().left + dragWidth - e.pageX,
            containerOffset = container.offset().left,
            containerWidth = container.outerWidth(),
            minLeft = containerOffset + 10,
            maxLeft = containerOffset + containerWidth - dragWidth - 10;

        dragElement.parents().on("mousemove vmousemove", function(e) {
            leftValue = e.pageX + xPosition - dragWidth;

            //constrain the draggable element to move inside its container
            if(leftValue < minLeft ) {
                leftValue = minLeft;
            } else if ( leftValue > maxLeft) {
                leftValue = maxLeft;
            }

            widthValue = (leftValue + dragWidth/2 - containerOffset)*100/containerWidth+'%';

            $('.draggable').css('left', widthValue).on("mouseup vmouseup", function() {
                $(this).removeClass('draggable');
                resizeElement.removeClass('resizable');
            });

            $('.resizable').css('width', widthValue);

            //function to upadate images label visibility here
            // ...

        }).on("mouseup vmouseup", function(e){
            dragElement.removeClass('draggable');
            resizeElement.removeClass('resizable');
        });
        e.preventDefault();
    }).on("mouseup vmouseup", function(e) {
        dragElement.removeClass('draggable');
        resizeElement.removeClass('resizable');
    });
}*/

