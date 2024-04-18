$(document).ready(function () {

    //ставим первый вкус - checked
    $('.selected_biscuit').first().prop('checked', true);

    let price = document.getElementById('cake_price').innerText;

    //тут получаем количество и меняем цену
    $("input[name='count']").change(function () {
        //inCartOrNot();
        var tiers_count = $(this).val();
        document.querySelectorAll('.tier').forEach(function (img, index) {
            if (index >= 4 - tiers_count) {
                img.style.opacity = 1;
                //$(this).css('display', 'none');
            } else {
                img.style.opacity = 0.05;
            }
        });

        let weight;
        if(tiers_count==='1') {
            weight = 2;
        }
        else if (tiers_count==='2') {
            weight = 4;
        }
        else if (tiers_count==='3') {
            weight = 7;
        }
        else if (tiers_count==='4') {
            weight = 13;
        }
        document.getElementById('cake_weight').innerText = weight;
        document.getElementById('cake_price').innerText = (parseInt(price) * weight).toString();

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
                $.each(response, function (i, response) {
                    var id = 'fill-' + response.fill_id;
                    $('input[id=' + id + ']').prop("disabled", false);
                    $('input[id=' + id + ']').prop("checked", true);
                    //inCartOrNot();
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
                        const newSrc = '/storage/biscuits/'+response;
                        for (let i = 0; i < images.length; i++) {
                            images[i].src = newSrc;
                        }
                    }
                })

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
                const newSrc = '/storage/biscuits/'+response;
                for (let i = 0; i < images.length; i++) {
                    images[i].src = newSrc;
                }
            }
        })

    });


// function inCartOrNot() {
//
//     //тут чтобы сразу полная цена отображалась
//     //let one = document.getElementById('count').innerText;
//     let checked = document.querySelector('input[name="count"]:checked');
//     // alert(checked.value);
//     let price = one_product_price * checked.value;
//     // document.getElementById('count').innerText = price.toString();
//
//     let biscuit_id = null;
//     let fill_id = null;
//     let design_id = null;
//     let pieces;
//     // let price = 0;
//     let id;
//     biscuit_id = document.querySelector('input[name="biscuit"]:checked');
//     fill_id = document.querySelector('input[name="fill"]:checked');
//     console.log(fill_id);
//     pieces = document.querySelector('input[name="count"]:checked');
//     design_id = document.getElementById('addToCart').value;
//     //price = document.getElementById('count').innerText;
//
//     biscuit_id = biscuit_id.value;
//     pieces = pieces.value;
//
//     if (fill_id == null) {
//         fill_id = 'null';
//     } else
//         fill_id = fill_id.value;
//
//     id = pieces + biscuit_id + fill_id + design_id;
//     // alert(id);
//
//     $.ajax({
//         url: 'inCartOrNot/' + id,
//         type: 'get',
//         data: {
//             "id": id,
//         },
//         dataType: 'json',
//         success: function (response) {
//             // alert(response);
//             if (response) {
//                 document.getElementById('addToCart').innerHTML = 'Перейти в корзину';
//                 $('#addToCart').addClass('goToCart');
//             } else {
//                 document.getElementById('addToCart').innerHTML = 'Купить за &nbsp<span id="count">{{ $price*$product->ratio}}</span>&nbsp BYN';
//                 document.getElementById('count').innerText = price.toString();
//                 $('#addToCart').removeClass('goToCart');
//
//
//             }
//
//         }
//     })
// };
//
// $('.selected_fill').on('click', function () {
//     inCartOrNot();
// });
//
//
// inCartOrNot();
//
// $('#addToCart').on('click', function (e) {
//     e.preventDefault();
//
//     var $this = $(this);
//
//     if (!$this.hasClass('goToCart')) {
//         $this.addClass('goToCart');
//         let biscuit_id = null;
//         let fill_id = null;
//         let design_id = null;
//         let pieces = 6;
//         let price = 0;
//         // alert(biscuit_id + ',' + fill_id);
//         biscuit_id = document.querySelector('input[name="biscuit"]:checked');
//         fill_id = document.querySelector('input[name="fill"]:checked');
//         pieces = document.querySelector('input[name="count"]:checked');
//         design_id = $(this).val();
//         biscuit_id = biscuit_id.value;
//         pieces = pieces.value;
//         price = document.getElementById('count').innerText;
//         console.log(price);
//
//         if (fill_id == null) {
//             fill_id = 'null';
//         } else
//             fill_id = fill_id.value;
//
//         document.getElementById('addToCart').onclick = null;
//         $('#addToCart').click = null;
//         $.ajax({
//             url: 'addToCart/' + biscuit_id,
//             type: 'get',
//             data: {
//                 "biscuit_id": biscuit_id,
//                 "fill_id": fill_id,
//                 "design_id": design_id,
//                 "pieces": pieces,
//                 "price": price,
//             },
//             dataType: 'json',
//             success: function (response) {
//                 document.getElementById('addToCart').innerHTML = 'Перейти в корзину&nbsp<span id="count"></span>&nbsp';
//             }
//         })
//
//     } else {
//         location.href = "/cart";
//     }
//
// });


})
;
