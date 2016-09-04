
    $(function(){
        var progressbar = $("#imageselect_progressbar"),
            bar         = progressbar.find('.uk-progress-bar'),
            settings    = {

            action: ROOT_URL+'admin/file', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(jpg|jpeg|gif|png)', // allow only images
            type: 'json',
            

            loadstart: function() {
                bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
                progressbar.removeClass("uk-progress-danger uk-progress-success");
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
                
               // alert("Upload Completed")
               //console.log(response);
               if(response.status == "success") {
                    progressbar.addClass(" uk-progress-success uk-hidden");

                    progressbar.removeClass("uk-progress-striped uk-active");
                    
                    $("#imageselect_id").val(response.files[0].image.id);
                    $(".imageselect_preview img").attr("src",ROOT_URL+response.files[0].image.thumbnail.path);
               } 
               else {
                    progressbar.addClass(" uk-progress-danger");
                    progressbar.removeClass("uk-progress-striped uk-active");
               }
                
            }


        };

        var select = UIkit.uploadSelect($("#imageselect-upload-select"), settings),
            drop   = UIkit.uploadDrop($("#imageselect-upload-drop"), settings);

        $("#imageselect_browse_button").click(function() {
            
            var image = getImageFromModel(function(image) {
                $("#imageselect_id").val(image.id);
                $(".imageselect_preview img").attr("src",ROOT_URL+image.thumbnail.path);
            });
            
        });

    function getImageFromModel(callback) {
        var modal = UIkit.modal(".imageselect_modal");

            if ( modal.isActive() ) {
                modal.hide();
            } else {
                modal.show();
                function displayImageResults(results) {
                    resultDisplay = $("<div></div>");
                    $.each(results,function(key,image){ // for each image
                        // generate thumbnail
                      
                        var thumbnail = $('<a href="#" class="uk-thumbnail uk-thumbnail-small"></a>');
                        thumbnail.append('  <img src="'+ROOT_URL+image.thumbnail.path+'"  /> <div class="uk-thumbnail-caption">'+image.original_name+'</div>');
                        thumbnail.click(function() {
                            modal.hide();
                            return callback(image);
                            
                        });
                        resultDisplay.append(thumbnail);
                        // add to results
                    
                       // resultDisplay.append("<a href=\"#\"><img src=\""+ROOT_URL+image.image_cache_json[300].path+"\" width=\"150\" /></a></li>");
                    });
                    $(" .imageselect_images").html(resultDisplay);
                }
                
                $.get(ROOT_URL+'admin/api/images', function(response) {
                    displayImageResults(response.results);
                });
            }
    }

    });

