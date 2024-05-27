$(document).ready(function () {

    //ставим первый вкус - checked
    $('.selected_biscuit').first().prop('checked', true);
    $('.selected_design').first().prop('checked', true);

    let price = document.getElementById('cake_price').innerText;
    price = parseInt(price)/2;
    total_price();
    inCartOrNot();

    function total_price() {

        let biscuit_id = document.querySelector('input[name="biscuit"]:checked').value;
        let fill_id = document.querySelector('input[name="fill"]:checked');
        if (fill_id == null) {
            fill_id = 'null';
        } else
            fill_id = fill_id.value;

        let design_id = document.querySelector('input[name="design"]:checked').value;
        let weight = document.getElementById('cake_weight').innerText;

        $.ajax({
            url: 'total_price/'+design_id+biscuit_id+fill_id,
            type: 'get',
            data: {
                "biscuit_id": biscuit_id,
                "fill_id": fill_id,
                "design_id": design_id
            },
            // dataType: 'json',
            success: function (response) {
                console.log(price * weight * response.taste_ratio * response.design_ratio);
                let total_price = (Math.round(price * weight * response.taste_ratio * response.design_ratio*10)/10).toString();
                document.getElementById('cake_price').innerText = total_price;
            }
        })
    }


    $("input[name='design']").change(function () {
        inCartOrNot();
    });

    $("input[name='count']").change(function () {
        let weight;
        var tiers_count = $(this).val();
        document.querySelectorAll('.tier').forEach(function (img, index) {
            if (index >= 4 - tiers_count) {
                img.style.opacity = 1;
            } else {
                img.style.opacity = 0.05;
            }
        });
        if (tiers_count === '1') {
            weight = 2;
        } else if (tiers_count === '2') {
            weight = 4;
        } else if (tiers_count === '3') {
            weight = 7;
        } else if (tiers_count === '4') {
            weight = 13;
        }
        document.getElementById('cake_weight').innerText = weight;
        //document.getElementById('cake_price').innerText = (parseInt(price)/2 * weight).toString();
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
                    // $('input[id=' + id + ']').prop("checked", true);
                    $('input[id=' + check + ']').prop("checked", true);

                });

                let fill_id = document.querySelector('input[name="fill"]:checked');
                if (fill_id == null) {
                    fill_id = 'null';
                } else
                    fill_id = fill_id.value;
                $.ajax({
                    url: 'getTasteImg/' + biscuit_id + fill_id,
                    type: 'get',
                    data: {
                        "biscuit_id": biscuit_id,
                        "fill_id": fill_id
                    },
                    success: function (response) {
                        const images = document.getElementsByClassName('tier');
                        const newSrc = '/storage/biscuits/' + response;
                        for (let i = 0; i < images.length; i++) {
                            images[i].src = newSrc;
                        }
                    }
                })
                inCartOrNot();
            }
        })
    });

    $('.selected_fill').on('click', function () {
        let fill_id = $(this).val();
        //console.log(fill_id);
        let biscuit_id = document.querySelector('input[name="biscuit"]:checked');
        biscuit_id = biscuit_id.value;
        if (fill_id == null) {
            fill_id = 'null';
        }
        $.ajax({
            url: 'getTasteImg/' + biscuit_id + fill_id,
            type: 'get',
            data: {
                "biscuit_id": biscuit_id,
                "fill_id": fill_id
            },
            success: function (response) {
                const images = document.getElementsByClassName('tier');
                const newSrc = '/storage/biscuits/' + response;
                for (let i = 0; i < images.length; i++) {
                    images[i].src = newSrc;
                }
            }
        })
        inCartOrNot();
    });


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
        design_id = document.querySelector('input[name="design"]:checked');
        pieces = pieces.value;
        biscuit_id = biscuit_id.value;
        design_id = design_id.value;

        if (fill_id == null) {
            fill_id = 'null';
        } else
            fill_id = fill_id.value;

        id = pieces + biscuit_id + fill_id + design_id + 'cake';
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
                total_price();
                if (response) {
                    document.getElementById('addToCart').innerHTML = 'Перейти в корзину';
                    $('#addToCart').addClass('goToCart');
                } else {
                    document.getElementById('addToCart').innerHTML = 'Добавить в корзину';
                    $('#addToCart').removeClass('goToCart');


                }

            }
        })
    };


//
// $('.selected_fill').on('click', function () {
//     inCartOrNot();
// });
//
//
// inCartOrNot();
//
    $('#addToCart').on('click', function (e) {
        e.preventDefault();

        var $this = $(this);

        if (!$this.hasClass('goToCart')) {
            $this.addClass('goToCart');
            let pieces = 1;
            let weight;
            let biscuit_id = null;
            let fill_id = null;
            let design_id = null;
            let price = 0;
            // alert(biscuit_id + ',' + fill_id);
            pieces = document.querySelector('input[name="count"]:checked');
            weight = document.getElementById('cake_weight').innerText;
            biscuit_id = document.querySelector('input[name="biscuit"]:checked');
            fill_id = document.querySelector('input[name="fill"]:checked');
            design_id = document.querySelector('input[name="design"]:checked');
            pieces = pieces.value;
            biscuit_id = biscuit_id.value;
            design_id = design_id.value;
            price = document.getElementById('cake_price').innerText;

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
                    "weight": weight,
                    "pieces": pieces,
                    "biscuit_id": biscuit_id,
                    "fill_id": fill_id,
                    "design_id": design_id,
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


})
;
