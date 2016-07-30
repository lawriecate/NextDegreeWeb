
    $(function(){
        var progressbar = $("#progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {

            action: ROOT_URL+'admin/file', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(jpg|jpeg|gif|png)', // allow only images
            

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
                progressbar.removeClass(" uk-progress-success");
                progressbar.addClass("uk-progress-striped uk-active");
            },

            progress: function(percent) {
                percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");
            },

            allcomplete: function(response) {

                bar.css("width", "100%").text("100%");

            /* setTimeout(function(){
                    progressbar.addClass("uk-hidden");
                }, 250);*/
                setTimeout(function() {
                    location.reload();
                }, 1000);
               // alert("Upload Completed")
                progressbar.addClass(" uk-progress-success");
                progressbar.removeClass("uk-progress-striped uk-active");
               // console.log(response);

            }


        };

        var select = UIkit.uploadSelect($("#upload-select"), settings),
            drop   = UIkit.uploadDrop($("#upload-drop"), settings);
    });
