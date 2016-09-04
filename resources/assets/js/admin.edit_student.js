$(function() {
	
	$("#ndAdminUserAddStudentProfile").click(function() {
		
		var modal = UIkit.modal("#nd-select-institution-modal");

		if ( modal.isActive() ) {
		    modal.hide();
		} else {
		    modal.show();
		}
	});

	/*UIkit.autocomplete($('#nd-select-institution-modal-autocomplete'), {
	      source: ROOT_URL + 'admin/api/institution'
	}).on('selectitem.uk.autocomplete', function (e, data, ac) {
		$("#nd-select-institution-modal-field").val(data.value);

	 });
*/
	$("#nd-select-institution-modal-add-button").click(function() {
		var id = $("#nd-select-institution-modal-field").val();
		if(id=="") {
			UIkit.notify("Please select a university");
		} 
		else
		{
			$.post(ROOT_URL+"admin/api/profile/resetStudentProfile",{  'institution_id': id, 'user_id': $("#nd-user-id").val() })
		.done(function(response) {
			if(response.status=="success") {
				$("#nd-user-institution-name").text(response.institution_name);
				modal = UIkit.modal("#nd-select-institution-modal");

				if ( modal.isActive() ) {
				    modal.hide();
				} 
			}
		});
		}
	});

});