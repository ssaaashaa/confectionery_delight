$(document).ready(function () {

    //ставим первый вкус - checked
    $('.selected_biscuit').first().prop('checked', true);
    let one_product_price = document.getElementById('count').innerText;

    //тут получаем количество и меняем цену
    $("input[name='count']").change(function () {
        inCartOrNot();
    });


    //тут определяем, какие вкусовые сочетания доступны
    $('.selected_biscuit').on('click', function () {
        var biscuit_id = $(this).attr('id');
        $.ajax({
            url: 'getFills/' + biscuit_id,
            type: 'get',
            data: {
                "biscuit_id": biscuit_id,
            },
            dataType: 'json',
            success: function (response) {
                $('.selected_fill').each(function () {
                    $(this).prop("checked", false);
                    $(this).prop("disabled", true);
                });
                let flag = 0;
                $.each(response, function (i, response) {
                    var id = 'fill-' + response.fill_id;
                    let check;
                    if (flag === 0) {
                        flag = 1;
                        check = id;
                    }
                    $('input[id=' + id + ']').prop("disabled", false);
                    $('input[id=' + check + ']').prop("checked", true);
                    // $('input[id=' + id + ']').prop("checked", true);
                    inCartOrNot();
                });
            }
        })

    });

    function total_price() {
        let product_count = document.querySelector('input[name="count"]:checked').value;
        let biscuit_id = document.querySelector('input[name="biscuit"]:checked').value;
        let fill_id = document.querySelector('input[name="fill"]:checked');
        if (fill_id == null) {
            fill_id = 'null';
        } else
            fill_id = fill_id.value;
        console.log(fill_id);
        $.ajax({
            url: 'total_price/'+biscuit_id+fill_id,
            type: 'get',
            data: {
                "biscuit_id": biscuit_id,
                "fill_id": fill_id

            },
            // dataType: 'json',
            success: function (response) {
                console.log(one_product_price * product_count * response.taste_ratio);
                let total_price = (Math.round(one_product_price * product_count * response.taste_ratio*10)/10).toString();
                document.getElementById('addToCart').innerHTML = 'Купить за &nbsp<span id="count">{{ $price*$product->ratio}}</span>&nbsp BYN';
                document.getElementById('count').innerText = total_price;
            }
        })
    }

    function inCartOrNot() {

        //тут чтобы сразу полная цена отображалась
        //let one = document.getElementById('count').innerText;
        let checked = document.querySelector('input[name="count"]:checked');
        // alert(checked.value);
        //let price = one_product_price * checked.value;
        // document.getElementById('count').innerText = price.toString();

        let biscuit_id = null;
        let fill_id = null;
        let design_id = null;
        let pieces;
        // let price = 0;
        let id;
        biscuit_id = document.querySelector('input[name="biscuit"]:checked');
        fill_id = document.querySelector('input[name="fill"]:checked');
        console.log(fill_id);
        pieces = document.querySelector('input[name="count"]:checked');
        design_id = document.getElementById('addToCart').value;
        //price = document.getElementById('count').innerText;

        biscuit_id = biscuit_id.value;
        pieces = pieces.value;

        if (fill_id == null) {
            fill_id = 'null';
        } else
            fill_id = fill_id.value;

        id = pieces + biscuit_id + fill_id + design_id;
        // alert(id);

        $.ajax({
            url: 'inCartOrNot/' + id,
            type: 'get',
            data: {
                "id": id,
            },
            dataType: 'json',
            success: function (response) {
                // alert(response);
                if (response) {
                    document.getElementById('addToCart').innerHTML = 'Перейти в корзину';
                    $('#addToCart').addClass('goToCart');
                } else {
                    total_price();
                    $('#addToCart').removeClass('goToCart');


                }

            }
        })
    };

    $('.selected_fill').on('click', function () {
        inCartOrNot();
    });


    inCartOrNot();

    $('#addToCart').on('click', function (e) {
        e.preventDefault();

        var $this = $(this);

        if (!$this.hasClass('goToCart')) {
            $this.addClass('goToCart');
            let biscuit_id = null;
            let fill_id = null;
            let design_id = null;
            let pieces = 6;
            let price = 0;
            // alert(biscuit_id + ',' + fill_id);
            biscuit_id = document.querySelector('input[name="biscuit"]:checked');
            fill_id = document.querySelector('input[name="fill"]:checked');
            pieces = document.querySelector('input[name="count"]:checked');
            design_id = $(this).val();
            biscuit_id = biscuit_id.value;
            pieces = pieces.value;
            price = document.getElementById('count').innerText;
            console.log(price);

            if (fill_id == null) {
                fill_id = 'null';
            } else
                fill_id = fill_id.value;

            document.getElementById('addToCart').onclick = null;
            $('#addToCart').click = null;
            $.ajax({
                url: 'addToCart/' + biscuit_id,
                type: 'get',
                data: {
                    "biscuit_id": biscuit_id,
                    "fill_id": fill_id,
                    "design_id": design_id,
                    "pieces": pieces,
                    "price": price,
                },
                dataType: 'json',
                success: function (response) {
                    document.getElementById('addToCart').innerHTML = 'Перейти в корзину&nbsp<span id="count"></span>&nbsp';
                }
            })

        } else {
            location.href = "/cart";
        }

    });


});
