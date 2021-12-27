<script>
	$(document).ready(function () {

		var url = "<?= base_url() . 'user/course/display_lesson' ?>";

		data_display(url);

		$('.lesson-display').click(function () {
			var data_ = {
				'id': $(this).attr('data-id'),
			}
			data_display(url, data_);
			delay_lesson(10000);
		});
	});

	function data_display(url = '', data_ = '') {

		if (data_ == '') {
			var data_ = {
				'id': $('.lesson-display').attr('data-id').split(' ')[0],
			}
		}

		$.ajax({
			url: url,
			type: 'POST',
			data: data_,
			success: function (res) {
				$('#container-lesson').html(res);
			},
		});
	}

	function delay_lesson(time) {
		setTimeout(function () {
			var tm = $('div .course-details__curriculum-list-right').html();
			var actualTime = tm.split(':');
			var totalSeconds = (+actualTime[0]) * 60 * 60 + (+actualTime[1]) * 60 + (+actualTime[2]);
			$('.toma').html(totalSeconds*1000);
		}, time);
	}

</script>
