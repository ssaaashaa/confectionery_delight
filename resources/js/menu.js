$(document).ready(function () {
    let $category = $('.menu__categories-selected');
    $category.first().prop('checked', true);

    display_items();

    function display_items () {
       // var category_id = $(this).attr('value');
        let category_id = document.querySelector('input[name="menu_category"]:checked').value;


        $('.menu__items-item').each(function () {
            let product_category_id = $(this).attr('id');
            if (product_category_id === category_id) {
                $(this).css('display', 'block');
            } else if (category_id === '0') {
                $(this).css('display', 'block');
            } else if (product_category_id !== category_id) {
                $(this).css('display', 'none');
            }
        });
    }

    $category.on('click', function () {
       display_items();
    });

})
