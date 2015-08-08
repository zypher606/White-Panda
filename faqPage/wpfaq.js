$(document).ready(function(){
				$(".faq dd").hide();
				$(".faq dt").click(function () {
					$(this).next(".faq dd").slideToggle("slow");
					$(this).toggleClass("expanded");
				});
			});
