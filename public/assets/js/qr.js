$(document).ready(function () {
	// Get src QR Code
	let img = $('#qr-qode');

	$(document).ajaxStart(function () {
		img.addClass('d-none');
		$('#loading').removeClass('d-none');
	})

	$(document).ajaxStop(function () {
		$('#loading').addClass('d-none');
		img.removeClass('d-none');
	})
	
	// Load Qr
	function loadQR(content = null) {
		let url = img.data('href');
		let text = '';
		if (content === null) {
			text = 'Create Your code';
		} else {
			text = content;
		}
		$.ajax({
			url: url,
			type: 'POST',
			data: {content: text},
			dataType: 'json',
			success: function (result) {
				img.attr('src', result.url);
			},
			error: function (result) {
				alert(result.status);
			}
		})
	}

	loadQR();
	
	// Choose Input For
	$('.input-group .dropdown-menu li a').on('click', function (e) {
		e.preventDefault();
		let value = $(this).attr('href');
		$('input[name="data"]').val(value);
		$('input[name="data"]').focus();
	});

	// Generate data Qr Code
	$('.generate-code').on('submit', function (e) {
		e.preventDefault();
		let content = '';
		if ($('input[name="data"]').val() == '') {
			loadQR();
		} else {
			content = $('input[name="data"]').val();
			loadQR(content);
			$('input').val('');
		}
	});
})