$(function() {
    $('.videos .video a').on('click', function(e) {
        let link = $(this).attr('href');
        $(".modal div .modal-content .modal-body iframe").attr('src', link);
    });

    $(".quiz.disabled a").click(function(e) {
		e.preventDefault();
	});
});
