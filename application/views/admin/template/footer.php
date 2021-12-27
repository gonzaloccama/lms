<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

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

<!-- Select2 -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/select2/select2.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/select2.js"></script>

<!-- List.js -->
<script src="<?= $this->config->item('asset_url') ?>admin/vendor/list.min.js"></script>
<script src="<?= $this->config->item('asset_url') ?>admin/js/list.js"></script>

<script src="<?= $this->config->item('asset_url') ?>user/plugins/toasty/toasty.js"></script>

<script src="<?= $this->config->item('asset_url') ?>admin/js/customers.js"></script>

<?php
$this->load->view($info['script']);
?>

</body>

</html>

