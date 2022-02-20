jQuery(document).ready(function ($) {
	// Маска для телефона
	$('.js-phone').inputmask({
	"mask": "+7(999) 999-99-99"
	});
	$('.js-email').inputmask({
	"mask": "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]"
	}); // Кастомный select

	$('.js-select').styler({
	selectSearch: true,
	selectSearchLimit: 10
	});
	UIkit.util.on('#offcanvas', 'show', function () {
	$('.sidebar-menu-btn').addClass('is-open');
	});
	UIkit.util.on('#offcanvas', 'hide', function () {
	$('.sidebar-menu-btn').removeClass('is-open');
	});


	$('.banner_form').submit(function(){
		var bform = $(this);
		phone = document.getElementById('telephone').value;
		if (phone !== '')
		{
			$.ajax({
				type: "POST",
				url: "https://вашипотолки.рф/assets/mail_banner.php",
				data: {phone},
				success: function(json){
					if (json == 'ok') 
					{
						bform[0].reset();
						bform.find('input[name="phone"]').removeClass('border_red');
						UIkit.modal('#callback_ok').show();
					}
					else
					{
						bform.find('input[name="phone"]').addClass('border_red');
					}
				}
			});
		}
		else
		{
			bform.find('input[name="phone"]').addClass('border_red');
		}
	});

	$('.calculation_form').on('submit', function(){
		var bform = $('.calculation_form');
		phone = document.getElementById('phone').value;
		square = document.getElementById('square').value;
		perimeter = document.getElementById('perimeter').value;
		corner = document.getElementById('corner').value;
		luster = document.getElementById('luster').value;
		lamp = document.getElementById('lamp').value;
		pipe = document.getElementById('pipe').value;
		if (phone !== '')
		{
			$.ajax({
				type: "POST",
				url: "https://вашипотолки.рф/assets/mail_calculation.php",
				data: {phone, square, perimeter, corner, luster, lamp, pipe},
				success: function(json){
					if (json == 'ok')
					{
						bform[0].reset();
						bform.find('input[name="phone"]').removeClass('border_red');
						UIkit.modal('#callback_ok').show();
					}
					else
					{
						bform.find('input[name="phone"]').addClass('border_red');
					}
				}
			});
		}
		else
		{
			bform.find('input[name="phone"]').addClass('border_red');
		}
	});

	$('#callback_form').submit(function(){
		var bform = $(this);
		phone = document.getElementById('tel').value;
		email = document.getElementById('email').value;
		namee = document.getElementById('name').value;
		if (phone !== '')
		{
			$.ajax({
				type: "POST",
				url: "https://вашипотолки.рф/assets/mail_callback.php",
				data: {phone, email, namee},
				success: function(json){
					if (json == 'ok') 
					{
						bform[0].reset();
						bform.find('input[name="phone"]').removeClass('border_red');
						UIkit.modal('#callback_ok').show();
					}
					else
					{
						bform.find('input[name="phone"]').addClass('border_red');
					}
				}
			});
		}
		else
		{
			bform.find('input[name="phone"]').addClass('border_red');
		}
	});
});