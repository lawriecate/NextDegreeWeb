$(function() {
	$(document).ready(function() {
	  $("time.htr").timeago();
	});

	$(".showAllSkills").click(function(e) {
		 e.preventDefault();
		$(".hiddenSkill").show();
		$(this).hide();
	});
});