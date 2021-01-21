<!-- App Settings FAB -->
<div id="app-settings">
	<app-settings layout-active="default" :layout-location="{
      'default': 'admin-dashboard.html',
      'fixed': 'fixed-admin-dashboard.html',
      'fluid': 'fluid-admin-dashboard.html',
      'mini': 'mini-admin-dashboard.html'
    }"></app-settings>
</div>

<!-- jQuery -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/popper.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/bootstrap.min.js"></script>

<!-- Perfect Scrollbar -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/perfect-scrollbar.min.js"></script>

<!-- DOM Factory -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/dom-factory.js"></script>

<!-- MDK -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/material-design-kit.js"></script>

<!-- Range Slider -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/ion.rangeSlider.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/ion-rangeslider.js"></script>

<!-- App -->
<script src="<?= $this->config->item('asset_url') ?>admin/js/toggle-check-all.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/check-selected-row.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/dropdown.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/sidebar-mini.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/app.js"></script>

<!-- App Settings (safe to remove) -->
<script src="<?= $this->config->item('asset_url') ?>admin/js/app-settings.js"></script>


<!-- Flatpickr -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/flatpickr/flatpickr.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/flatpickr.js"></script>

<!-- Global Settings -->
<script src="<?= $this->config->item('asset_url') ?>admin/js/settings.js"></script>


<!-- Chart Samples -->
<script src="<?= $this->config->item('asset_url') ?>admin/js/page.admin-dashboard.js"></script>

<!-- Vector Maps -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/vector-maps.js"></script>

<!-- Select2 -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/select2/select2.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/select2.js"></script>



<!-- ckeditor -->

<script src="//cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>


<script>
	CKEDITOR.replace('description');

	// begin copy value select to input
	$(function(){
		$(document).on('change','#sub_category_i',function(){ //detectamos el evento change
			var value = $(this).val();//sacamos el valor del select
			$('#category_i').val(value);//le agregamos el valor al input (notese que el input debe tener un ID para que le caiga el valor)
		});
	});
	// end copy value select to input
</script>

<script>
	$(document).on("click", ".browse", function () {
		var file = $(this).parents().find(".file");
		file.trigger("click");
	});
	$('input[type="file"]').change(function (e) {
		var fileName = e.target.files[0].name;
		$("#file").val(fileName);

		var reader = new FileReader();
		reader.onload = function (e) {
			// get loaded data and render thumbnail.
			document.getElementById("preview").src = e.target.result;
		};
		// read the image file as a data URL.
		reader.readAsDataURL(this.files[0]);
	});


</script>

<script>
	//begin on hidden price course
	function showContent() {
		element = document.getElementById("content_free");
		check = document.getElementById("is_free_course");
		if (check.checked) {
			element.style.display = 'none';
		} else {
			element.style.display = 'block';
		}
	}

	//end on hidden price course

	//outcomes
	$(document).ready(function () {
		var max_fields = 10;
		var wrapper = $(".add-outcomes");
		var add_button = $(".add_form_outcomes");

		var x = 1;
		$(add_button).click(function (e) {
			e.preventDefault();
			if (x < max_fields) {
				x++;
				$(wrapper).append(`	<div class="input-group form-group">
									<input type="text" id="outcomes" name="outcomes[]" class="form-control" placeholder="Agrega resultados">&ensp;&ensp;

									<a href="#" class="btn btn-outline-danger btn-rounded delete_outcomes"><i class="fas fa-minus"></i></a>

								</div>`);

			} else {
				alert('!!')
			}
		});

		$(wrapper).on("click", ".delete_outcomes", function (e) {
			e.preventDefault();
			$(this).parent('div').remove();
			x--;
		})
	});

	//requirements
	$(document).ready(function () {
		var max_fields = 10;
		var wrapper = $(".add-requirements");
		var add_button = $(".add_form_requirements");

		var x = 1;
		$(add_button).click(function (e) {
			e.preventDefault();
			if (x < max_fields) {
				x++;
				$(wrapper).append(`	<div class="form-group input-group">
									<input type="text" id="requirements" name="requirements[]" class="form-control" placeholder="Agrega requerimiento">&ensp;&ensp;

									<a href="#" class="btn btn-outline-danger btn-rounded delete_requirements"><i class="fas fa-minus"></i></a>

								</div>`);

			} else {
				alert('!!')
			}
		});

		$(wrapper).on("click", ".delete_requirements", function (e) {
			e.preventDefault();
			$(this).parent('div').remove();
			x--;
		})
	});

</script>

</body>

</html>

