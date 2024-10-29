if ($('.dropdown')[0]) {
    $('.dropdown').click(function () {
        $(this).toggleClass('is-active');
    });

    $('body').click(function (event) {
        if (!$(event.target).closest('.dropdown').length) {
            $('.dropdown').removeClass('is-active');
        }
    });
}
