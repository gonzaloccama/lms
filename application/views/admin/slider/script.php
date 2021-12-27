<script>
	$(document).ready(() => {
		var base_url = "<?= base_url() ?>admin/response/slider";
		get_contents('#content-all-slider', base_url, get_data(), false);

		$(document).on('keyup', '#search_text', function () {
			get_contents('#content-all-slider', base_url, get_data(), false);
		});

		$(document).on('click', "#searchBtn", function (event) {
			get_contents('#content-all-slider', base_url, get_data(), false);
			event.preventDefault();
		});

		$('#entries').change('select', () => {
			get_contents('#content-all-slider', base_url, get_data(), false);
		});

		$(document).on('click', ".pagination li a", function (event) {
			var page_url = $(this).attr('href');
			get_contents('#content-all-slider', base_url, get_data(), page_url);
			event.preventDefault();
		});
	});

	function get_data() {
		return {
			'limit': $('#entries').val(),
			'search_text': $("#search_text").val(),
			'res': "<?= $this->uri->segment(2) == 'instructor' ? 1 : 0 ?>"
		};
	}

	$(document).on("click", ".browse", function () {
		var thumbnail = $(this).parents().find(".file");
		//console.log(thumbnail);
		thumbnail.trigger("click");
	});
	$('input[type="file"][name="slide_img"]').change(function (e) {
		var fileName = e.target.files[0].name;
		$("#slide_img").val(fileName);

		var reader = new FileReader();
		reader.onload = function (e) {
			// get loaded data and render thumbnail.
			document.getElementById("preview_thumbnail").src = e.target.result;
		};
		// read the image file as a data URL.
		reader.readAsDataURL(this.files[0]);
	});
</script>
