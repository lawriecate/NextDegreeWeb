
    $(function(){
        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {

            action: 'http://localhost:8888/nd/NextDegreeWeb/public/admin/files/upload', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow : '*.(jpg|jpeg|gif|png)', // allow only images
            type: 'json',

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
            },

            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },

            allcomplete: function(response) {

                bar.css("width", "100%").text("100%");

                setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);

                alert("Upload Completed")

                console.log(response);
            }


        };

        var select = UIkit.uploadSelect($("#upload-select"), settings),
            drop   = UIkit.uploadDrop($("#upload-drop"), settings);
    });
