<?php 
	include 'config/connect.php'
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Table Data</title>

		<link rel="stylesheet" href="./resources/css/style.css" />
	</head>

	<body>
		<h2>Responsive Table</h2>
		<div class="table-wrapper">
            <!-- HTML !-->
            <a class="button-36" href="index.php?action=create">Create +</a>
            
			<span style="margin: 24px 0 0 32px" >
				<label class="label" style=" color:white;">Keyword</label>
				<input type="text" name="keyword" id="keyword" style="margin-left:24px;" >
			</span>

			<!--<div class="data"></div>-->
			<table class="fl-table" style="margin-top: 16px;">
				<thead>
					<tr>
						<th>No.</th>
						<th>Name</th>
						<th>NIM</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($users as $user): ?>
					<tr>
						<td><?= $user["id"] ?></td>
						<td><?= $user["name"] ?></td>
						<td><?= $user["nim"] ?></td>
						<td><?= $user["email"] ?></td>
						<td><?= $user["address"] ?></td>
						<td>
							<a class="button-36" href="index.php?action=show&id=<?= $user['id']; ?>">Show</a>
							<a class="button-36" href="index.php?action=edit&id=<?= $user['id']; ?>">Edit</a>
							<a class="button-36" href="index.php?action=delete&id=<?= $user['id']; ?>" onclick="return checkDelete()">Hapus</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>

		<!-- Ajax logic, ini masih ngga bisa muncul live searchnya, tpi yg lainnya udh selese semua -->
		<script src="../js/jquery.min.js"></script>
		<script>
			function checkDelete(){
				return confirm('Are you sure?');
			}

			$(document).ready(function(){
				load_data();
				function load_data(keyword)
				{
					$.ajax({
						method:"POST",
						url:"data.php",
						data: {keyword:keyword},
						success:function(hasil)
						{
							$('.data').html(hasil);
						}
					});
				}
				$('#keyword').keyup(function(){
					var keyword = $("#keyword").val();
					load_data(keyword);
				});
				$('#keyword').change(function(){
					var keyword = $("#keyword").val();
					load_data(keyword);
				});
			});
		</script>
	</body>
</html>
