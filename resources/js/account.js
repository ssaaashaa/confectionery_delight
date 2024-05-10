$(document).ready(function () {

    $("#load_avatar").on('change', function (ev) {
        console.log('inside');

        var filedata = this.files[0];
        var imgtype = filedata.type;

        var match = ['image/jpeg', 'image/jpg', 'image/png'];

        if (imgtype === match[0] || imgtype === match[1] || imgtype === match[2]) {
            var reader = new FileReader();
            reader.onload = function (ev) {
                console.log(ev.target.result);
                $('#user_avatar').attr('src', ev.target.result)
            }
            reader.readAsDataURL(this.files[0]);

            var postData = new FormData();
            postData.append('file', this.files[0]);

            $.ajax({
                headers: {'X-CSRF-Token': $('meta[name = csrf_token]').attr('content')},
                async: true,
                url: 'load_avatar',
                type: 'post',
                contentType: false,
                data: postData,
                processData: false,
                success: function () {
                    console.log('success');
                }
            })
        } else {

        }
    });

    function update_user_info() {
        $('#save_user_info').on('click', function () {
            let name = document.querySelector('input[name="new_name"]').value;
            let email = document.querySelector('input[name="new_email"]').value;
            let telephone = document.querySelector('input[name="new_telephone"]').value;

            $.ajax({
                url: 'account/update_user_info',
                type: 'get',
                data: {
                    "name": name,
                    "email": email,
                    "telephone": telephone,
                },
                dataType: 'json',
                success: function (res) {
                    name = res.name;
                }
            })
        });
    }

    update_user_info();

    $('#personal-data').on('click', function () {
        $('.account__orders').addClass('visually-hidden');
        $('.account__data').removeClass('visually-hidden');
        $(this).addClass('button-account--focused');
        $('#user-orders').removeClass('button-account--focused');
    });

    $('#user-orders').on('click', function () {
        $('.account__data').addClass('visually-hidden');
        $('.account__orders').removeClass('visually-hidden');
        $(this).addClass('button-account--focused');
        $('#personal-data').removeClass('button-account--focused');
    });

    $('.user-orders__accordion-button').on('click', function () {
        let order = $(this).val();
        $('#dark-bg').removeClass('visually-hidden');
        $('#review-form-'+order).removeClass('visually-hidden');
        $('.register').addClass('visually-hidden');
        $('.login').addClass('visually-hidden');
        $('.forgot').addClass('visually-hidden');
    });

    $('.review__close').on('click', function () {
        $('.review').addClass('visually-hidden');
        $('#dark-bg').addClass('visually-hidden');
    });





});
