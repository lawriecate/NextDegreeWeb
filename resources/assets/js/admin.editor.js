$(function() {
	var i = 0;
	function makeUploader(button,field) {
		var settings    = {

            action: ROOT_URL+'admin/file', // upload url
            params: { "_token": $('[name="csrf_token"]').attr('content') },
            allow: '*.(jpg|jpeg|gif|png)', // allow only images
            type: 'json',
            

            loadstart: function() {
                /*bar.css("width", "0%").text("0%");
                progressbar.removeClass("uk-hidden");
                progressbar.removeClass("uk-progress-danger uk-progress-success");
                progressbar.addClass("uk-progress-striped uk-active");*/
            },

            progress: function(percent) {
                /*percent = Math.ceil(percent);
                bar.css("width", percent+"%").text(percent+"%");*/
            },

            allcomplete: function(response) {

                
               if(response.status == "success") {
               //	console.log(response.files[0].image);
                    field.val(ROOT_URL + response.files[0].image.large.path);
               } 
               else {
                 /*   progressbar.addClass(" uk-progress-danger");
                    progressbar.removeClass("uk-progress-striped uk-active");*/
               }
                
            }


        };

        UIkit.uploadSelect(button, settings);
        
	}

	function reIdSegments() {
		segmentCount = 0;
	 	$(".nd-editor-components li").each(function(index,segment) {
	 		$(segment).find("input, textarea, select").each(function(index2,component) {	
	 			if($(component).attr("name")!= undefined) {
	 				oldname = $(component).attr("name");
		 			
		 			if(oldname.substr(0,6) == "editor") {
		 				newname = "editor["+segmentCount+oldname.substr(8);
		 				$(component).attr("name",newname);
		 				console.log("> "+newname);
		 			}
		 		}
	 		});
	 		segmentCount++;
	 	});
	}

	function addComponent(ctype,value)
	{
		if(value==undefined) {value = "";}
		switch(ctype) {
			case "html":
			editArea = $('<textarea name="editor['+i+'][value]" rows="20" placeholder="Type here..." class="uk-width-1-1 " name="html">'+value+'</textarea>');
			break;
			case "video":
			editArea = $('Enter Youtube URL: <input name="editor['+i+'][value]" type="text" value="'+value+'" />');
			break;
			case "image":
			editArea = $('<div>Enter Image URL: </div>');
			field = $('<input name="editor['+i+'][value]" type="text" value="'+value+'" />');
			editArea.append(field);
			button = $('<a class="uk-form-file uk-button">Upload Image </a> ');
			fileField = $('<input type="file"> ');
			button.append(fileField);
			editArea.append(button);
			makeUploader(fileField,field);
			
			break;
		}
		removeButton = $('<a href="#" class="uk-button uk-button-small uk-button-danger">X</a>');
		upButton = $('<a href="#" class="uk-button uk-button-small ">Up</a>');
		downButton = $('<a href="#" class="uk-button uk-button-small">Down</a>');
		controls = $('<div></div>').append(removeButton).append(upButton).append(downButton);
		removeButton.click(function(){
			$(this).parent().parent().remove();
		});
		upButton.click(function(event) {
			event.preventDefault();
			li = $(this).closest('li');
			li.insertBefore(li.prev());
			reIdSegments();
		});
		downButton.click(function(event) {
			event.preventDefault();
			li = $(this).closest('li');
			li.insertAfter(li.next());
			reIdSegments();
		});

		newComponent = $('<li class="nd-editor-c-html"><input type="hidden" name="editor['+i+'][type]" value="'+ctype+'" /></li>');
		newComponent.prepend(editArea);
		newComponent.prepend(controls);
		$(".nd-editor-components").append(newComponent);
		i++;
	}
	editor = $(".nd-editor");
	
	$(".nd-editor-add-html").click(function() {
		addComponent('html');
	});
	$(".nd-editor-add-video").click(function() {
		addComponent('video');
	});
	$(".nd-editor-add-image").click(function() {
		addComponent('image');
	});

	var slug = $("input[name=nd-editor-slug]").val();
	if(slug !="") {
		var url = ROOT_URL + 'admin/api/editor/'+slug;
		$.get(url, function(response) {
			console.log(response);
			$.each(response,function(key,component) {
				addComponent(component.type,component.value);
			});
	    });
	}

});