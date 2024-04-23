$(document).ready(function () {

    // $("#load_avatar").change(function() {
    //     let filename = this.files[0].name;
    //     $.ajax({
    //         url: 'load_avatar/' + filename,
    //         type: 'get',
    //         data: {
    //             "avatar": filename,
    //         },
    //         // dataType: 'json',
    //         success: function (response) {
    //             document.getElementById('user_avatar').src = "/storage/img/"+response;
    //         }
    //     })
    //     alert(filename);
    // });

    // function doAfterSelectImage(input) {
    //     readURL(input);
    //     uploadUserProfileImage();
    // }

    // function readURL(input) {
    //     if (input.files && input.files[0]) {
    //         var reader = new FileReader();
    //         reader.onload = function (e) {
    //             document.getElementById('user_avatar').src =  e.target.result;
    //         };
    //         reader.readAsDataURL(input.files[0]);
    //     }
    // }

    // function uploadUserProfileImage() {
    //     let myForm = document.getElementById('user_save_profile_form');
    //     let formData = new FormData(myForm);
    //     $.ajax({
    //         type: 'POST',
    //         data: formData,
    //         dataType: 'JSON',
    //         contentType: false,
    //         cache: false,
    //         processData: false,
    //         url: '{{route('save.profile.picture')}}',
    //         success: function (response) {
    //             if (response == 200) {
    //                 $('#notifDiv').fadeIn();
    //                 $('#notifDiv').css('background', 'green');
    //                 $('#notifDiv').text('Profile Saved Successfully.');
    //                 setTimeout(() => {
    //                     $('#notifDiv').fadeOut();
    //                 }, 3000);
    //
    //             } else if (response == 700) {
    //                 $('#notifDiv').fadeIn();
    //                 $('#notifDiv').css('background', 'red');
    //                 $('#notifDiv').text('An error occured. Please try later');
    //                 setTimeout(() => {
    //                     $('#notifDiv').fadeOut();
    //                 }, 3000);
    //             }
    //         }.bind($(this))
    //     });
    // }

});
