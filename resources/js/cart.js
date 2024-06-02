$(document).ready(function () {
    $('.deleteFromCart').on('click', function () {
        var product_id= $(this).attr('id');
        $.ajax({
            url: 'cart/delete',
            type: 'get',
            data: {
                "product_id": product_id,
            },
            dataType: 'html',
            success: function (response) {
                $("body").html(response);
            }
        })

    });


    function updateCart() {
        $('.addQunatity').on('click', function () {
            let product_id = $(this).val();
            let quantity = document.getElementById(product_id+'-quantity');
            quantity.innerText = parseInt(quantity.innerText) + 1;
            if (quantity.innerText > 100) {
                quantity.innerText = 100;
            }
            quantity = quantity.innerText;
            let price = document.getElementById(product_id+'-price').innerText;
            //console.log(pieces);
            $.ajax({
                url: 'cart/update',
                type: 'get',
                data: {
                    "product_id": product_id,
                    "quantity": quantity,
                    "price": price,
                },
                dataType: 'json',
                success: function (response) {
                    //console.log(response);
                    document.getElementById('cart_total').innerText = 'Итого: ' + response.cart_total +' BYN';
                    document.getElementById(product_id+'-price').innerText = response.update_amount_of_product + ' BYN';

                }
            })

        });

        $('.removeQunatity').on('click', function () {
            let product_id = $(this).val();
            let quantity = document.getElementById(product_id+'-quantity');
            quantity.innerText = parseInt(quantity.innerText) - 1;
            if (quantity.innerText < 2) {
                quantity.innerText = 1;
            }
            quantity = quantity.innerText;
            let price = document.getElementById(product_id+'-price').innerText;
            //console.log(pieces);
            $.ajax({
                url: 'cart/update',
                type: 'get',
                data: {
                    "product_id": product_id,
                    "quantity": quantity,
                    "price": price,
                },
                dataType: 'json',
                success: function (response) {
                    //console.log(response);
                    document.getElementById('cart_total').innerText = 'Итого: ' + response.cart_total +' BYN';
                    document.getElementById(product_id+'-price').innerText = response.update_amount_of_product + ' BYN';

                }
            })
        });
    }
    updateCart();

    $("input[name='delivery-type']").change(function () {
        let delivery_type = $(this).val();
        if (delivery_type === 'Доставка') {
            document.getElementById('order_address').required = true;
            $('#delivery_field').removeClass('visually-hidden');
            $('#delivery_address').addClass('visually-hidden');
        }
        else  {
            document.getElementById('order_address').required = false;
            $('#delivery_field').addClass('visually-hidden');
            $('#delivery_address').removeClass('visually-hidden');

        }
    });


});
