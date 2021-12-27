<object
	data="https://example.com/test.pdf#page=2"
	type="application/pdf"
	width="100%"
	height="550">
	<iframe
		src="<?= base_url().$lesson[0]->attachment ?>#page=1"
		width="100%"
		height="550"
		style="border: none;">
		<p>Your browser does not support PDFs.
			<a href="<?= base_url().$lesson[0]->attachment ?>">Download the PDF</a>.</p>
	</iframe>
</object>
