if ("undefined" == typeof(jQuery)) {
	alert("Zero Cool Need jQuery");
	console.error("Zero Cool Need jQuery");
}
$(function() {
	$("#toggle-button").click(function() {
		$(".collapse").slideToggle(200, function() {
			$(this).toggleClass("in");
		})
	});


	$("a[rel='page-scroll']").click(function(e) {
		var $anchor = $(this);
		$('html, body').stop().animate({
			scrollTop : ($($anchor.attr("href")).offset().top) - $(".navbar").height() - 30
		},800);
		e.preventDefault();
	});
})

$.fn.zeroSlide = function(arrayImage, interval) {
	var selector = $(".cover");
	var x = arrayImage;
	selector.css({"background-image" : "url(" + x[0] + ")"});
	var i = 0;
	var css;
	setInterval(function() {
		selector.css({"background-image" : "url(" + x[i] + ")"});
		i = i+1;
		if (i >= x.length) {
			i = eval(0);
		}
	}, interval);	
}

// ZERO MODAL
$.zeroModal = function(show, option) {
	var selector = $(".zero-modal");
	var bg = option.bg || null;
	var title = option.title || 'Zero Modal'

	selector.css({"background-image" : "url('" + bg + "')"});
	selector.find(".title").text(title);

	if (show == 'show') {
		selector.show('normal');
	}
	if (show == 'close') {
		selector.hide('normal');
	}

	$(".close-modal").click(function() {
		selector.hide('normal');
	});
}
// WINDOW SCROLLING
$(window).scroll(function() {
	var opacity = ($(".cover").height() - $(this).scrollTop()) / 100;
	if (opacity < 0) {
		opacity = 0;
	}
	if (opacity <= 1) {
		$(".navbar-default").addClass("hide-cover");
		$(".nav").addClass("collapse-cover");
	}
	else {
		$(".navbar-default").removeClass("hide-cover");
	}
	$(".cover").css({opacity : opacity})
});

$.fn.zeroAnimate = function(classElement) {
	var element = $(this);
	var $scroll = $(this).offset().top;
	element.addClass("fadeout");

	$(window).scroll(function() {
		if ($(this).scrollTop() >= $scroll-600) {
			element.removeClass("fadeout");
			element.addClass(classElement);
		}
		else {
			element.removeClass(classElement);
			element.addClass("fadeout");
		}
	});
}

$.zeroLoading = function(type) {
	$("body").hide();
	var element = "";
	var classnya = "";
	if (type=="circle-dragon") {
		element = "<div class=\"circle-loading\"><center><div></div><div></div><div></div><div></div></center></div>";
		classnya = ".circle-loading";
	}
	if (type == "circle-simple") {
		element = "<div class=\"circle-simple\">Loading</div>";
		classnya = ".circle-simple";
	}
	$("html").append(element)

	window.onload = function() {
		$(classnya).delay(3000).fadeOut(300, function() {
			$("a[rel='page-scroll']").removeClass("active");
			$("a[rel='page-scroll']").eq(0).addClass("active");
			$("body").fadeIn(200);
		})
	}
}


// ACTIVE MENU
var pos;
$(window).bind('scroll',function(event){
	clearInterval(timeout);
	var timeout = setTimeout(function(){
		pos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;
		activateNav(pos);
	},50);
}).trigger('scroll');


//activate current nav element
function activateNav(pos){
	var offset = 300;
	// $(window).unbind('hashchange', hashchange);
	$(".content").each(function(doc) {
		var contentPos = eval($(this).offset().top) - 100;
		if (contentPos <= pos + offset) {
			var id = $(this).attr("id");
			$("a[rel='page-scroll']").removeClass("active");
			$("a[rel='page-scroll'][href='#" + id + "']").addClass("active");
		}
	})
}


// KLIK ON GALLERY
$(function() {
	$(".gallery-link").click(function(e) {
		var img = $(this).find("img").attr("src");
		var title = $(this).find(".caption-content").text();

		$.zeroModal('show', {bg : img, title : title});
		e.preventDefault();
	})
})
