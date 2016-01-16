(function($){
    function setPosition(modal){
        modal.css({
            left: ($(window).width() - modal.width())/2
        });
    }
    function getTopPosition(modal){
        return ($(window).height() - modal.height())/2;
    }
    $.fn.extend({
        modal: function(action){
            var animationSpeed = 700;
            var modal = $(this);
            if(!modal.hasClass('modal')) {
                console.error('This object is not modal');
                return false;
            }
            var fade = $('.modal-fade');
            switch (action){
                case 'show':
                    if(fade.length == 0) {
                        fade = $('<div class="modal-fade"></div>');
                        $('body').prepend(fade);
                    }
                    if(modal.data('width') != undefined){
                        switch (modal.data('width')){
                            case 'big':
                                modal.css('width', '50%');
                                break;
                            case 'small':
                                modal.css('width', '30%');
                                break;
                            default:
                                modal.css('width', modal.data('width'));
                                break;
                        }
                    }
                    $(window).resize(function(){
                        setPosition(modal);
                        modal.css({top: getTopPosition(modal)});
                    });
                    modal.find('a[data-action="close"]').click(function(e){
                        e.preventDefault();
                        $(this).parents('.modal').modal('hide');
                    });
                    fade.click(hideAll);
                    fade.show();
                    fade.animate({
                        opacity: 1
                    }, animationSpeed);
                    modal.show();
                    modal.css({
                        top: -modal.height()
                    });
                    modal.animate({
                        opacity: 1,
                        top: getTopPosition(modal)
                    }, animationSpeed);
                    setPosition(modal);

                    break;
                case 'hide':
                    fade.animate({
                        opacity: 0
                    }, animationSpeed, function(){ fade.hide(); });
                    modal.animate({
                        opacity: 0,
                        top: -modal.height()
                    }, animationSpeed, function(){modal.hide();});

                    break;
            }

            function hideAll(){
                $('.modal').modal('hide');
            }
        }
    });
    $(document).ready(function(){
        $('a[data-action="show-modal"]').click(function(e){
            e.preventDefault();
            var id = $(this).attr('href');
            $(id).modal('show');
        });
    });
})(jQuery);