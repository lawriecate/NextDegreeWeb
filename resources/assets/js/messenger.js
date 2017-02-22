$(function() {
	validSelection =false;
	
	function showNewMsgBox() {
		if(validSelection==false) {

			$(".msg-enter-box-new").slideDown();
			validSelection=true;
			$("#msgTextarea").focus();
		}
	}
	if($('.msg-recipient-field').val() !="") {
		showNewMsgBox()
	}
	$('.msg-name-ac').on('selectitem.uk.autocomplete', function(event, data,acobject){

	puzzle = data.value.split('+');

		$('.msg-recipient-field').val(puzzle[0]);
		$('.msg-recipient-name').val(puzzle[1]);
		showNewMsgBox();
	});

	$('.new-msg-form').submit(function(e) {
		if(validSelection) {
			$.post($('#newMsgForm').attr('action'),$('#newMsgForm').serialize(),function(r) {
				if(r.result == "sent") {
					window.location=r.threadUrl;
				}
			});
		} else {
			$('.msg-recipient-name').addClass("uk-form-danger");
		}
		e.preventDefault();
	});

});