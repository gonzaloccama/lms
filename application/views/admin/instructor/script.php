<?php defined('BASEPATH') or exit('No direct script access allowed');
if ($this->uri->segment(3) == 'add' || $this->uri->segment(3) == 'edit'):
	?>
	<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

	<script>

		CKEDITOR.replace('biography');

		// begin next prev
		$('.btnNext').click(function () {
			$('#next_back_header .active').parent().next('li').find('a').trigger('click');
		});

		$('.btnPrevious').click(function () {
			$('#next_back_header .active').parent().prev('li').find('a').trigger('click');
		});
		// end next prev
	</script>
	<script>
		$(document).on("click", ".browse", function () {
			var thumbnail = $(this).parents().find(".file");
			//console.log(thumbnail);
			thumbnail.trigger("click");
		});
		$('input[type="file"][name="user_image"]').change(function (e) {
			var fileName = e.target.files[0].name;
			$("#user_image").val(fileName);

			var reader = new FileReader();
			reader.onload = function (e) {
				// get loaded data and render thumbnail.
				document.getElementById("preview_thumbnail").src = e.target.result;
			};
			// read the image file as a data URL.
			reader.readAsDataURL(this.files[0]);
		});


	</script>
<?php
endif;
?>
<script>
	$(document).ready(() => {
		var base_url = "<?= base_url() ?>admin/response/instructor";
		get_contents('#content-all-instructor', base_url, get_data(), false);

		$(document).on('keyup', '#search_text', function () {
			get_contents('#content-all-instructor', base_url, get_data(), false);
		});

		$(document).on('click', "#searchBtn", function (event) {
			get_contents('#content-all-instructor', base_url, get_data(), false);
			event.preventDefault();
		});

		$('#entries').change('select', () => {
			get_contents('#content-all-instructor', base_url, get_data(), false);
		});

		$(document).on('click', ".pagination li a", function (event) {
			var page_url = $(this).attr('href');
			get_contents('#content-all-instructor', base_url, get_data(), page_url);
			event.preventDefault();
		});
	});

	//on off users
	$(document).ready(function () {
		$('#btn-affirm').click(function (event) {
			event.preventDefault();
			var lctn = $('#modal-affirm-action');

			var id = lctn.attr('data-id');
			var data = {
				'table': lctn.attr('data-field'),
				'affirm': lctn.attr('data-affirm'),
			};
			var url = "<?= base_url() ?>admin/response/update/" + id;
			update_contents(url, data);

			$(lctn).modal('hide');

			var base_url = "<?= base_url() ?>admin/response/instructor";
			get_contents('#content-all-instructor', base_url, get_data(), false);
		});
	});

	//remove - fields
	$(document).ready(function () {
		//remove fields
		$('#btn-remove').on('click', function () {
			var id = $('#myModalDelete').attr('data-id');
			var field = $('#myModalDelete').attr('data-field');

			var url = "<?= base_url() ?>author/requests/delete_" + field + "/" + id;
			remove_rows(url, id, '¡Se elimino exitosamente la ' + field + '!', '#' + field + '-');

			var base_url = "<?= base_url() ?>admin/response/instructor";
			get_contents('#content-all-instructor', base_url, get_data(), false);

		});
	});

	function get_data() {
		return {
			'limit': $('#entries').val(),
			'search_text': $("#search_text").val(),
			'res': "<?= $this->uri->segment(2) == 'instructor' ? 1 : 0 ?>"
		};
	}
</script>
