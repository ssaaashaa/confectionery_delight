$(document).ready(function () {

    $(".load_taste_img").on('change', function (ev) {
        //console.log('inside');

        var filedata = this.files[0];
        var imgtype = filedata.type;
        let taste = $(this).attr('id');
        //console.log("id: "+taste);

        var match = ['image/jpeg', 'image/jpg', 'image/png'];

        if (imgtype === match[0] || imgtype === match[1] || imgtype === match[2]) {
            var reader = new FileReader();
            reader.onload = function (ev) {
                //console.log(ev.target.result);
                let img = "#taste-" + taste + "_img";
                $(img).attr('src', ev.target.result)
            }
            reader.readAsDataURL(this.files[0]);
        } else {

        }
    });

});
