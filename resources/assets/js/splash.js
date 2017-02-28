$(function() {
	var animated =true;
	/* animates email field */
	var t;
	function starte() {
		var emails = ["jen@ntu.ac.uk      ","jack@nottingham.ac.uk      "];
		var i = 0;
		var j=0;
		function nextLetter() {
			buildstring = emails[i].substring(0,j) + "_";
			j++;
			if(j>emails[i].length) {
				i++;
				j=0;
			}
			if(i>=emails.length) {
				i=0;
			}
			$("#signUpInput").val(buildstring);
		}

		 t =setInterval(nextLetter,300);
	}

	function stope() {
		animated=false;
		clearInterval(t);
		$("#signUpInput").val("");
	}

	starte();
	$("#signUpInput").focus(function() {
		stope();
		$("#signUpInput").unbind("focus");
	});

	function isEmailValid() {
		var nv = $("#signUpInput").val();
		var split = nv.split("@");
		if(split[1]!==null) {
			var end = split[1];
			var valid = ["nottingham.ac.uk","ntu.ac.uk"];
			if(valid.indexOf(end) == -1) {
				return false;
			} else {
				return true;
			}
		}
	}

	function visualValidateEmail() {
		if(isEmailValid()) {
			$("#signUpInput").addClass("uk-form-success");
			$("#invalidUniMsg").hide();
			$("#signUpInput").removeClass("uk-form-danger");
		}
		else if($("#signUpInput").val() == "") {

		}
		else {
			$("#signUpInput").addClass("uk-form-danger");
			$("#invalidUniMsg").removeClass("uk-hidden");
			$("#invalidUniMsg").slideDown();
			$("#signUpInput").removeClass("uk-form-success");	
		}
	}

	/* validates email field */
	$("#signUpInput").change(function() {
		visualValidateEmail();	
	});

	$("#signUpForm").submit(function(e) {
		if(!animated) {
			visualValidateEmail();
			if(isEmailValid() ) {
				var modal = UIkit.modal("#signUpModal");
				if ( modal.isActive() ) {
				    modal.hide();
				} else {
				    modal.show();
				}	
				return true;
			}
		}
		e.preventDefault();
		stope();
		$("#signUpInput").focus();
	});


	if($("#nd-contact-sent").length) {
		UIkit.notify("Your message has been sent, thanks for getting in touch.  <br>We will reply ASAP!", {status:'success'})
	}

	function loadNews() {
		var url = "https://news.nextdegree.co.uk/wp-json/wp/v2/posts";
		//ROOT_URL+'testnews.json'
		$.get(url,function(data) {
			$.each(data,function(key,article) {
				//console.log(article['_embedded']['wp:featuredmedia'][0]);
				html = '<div class="uk-width-medium-1-4" >'+
						'	        <div class="uk-panel-box" >'+
						'		        <a href="'+article.link+'">'+
						'		        <div class="uk-panel-teaser">'+
						'		        	<img src="'+article['_embedded']['wp:featuredmedia'][0]['media_details']['sizes']['medium_large']['source_url']+'"/>'+
						'		        </div> '+
						'		        '+
						'		<h3>'+article.title.rendered+'</h3><p>'+article.excerpt.rendered+'</p>'+
						'		        	</a>'+
						'		        </div>';
				el = $(html);
				$(".nd-news").append(el);
			});
		})

	}
	loadNews();
});