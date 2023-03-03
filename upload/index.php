<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Upload nhiều ảnh xem trước và thanh tiến trình</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<div class="box-upload">
		<div class="logo">
			<img src="logo.png" width = "100%">
		</div>
		<form action="upload.php" method="POST" enctype="multipart/form-data" id="formUpload" onsubmit="return false;">
			<div class="progress">
				<div class="progress-bar">0%</div>
			</div>
			<div class="custom-file mb-3">
				<input type="file" class="custom-file-input" name="img_file[]" multiple="true" onchange="previewImg(event);" id="img_file" accept="image/*">
				<label class="custom-file-label" for="customFile">Choose file</label>
			</div>
			<div class="box-preview-img"></div>
			<button type="reset" class="btn btn-reset">Làm mới</button>
			<button type="submit" class="btn btn-submit">Upload</button>
			<div class="output"></div>
		</form>
	</div>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery.form.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>