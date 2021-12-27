//get data - display
function get_contents(location, base_url = '', data = 0, page_url = false) {

	if (!page_url) {
		var page_url = base_url;
	}

	$.ajax({
		url: page_url,
		method: 'POST',
		data: data,
		success: function (res) {
			$(location).html(res);
		},
		error: function () {

		},
	});
}

function update_contents(page_url, data)
{
	$.ajax({
		url: page_url,
		method: 'POST',
		data: data,
		success: function (res) {
			//not_action('¡Se cambio el estado del curso exitosamente!','success');
			notification_toast('¡Se cambio el estado del curso exitosamente!', 'success')
		},
		error: function () {

		},
	});
}

//function remove fields
function remove_rows(url, id, mssg, remove_field) {
	$.ajax({
		url: url,
		type: "POST",
		data: {id: id},
		dataType: 'json',
		success: function (data) {
			//not_action(mssg, 'success');
			notification_toast(mssg, 'success')
			$(remove_field + id).remove();
			$('#myModalDelete').modal('hide');
		},
		error: function () {
			//not_action('¡Error!', 'danger');
			notification_toast(mssg, 'erro')
			$('#myModalDelete').modal('hide');
		}
	});
}

//view notification
function not_action(mssg, clr) {
	$('#noti-action').html(`
					<div class="alert alert-dismissible bg-${clr} text-white border-0 fade show" role="alert">
						<button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong><i class="fas fa-exclamation-circle"></i> Aviso -
						</strong> ${mssg}
					</div>
					`);
}

//add form with button
function form_button(wrapper_ = '', name = '', i = 0, txt = '') {
	$(wrapper_).append(`
		<div class="input-group mb-3 form-group">
			<input type="text" class="form-control" id="${name}-${i}" name="${name}[]" placeholder="${txt}" aria-label="${txt}" aria-describedby="basic-addon2">
			<div class="input-group-append">
				<button class="btn btn-outline-danger delete_${name}" type="button"><i class="fas fa-minus"></i></button>
			</div>
		</div>
`);
}

function notification_toast(mssg, type_mssg) {
	var options = {
		autoClose: true,
		progressBar: true,
	};

	var toast = new Toasty(options);
	toast.configure(options);

	let html_ = `
		<div class="row align-items-center">
			<span class="fas fa-exclamation-circle text-center fa-2x col-sm-2"></span>
			<span class="align-items-center col-sm-10">${mssg}</span>
		</div>
		`;

	switch (type_mssg) {
		case 'error':
			toast.error(html_);
			break;
		case 'success':
			toast.success(html_);
			break;
		case 'info':
			toast.info(html_);
			break;
		case 'warning':
			toast.warning(html_);
			break;
	}

}

function disabled_btn_ (disabled, txt) {
	if (disabled){
		$('.btn-loader').html(
			`<span class="spinner-grow spinner-grow-sm mr-2"></span>
					${txt}`
		).prop('disabled', disabled);
	}else {
		$('.btn-loader').html(
			`${txt}`
		).prop('disabled', false);
	}

}
