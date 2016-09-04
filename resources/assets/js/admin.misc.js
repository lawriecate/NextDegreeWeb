$(function() {
	$(".confirmDelete").submit(function(e) {
		if(!confirm("Are you sure you want to delete this?")) {
			
		}

		UIkit.modal.confirm("Are you sure you want to delete this?", function(){
		    return true;
		}, function() {
			e.preventDefault();
			return false;
		});
	});

	function toSlug(text)
	{
	  return text.toString().toLowerCase()
	    .replace(/\s+/g, '-')           // Replace spaces with -
	    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
	    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
	    .replace(/^-+/, '')             // Trim - from start of text
	    .replace(/-+$/, '');            // Trim - from end of text
	}

	$(".titleToSlug").change(function() {
		var slug_field= $("[name=slug]");
		if(slug_field.val()=="") {
			var new_slug = toSlug($(".titleToSlug").val());
			slug_field.val(new_slug);
		}
	});

	$(".checkSlug").change(function() {
		$.post(ROOT_URL + 'admin/post/check-slug',{ "_token": $('[name="csrf_token"]').attr('content'), 'slug': $(this).val() })
		.done(function(isSlugFree) {
			//console.log(isSlugFree);
			if(isSlugFree) {
				$(".checkSlug").removeClass("uk-form-danger");
				$(".checkSlug").addClass("uk-form-success");
			} 
			else {
				$(".checkSlug").addClass("uk-form-danger");
				$(".checkSlug").removeClass("uk-form-success");
			}
		});
	});

	function checkPublicationStatus() {
		var valueSelected = $("#publicationStatus option:selected").val();

		if(valueSelected == "publish") {
			$("[name=publish_date]").prop('disabled', false);
			$("[name=publish_time]").prop('disabled', false);
		} else {
			$("[name=publish_date]").prop('disabled', true);
			$("[name=publish_time]").prop('disabled', true);
		}
	}
	checkPublicationStatus();
	$("#publicationStatus").on('change', function (e) {
		checkPublicationStatus();
	});
});