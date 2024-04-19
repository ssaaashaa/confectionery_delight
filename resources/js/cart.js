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
                    document.getElementById(product_id+'-price').innerText = response.update_amount_of_product;

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
                    document.getElementById(product_id+'-price').innerText = response.update_amount_of_product;

                }
            })
        });
    }
    updateCart();
});
