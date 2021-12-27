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
