<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Detail Data - <?= $user['name'] ?></title>

		<link rel="stylesheet" href="./resources/css/style.css" />
	</head>
	<body>
		<h2>Detail Data - <?= $user['name'] ?></h2>
		<div class="form">
			<a class="button-36" style="margin-bottom: 24px;" href="index.php">Kembali ke Index</a>

			<p class="field">
				<label class="label">Nama Lengkap</label>
				<span class="text-input"><?= $user['name'] ?></span>
			</p>
			<p class="field half">
				<label class="label">NIM</label>
				<span class="text-input"><?= $user['nim'] ?></span>
			</p>
			<p class="field half">
				<label class="label">E-mail</label>
				<span class="text-input"><?= $user['email'] ?></span>
			</p>
			<p class="field">
				<label class="label">Alamat</label>
				<textarea class="textarea"><?= $user['address'] ?></textarea>
			</p>
		</div>
	</body>
</html>
