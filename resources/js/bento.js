$(document).ready(function () {
    $('.selected_biscuit').first().prop('checked', true);

    inCartOrNot();
    let price = document.getElementById('price').innerText;
    //let new_price;

    $("input[name='count']").change(function () {
        // var weight = $(this).val();
        //
        // if(weight==='400') {
        //     new_price = price*1;
        // }
        // else if (weight==='800') {
        //     new_price = price*2;
        // }
        inCartOrNot();
        //document.getElementById('price').innerText = new_price;
    });


    $('.selected_biscuit').on('click', function () {
        var biscuit_id = $(this).attr('id');
        $.ajax({
            url: 'bentoGetFills/' + biscuit_id,
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
        let weight = document.querySelector('input[name="count"]:checked').value;
        let weight_ratio;
        if (weight === '400') {
            weight_ratio = 1;
        } else if (weight === '800') {
            weight_ratio = 2;
        }
        let biscuit_id = document.querySelector('input[name="biscuit"]:checked').value;
        let fill_id = document.querySelector('input[name="fill"]:checked');
        if (fill_id == null) {
            fill_id = 'null';
        } else
            fill_id = fill_id.value;
        console.log(fill_id);
        $.ajax({
            url: 'bento_total_price/' + biscuit_id + fill_id,
            type: 'get',
            data: {
                "biscuit_id": biscuit_id,
                "fill_id": fill_id

            },
            success: function (response) {
                console.log(price * weight_ratio * response.taste_ratio);
                let total_price = (Math.round(price * weight_ratio * response.taste_ratio*10)/10).toString();
                document.getElementById('addToCart').innerHTML = 'Купить за &nbsp<span id="price">{{$price}}</span>&nbsp BYN';
                document.getElementById('price').innerText = total_price;
            }
        })
    }

    function inCartOrNot() {
        let id;
        let pieces = 1;
        let biscuit_id = null;
        let fill_id = null;
        let design_id = null;
        // alert(biscuit_id + ',' + fill_id);
        pieces = document.querySelector('input[name="count"]:checked');
        biscuit_id = document.querySelector('input[name="biscuit"]:checked');
        fill_id = document.querySelector('input[name="fill"]:checked');
        design_id = document.getElementById('addToCart').value;
        pieces = pieces.value;
        biscuit_id = biscuit_id.value;

        if (fill_id == null) {
            fill_id = 'null';
        } else
            fill_id = fill_id.value;

        id = pieces + biscuit_id + fill_id + design_id + 'bento';
        // alert(id);

        $.ajax({
            url: 'bentoInCartOrNot/' + id,
            type: 'get',
            data: {
                "id": id,
            },
            dataType: 'json',
            success: function (response) {
                // alert(response);
                if (response) {
                    document.getElementById('addToCart').innerHTML = 'Перейти в корзину&nbsp<span id="price"></span>&nbsp';
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
            price = document.getElementById('price').innerText;
            //console.log(price);

            if (fill_id == null) {
                fill_id = 'null';
            } else
                fill_id = fill_id.value;

            document.getElementById('addToCart').onclick = null;
            $('#addToCart').click = null;
            $.ajax({
                url: 'bentoAddToCart/' + biscuit_id,
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
                    document.getElementById('addToCart').innerHTML = 'Перейти в корзину&nbsp<span id="price"></span>&nbsp';
                }
            })

        } else {
            location.href = "/cart";
        }

    });


});
