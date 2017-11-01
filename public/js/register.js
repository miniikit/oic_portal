(function () {
    $(window).on('load',function () {
        $('#categories').change(function () {
            var val = $(this).val()
            var elm = $('#categories option[value=' + val +']')
            var target = elm.attr('data-category')

            $('.target__select').addClass('none')
            $('.target__select[data-category=' + target +']').removeClass('none')
        })
    })
}).call(this)
