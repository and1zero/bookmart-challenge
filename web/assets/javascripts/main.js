$(document).ready(function(){

    // Initializing carousel
    var carousel = $('.carousel'),
    displays = carousel.find('.display .item').toArray(),
    lists = carousel.find('.list-control li').toArray(),
    resetActive = function(){
        carousel.find('.list-control .active').removeClass('active');
        carousel.find('.list-control .overlay').fadeOut('fast',function(){
            $(this).remove();
        });	
        carousel.find('.display .active').fadeOut('fast',function(){
            $(this).removeClass('active');
        });
    },
    current = 0,
    setActive = function(index){
        resetActive();
        $(lists[index]).addClass('active').append('<div class="overlay"><div class="arrow"></div></div>');
        $(displays[index]).fadeIn('fast',function(){
            $(this).addClass('active');
        });
        current = index;
        return false;
    },
    pause = false;

    function fadeNext(){
        current = current < (lists.length-1) ? current+1 : 0;
        setActive(current);
    }

    // Adding handler to each list controls
    carousel.find('.list-control li').each(function(i){
        $(this).on('click',function(){
            setActive(i);
        });
    });

    carousel.hover(function(){
        pause = true;
    },function(){
        pause = false;
    });

    function cycle(){
        if(!pause){ fadeNext(); }
    }
    setActive(0); // initialize
    var cycleInterval = setInterval(cycle,2000);
});