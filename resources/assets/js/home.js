
    $(function(){

        var  settings    = {

            action: ROOT_URL+'profile/send-cv', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(pdf)', // allow only pdf
            type: 'json',
            

            loadstart: function() {
                $("#nd-cv-upload-button").attr("disabled","disabled");
                //console.log('uploading...');
            },

            progress: function(percent) {
                $("#nd-cv-upload-status").text("Uploading " + Math.floor(percent) + "%");
                //console.log(percent+'% ');
            },

            allcomplete: function(response) {
                console.log(response);
                $("#nd-cv-upload-button").attr("disabled","");
               if(response.status == "success") {
                    $("#nd-cv-upload-status").text("CV Uploaded ");
                    $("[name=cv-exists]").val('1');
                    showChecks();
                } 
               else {
                    // failure
                    $("#nd-cv-upload-status").text("Upload New CV");
                    $("#profileProgress span").text(":(");
                    UIkit.notify("We couldn't process your CV")
               }
               
                
            }


        };

        var cvSelect = UIkit.uploadSelect($("#cv-upload-select"), settings),
            cvDrop   = UIkit.uploadDrop($("#cv-upload-drop"), settings);
/*
        settings    = {

            action: ROOT_URL+'profile/send-photo-crop', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(jpg|jpeg|gif|png)', // allow only images
            type: 'json',
            

            loadstart: function() {
                $("#profileProgress").removeClass("uk-hidden");
            },

            progress: function(percent) {
                $("#profileProgress span").text(Math.floor(percent) + "%");
            },

            allcomplete: function(response) {

                
               if(response.status == "success") {
                    if (/Mobi/.test(navigator.userAgent)) {
                        // mobile!
                    } else {
                        // show cropping
                    }
                    var modal = UIkit.modal($("#profileImageModal")).show();
                    $("#profileProgress").addClass("uk-hidden");
                    $("[name=profile-exists]").val('1');
                    showChecks();
               		$("#profile-upload-drop").css('background-image','url('+ROOT_URL+'profiles/'+response.prefix + '_300.jpg)');
               } 
               else {
                    // failure
                    $("#profileProgress span").text(":(");
                    var message="";
                    $.each(response.upload_errors,function(key,val) {
                        if(val!="") {
                            message+= '- '+val + '<br>';
                        }
                    });
                    UIkit.notify("We couldn't process your profile image, try again with a smaller photo<br>"+message)
               }
                
            }


        };

        var profileSelect = UIkit.uploadSelect($("#profile-upload-select"), settings),
            profileDrop   = UIkit.uploadDrop($("#profile-upload-drop"), settings);
*/

    var imageLoader = document.getElementById('profile-upload-select');
    imageLoader.addEventListener('change', handleImage, false);
   // var canvas = document.getElementById('cropCanvas');
    //var ctx = canvas.getContext('2d');


    function handleImage(event){
        var file = document.getElementById('profile-upload-select').files[0];
        if (!file.type.match('image.*')) {
            UIkit.notify("You must select an image");
        } else {
            cropImage(event.target.files[0]);
        }
       
    }

    function cropImage(file) {
        var reader = new FileReader();
            reader.onload = function(event){
               
      
                    $('#cropImage').attr('src', event.target.result);

                    $('#cropImage').cropper({
                        aspectRatio: 1,
                        crop: function(e) {
                        // Output the result data for cropping image.
                            console.log(e.x);
                            console.log(e.y);
                            console.log(e.width);
                            console.log(e.height);
                            console.log(e.rotate);
                            console.log(e.scaleX);
                            console.log(e.scaleY);
                        }
                    });

                    $("#profileSaveImage").click(function() {
                        // crop and upload
                        

                        var formData = new FormData();

                          formData.append('croppedImage', $("#cropImage").cropper('getCroppedCanvas').toDataURL('image/jpeg'));
                          formData.append("_token", $('[name="csrf_token"]').attr('content') );

                          $.ajax(ROOT_URL+'profile/send-photo-cropped', {
                            method: "POST",
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                if(response.status=="success") {
                                    $("#profileProgress").addClass("uk-hidden");
                            $("[name=profile-exists]").val('1');
                            showChecks();
                            $("#profile-upload-drop").css('background-image','url('+ROOT_URL+'profiles/'+response.prefix + '_300.jpg)');
                      
                                    UIkit.modal($("#profileImageModal")).hide();  
                                } 
                                else {
                                    UIkit.notify("Unfortunately there was a problem processing your image :( ");
                                     UIkit.modal($("#profileImageModal")).hide();  
                                }
                              console.log('Upload success');
                            },
                            error: function () {
                                 UIkit.notify("Unfortunately there was a problem processing your image :( ");
                                  UIkit.modal($("#profileImageModal")).hide();  
                              console.log('Upload error');
                            }
                          });
                
                    });
            }
            reader.readAsDataURL(file);   
                    var modal = UIkit.modal($("#profileImageModal")).show();  
    }
 
    $('#profile-upload-drop').on({
        dragover: false,
        drop: function(e) {
            e.stopPropagation();
            e.preventDefault();
            e.dataTransfer = e.originalEvent.dataTransfer;
            file = event.dataTransfer.files[0];
            if (file.type.match('image.*')) {
               cropImage(file)
            }
        }
    });
       
    ////////////
    function showChecks() {
        var completed = 0;
        var fields = 0;
        $('.nd-profile-cocheck').each(function() {
            fields++;
            if($(this).val()!="") {
                completed++;
                var field_name = $(this).attr('name');
                
                $('#'+field_name+'-check').removeClass('uk-hidden');
            }
        });
        var progressbar = $("#profile_progressbar"),
                bar         = progressbar.find('.uk-progress-bar');
        var percent = Math.floor((completed/fields)*100);
        //$('#profile-percent-status').text(percent);
        bar.css("width", percent+"%").text('Profile ' + percent+"% Complete");

    }
     showChecks();

    function saveProfile() {
    	$("#profileFormStatus").text('saving...');
    	$.post($('#profileCompleteForm').attr('action'),$('#profileCompleteForm').serialize(),function(r) {
    		$("#profileFormStatus").text('');
            showChecks();
    	});
    }
    $("#profileFormSave").hide();

    $('.nd-profile-autosave').change(function() {
    	saveProfile();
    });

    $('#profileCompleteForm').submit(function(e) {
    	saveProfile();
    	e.preventDefault();
    });

        function checkPitchLength(textarea,label) {
            var charsleft = 299 - textarea.val().length;
            label.text(charsleft);
            if(charsleft < 0) {
                textarea.val(textarea.val().substr(0,300));
            }

        }

        if( $("#ndStudentProfilePitch").length ) {
            $("#ndStudentProfilePitch").keyup(function() {
                checkPitchLength($("#ndStudentProfilePitch"),$("#ndStudentProfilePitchRChar"));
            });
            checkPitchLength($("#ndStudentProfilePitch"),$("#ndStudentProfilePitchRChar"));
        }

        if( $("#ndBusinessPitch").length ) {
            $("#ndBusinessPitch").keyup(function() {
                checkPitchLength($("#ndBusinessPitch"),$("#ndBusinessProfilePitchRChar"));
            });
            checkPitchLength($("#ndBusinessPitch"),$("#ndBusinessProfilePitchRChar"));
        }

        //data-uk-autocomplete="{source:'{{action('ProfileController@getCourseAutocomplete')}}'}"
        var autocomplete = UIkit.autocomplete($("#ndProfileCourse"), { source: ROOT_URL + 'profile/courses-search' });
        $("#ndProfileCourse").on('selectitem.uk.autocomplete', function(event, data,acobject){
            puzzle = data.value.split('+');
            $("#ndProfileCourse input").val(puzzle[0]);
                saveProfile();
        });

    $('#ndProfileSkills').tagsInput({
      'defaultText':'add skill',
       'onAddTag' : function() {
        saveProfile();
        loadSuggestedSkills();
       },
       'onRemoveTag' : function() {
        saveProfile();
       },
       'width':'100%',
       
    });

    

    function loadSuggestedSkills() {
        $.get(ROOT_URL+'student/suggested-skills',function(data) {
            $(".suggested-skills-l").html('');
            if(data.length > 0) {
                $.each(data,function(k,skill) {
                    $(".suggested-skills-l").append($('<li><a href="#" class="uk-button uk-button-large suggested-skills-button"><i class="uk-icon-large uk-icon-'+skill.icon+'"></i></br><span class="n">'+skill.name+'</span></a></li>'));
                });
                $(".suggested-skills-button").click(function() {
                    $('#ndProfileSkills').addTag($(this).find('span.n').text());
                });
            } 
            else {
                 $(".suggested-skills").hide().html("");
            }
        });

        
    }

    if($(".suggested-skills").length) {
        loadSuggestedSkills();
    }

    function refreshJobseekIcons() {
        $(".jobseek-checkboxes li").each(function() {
            checkbox = $(this).find("input");
            if(checkbox.prop("checked")) {
                $(this).find("i").removeClass("uk-icon-square-o").addClass("uk-icon-check-square-o");
            } else {
                $(this).find("i").addClass("uk-icon-square-o").removeClass("uk-icon-check-square-o");
            }
        });
    }

    if($(".jobseek-checkboxes").length) {
        $(".jobseek-checkboxes .control").hide();
        refreshJobseekIcons();
        $(".jobseek-checkboxes li a").click(function() {
            checkbox = $(this).parent().find(".control label input");
            checkbox.prop("checked", !checkbox.prop("checked"));
            
            saveJobSeek();
        })
    }

    function saveJobSeek() {
        $("#profileFormStatus").text('saving...');
        $.post($('#jobseekForm').attr('action'),$('#jobseekForm').serialize(),function(r) {
            $("#profileFormStatus").text('');
            refreshJobseekIcons();
        });
    }
    $("#jobseekFormSave").hide();

    $('.nd-jobseek-autosave').change(function() {
        saveJobSeek();
    });
});

