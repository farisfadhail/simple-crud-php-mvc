<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Edit Data - <?= $user['name'] ?></title>

		<link rel="stylesheet" href="./resources/css/style.css" />
	</head>
	<body>
		<h2>Edit Data - <?= $user['name'] ?></h2>
		<form action="index.php?action=update&id=<?= $user['id']; ?>" class="form" method="post">
			<a class="button-36" style="margin-bottom: 24px;" href="index.php">Kembali ke Index</a>

			<p class="field required">
				<label class="label required" for="name">Nama Lengkap</label>
				<input class="text-input" id="name" name="name" required type="text" value="<?= $user['name']; ?>" />
			</p>
			<p class="field required half">
				<label class="label" for="nim">NIM</label>
				<input class="text-input" id="nim" name="nim" required type="text" value="<?= $user['nim']; ?>" />
			</p>
			<p class="field required half">
				<label class="label" for="email">E-mail</label>
				<input class="text-input" id="email" name="email" required type="email" value="<?= $user['email']; ?>" />
			</p>
			<p class="field required">
				<label class="label required" for="address">Alamat</label>
				<textarea class="text-input" id="address" name="address" required><?= $user['address']; ?></textarea>
			</p>
			<p class="field half">
				<input class="button" type="submit" value="Send" />
			</p>
		</form>
	</body>
</html>
