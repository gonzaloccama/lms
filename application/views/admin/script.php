<script>
	$(document).ready(function () {
		//remove fields
		$('#btn-remove').on('click', function () {
			var id = $('#myModalDelete').attr('data-id');
			var field = $('#myModalDelete').attr('data-field');

			var url = "<?= base_url() ?>admin/category/delete_" + field + "/" + id;

			remove_rows(url, id, '¡Se elimino exitosamente la ' + field + '!', '#' + field + '-');
		});
	});

	$(document).ready(() => {
		// searched and display category
		var base_url = "<?= base_url() ?>admin/response/search";

		get_contents('#content-all-courses', base_url, get_data());

		$(document).on('keyup', '#search_text', function () {
			get_contents('#content-all-courses', base_url, get_data(), page_url = false);
		});

		$(document).on('click', ".pagination li a", function (event) {
			var page_url = $(this).attr('href');
			get_contents('#content-all-courses', base_url, get_data(), page_url);
			event.preventDefault();
		});

		function get_data() {
			return {
				'search_text': $("#search_text").val(),
			};
		}
	});


</script>

<?php
if ($this->uri->segment(3) == 'edit' || $this->uri->segment(3) == 'add'):
	?>
	<script>
		$(document).on("click", ".browse", function () {
			var thumbnail = $(this).parents().find(".file");
			//console.log(thumbnail);
			thumbnail.trigger("click");
		});
		$('input[type="file"][name="thumbnail"]').change(function (e) {
			var fileName = e.target.files[0].name;
			$("#thumbnail").val(fileName);

			var reader = new FileReader();
			reader.onload = function (e) {
				// get loaded data and render thumbnail.
				document.getElementById("preview_thumbnail").src = e.target.result;
			};
			// read the image file as a data URL.
			reader.readAsDataURL(this.files[0]);
		});

		$(document).ready(() => {
			$('#parent').change('select', () => {
				var singleValues = $("#parent").val();
				if (singleValues) {
					$('#category-imagen').hide();
				} else {
					$('#category-imagen').show();
				}
			});
		});

	</script>
<?php
endif;
?>
