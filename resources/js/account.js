$(document).ready(function () {

    $("#load_avatar").on('change',function(ev) {
        console.log('inside');

        var filedata = this.files[0];
        var imgtype = filedata.type;

        var match = ['image/jpeg', 'image/jpg', 'image/png'];

        if(imgtype===match[0] || imgtype===match[1] || imgtype===match[2]) {
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
        }
        else {

        }
    });

    $('#save_user_info').on('click', function () {
        let name = document.querySelector('input[name="name"]').value;
        let email = document.querySelector('input[name="email"]').value;
        let telephone = document.querySelector('input[name="telephone"]').value;

        $.ajax({
            url: 'update_user_info',
            type: 'get',
            data: {
                "name": name,
                "email": email,
                "telephone": telephone,
            },
            dataType: 'json',
            success: function () {
            }
        })
    });



    });
