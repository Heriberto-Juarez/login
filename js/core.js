$(document).ready(function () {

	const login_form = $("#login_form");

	login_form.on("submit", function (e) {
		e.preventDefault();
		e.stopPropagation();
		const url = $(this).attr("action");
		const method = $(this).attr("method");
		const data = $(this).serializeArray();
		$.ajax({
			method: method,
			url: url,
			dataType: "json",
			data: data
		}).done(function (response) {
			$(".remove-on-response").remove();
			$.each(response, function (k, v) {
				$("#" + k).parents(".input-group").after(`<p class='remove-on-response mb-0 text-danger'>${v}</p>`);
			});
			anime({
				targets: '.remove-on-response',
				translateX: [-5, 5, -5, 5],
				easing: 'easeInOutQuad',
				direction: 'alternate',
				delay: 100,
				duration: 250
			});

			if(response.hasOwnProperty("redirect")) {
				window.location.href = response.redirect;
			}

		});
	});

	$.each(login_form.find("input"), function () {
		$(this).on("keyup", function () {
			$(this).parents(".input-group").next(".remove-on-response").slideUp(function () {
				$(this).remove();
			});
		});
	});

});
