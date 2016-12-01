$(function() {
	$('.msg-name-ac').on('selectitem.uk.autocomplete', function(event, data,acobject){
	//alert(data.value+' '+data.id);
	//console.log(data);
	//	console.log(acobject);
console.log(event);
	puzzle = data.value.split('+');
//	console.log(puzzle);
		$('.msg-recipient-field').val(puzzle[0]);
		$('.msg-recipient-name').val(puzzle[1]);
	});
});