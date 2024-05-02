$(document).ready(function () {

    $('.design-categories__selected').on('click', function () {
        var design_category_id = $(this).attr('value');

        $('.items__item').each(function () {
            let product_category_id = $(this).attr('id');
            if (product_category_id === design_category_id) {
                $(this).css('display', 'block');
            } else if (design_category_id === '0') {
                $(this).css('display', 'block');
            } else if (product_category_id !== design_category_id) {
                $(this).css('display', 'none');
            }
        });
    });
})
