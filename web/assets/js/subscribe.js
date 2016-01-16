/**
 * Created by Nikita on 07.01.2016.
 */
$(document).ready(function(){
    $('#subscribe-form').submit(function(e){
        e.preventDefault();
        var $form = $(this);
        var $emailField = $form.find('[name=email]');
        $emailField.removeClass('error');
        var email = $emailField.val();
        if(!checkEmail(email)){
            $emailField.addClass('error');
            return false;
        }
        $.post(subscribe_path, {email: email}, function(data){
            if(!checkData(data)) return false;
            if(!data.result){
                errorNoty(data.error);
                return false;
            } else {
                successNoty(data.message);
            }
        });
    });
});

(function($){
    $(window).load(function(){
        $('#subscribe_terms').find('.text').mCustomScrollbar();
    });
})(jQuery);