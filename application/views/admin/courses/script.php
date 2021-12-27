<script>
	$(document).ready(() => {

		var base_url = "<?= base_url() ?>author/requests/search";

		get_contents('#content-all-courses', base_url, get_data());

		$(document).on('keyup', '#search_text', function () {
			get_contents('#content-all-courses', base_url, get_data(), false);
		});

		$(document).on('click', "#searchBtn", function (event) {
			get_contents('#content-all-courses', base_url, get_data(), false);
			event.preventDefault();
		});

		$(document).on('click', ".pagination li a", function (event) {
			var page_url = $(this).attr('href');
			get_contents('#content-all-courses', base_url, get_data(), page_url);
			event.preventDefault();
		});
	});

	function get_data() {
		return {
			'category': $('#custom-select').val(),
			'status': $('#actived01').val(),
			'search_text': $("#search_text").val(),
			'admin': "<?= $this->uri->segment(1) ?>",
		};
	}

	//remove - fields
	$(document).ready(function () {
		//remove fields
		$('#btn-remove').on('click', function () {
			var id = $('#myModalDelete').attr('data-id');
			var field = $('#myModalDelete').attr('data-field');

			var url = "<?= base_url() ?>author/requests/delete_" + field + "/" + id;
			remove_rows(url, id, '¡Se elimino exitosamente la ' + field + '!', '#' + field + '-');

			if (field == 'course') {
				var data = {
					'user_id': 0,
					'admin': "<?= $this->uri->segment(1) ?>",
				};

				var base_url = "<?= base_url() ?>author/requests/search";
				get_contents('#content-all-courses', base_url, data);
			}

		});
	});

	//on off course
	$(document).ready(() => {
		$('#btn-affirm').click(() => {
			var id = $('#modal-affirm-action').attr('data-id');
			var data = {
				'table': $('#modal-affirm-action').attr('data-field'),
				'affirm': $('#modal-affirm-action').attr('data-affirm'),
			};
			var url = "<?= base_url() ?>admin/response/update/" + id;
			update_contents(url, data);

			$('#modal-affirm-action').modal('hide');

			var base_url = "<?= base_url() ?>author/requests/search";
			get_contents('#content-all-courses', base_url, get_data());

		});
	});

</script>

<script>
	$(document).ready(() => {
		$('#custom-select').change('select', () => {
			var base_url = "<?= base_url() ?>author/requests/search";
			var data = {
				'category': $('#custom-select').val(),
				'admin': "<?= $this->uri->segment(1) ?>",
			};
			get_contents('#content-all-courses', base_url, data, false);
		});

		$('#actived01').change('select', () => {
			var base_url = "<?= base_url() ?>author/requests/search";
			var data = {
				'status': $('#actived01').val(),
				'admin': "<?= $this->uri->segment(1) ?>",
			};
			get_contents('#content-all-courses', base_url, data, false);
		});
	});


</script>
