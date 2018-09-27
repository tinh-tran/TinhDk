jQuery(function($) {
    	$.getJSON("/wp-content/themes/TinhDk/like.php?action=get", function (data) {
    	$('.like-vote span').html(data.like);
	});
	 $('.like-vote').on('click', function (event){
        event.preventDefault();
            $.getJSON("/wp-content/themes/TinhDk/like.php?action=add", function (data) {
                if (data.success) {
                    $('.like-vote span').html(data.like);
                    $('.like-title').html('Tôi cũng thích bạn (*≧▽≦)');
                }
                else {
                    $('.like-title').html('Tôi đã cảm nhận được tình yêu của bạn~');
                }
            });
    });
      //------------------ Chế độ ban đêm------------------
    btn_nightmode = $('.set-view-mode');
    if (sessionStorage.nightmode == "night") {
        $('body').addClass('night-mode');
        btn_nightmode.find('i').attr('class', 'fa fa-sun fa-2x fa-fw');
    }
    btn_nightmode.click(function() {
        var next_mode = $('body').hasClass('night-mode') ? 'day' : 'night';
        if (next_mode != 'day') {
            $('body').addClass('night-mode');
            btn_nightmode.find('i').attr('class', 'fa fa-sun fa-2x fa-fw');
            sessionStorage.nightmode = "night";
        } else {
            $('body').removeClass('night-mode');
            btn_nightmode.find('i').attr('class', 'fa fa-moon fa-2x fa-fw');
            sessionStorage.nightmode = "day";
        }
    });
});