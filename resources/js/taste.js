$(document).ready(function () {

    let one = document.getElementById('count').innerText;
    let checked = document.querySelector('input[name="count"]:checked');
    let price = one * checked.value;
    document.getElementById('count').innerText = price.toString();

    console.log(one);
    $("input[name='count']").change(function () {
        let checked = document.querySelector('input[name="count"]:checked');
        let price = one * checked.value;
        document.getElementById('count').innerText = price.toString();
    });


    $('.selected_biscuit').on('click', function () {
        var biscuit_id = $(this).attr('id');
        //alert(biscuit_id);
        $.ajax({
            url: 'getFills/' + biscuit_id,
            type: 'get',
            data: {
                "biscuit_id": biscuit_id,
            },
            dataType: 'json',
            success: function (response) {
                console.log(response);
                $('.selected_fill').each(function () {
                    $(this).prop("disabled", true);
                });
                $.each(response, function (i, response) {
                    var id = 'fill-' + response.fill_id;
                    console.log(id);
                    $('input[id=' + id + ']').prop("disabled", false);
                });
            }
        })
    });
});
