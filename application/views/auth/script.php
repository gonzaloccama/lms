<script>
	$(document).ready(function () {
		$('#form_login').submit(function (e) {
			e.preventDefault();

			data_ = $(this).serialize();
			url = "<?= base_url() ?>auth/login/validate";

			form_validation(url, data_, false, 'Iniciar sesión');
		});

		$('#form_register').submit(function (e) {
			e.preventDefault();

			data_ = $(this).serialize();
			url = "<?= base_url() ?>auth/register/validate";

			form_validation(url, data_, true, 'Registrar');
		});

		$('#password_v').keyup(function () {
			var password = $('#password_c').val();
			var psswrd = $(this).val();
			if (psswrd != password) {
				$("#password_val > div").html('Las contraseñas no coinciden.');
				$("#password_val > input").addClass('is-invalid');
			} else {
				$("#password_val > input").removeClass("is-invalid");
			}

		});
	});

	function form_validation(url, data_, is_reg, txt) {
		if (is_reg) {
			$("#dni > div > input").removeClass("is-invalid");
			$("#name > input").removeClass("is-invalid");
			$("#first_parent > input").removeClass("is-invalid");
			$("#last_parent > input").removeClass("is-invalid");
			$("#password_val > input").removeClass("is-invalid");
		}
		$("#email > input").removeClass("is-invalid");
		$("#password > input").removeClass("is-invalid");

		disabled_btn_(true, 'Cargando...');

		$.ajax({
			url: url,
			type: 'POST',
			data: data_,
			success: function (data) {
				data = JSON.parse(data);
				console.log(data);

				window.location.replace(data.url);
			},

			statusCode: {

				400: function (xhr) {
					var json = JSON.parse(xhr.responseText);
					disabled_btn_(false, txt);

					if (is_reg) {
						if (json.dni.length) {
							$("#dni .invalid-feedback").html(json.dni);
							$("#dni > div > input").addClass('is-invalid');
						}
						if (json.name.length) {
							$("#name .invalid-feedback").html(json.name);
							$("#name > input").addClass('is-invalid');
						}
						if (json.first_parent.length) {
							$("#first_parent .invalid-feedback").html(json.first_parent);
							$("#first_parent > input").addClass('is-invalid');
						}
						if (json.last_parent.length) {
							$("#last_parent .invalid-feedback").html(json.last_parent);
							$("#last_parent > input").addClass('is-invalid');
						}
						if (json.password_v.length) {
							$("#password_val .invalid-feedback").html(json.password_v);
							$("#password_val > input").addClass('is-invalid');
						}
					}

					if (json.email.length) {
						$("#email .invalid-feedback").html(json.email);
						$("#email > input").addClass('is-invalid');
					}

					if (json.password.length) {
						$("#password .invalid-feedback").html(json.password);
						$("#password > input").addClass('is-invalid');
					}
				},
				401: function (xhr) {
					disabled_btn_(false, txt);

					var json = JSON.parse(xhr.responseText);
					notification_toast(json.msg, 'error');
				},
				402: function (xhr) {
					disabled_btn_(false, txt);

					var json = JSON.parse(xhr.responseText);
					$("#password_val > div").html(json.msg);
					$("#password_val > input").addClass('is-invalid');
					notification_toast(json.msg, 'error');
				}
			}
		});
	}




</script>
