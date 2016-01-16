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
            var modal = $(this);
            if(!modal.hasClass('modal')) {
                console.error('This object is not modal');
                return false;
            }
            var fade = $('.modal-fade');
            switch (action){
                case 'show':
                    hideAll();
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
                    modal.show();
                    modal.css({
                        top: -modal.height(),
                        opacity: 0
                    });
                    modal.animate({
                        opacity: 1,
                        top: getTopPosition(modal)
                    });
                    setPosition(modal);

                    break;
                case 'hide':
                    fade.hide();
                    modal.hide();
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