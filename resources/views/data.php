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
        <?php
            include 'config/connect.php';
            $keyword="";
            if (isset($_POST['keyword'])) {
                $keyword = $_POST['keyword'];
            }
            
            $search_keyword = '%'. $keyword .'%';
            $no = 1;
            $query = "SELECT * FROM users WHERE (name LIKE ? OR nim LIKE ? OR email LIKE ? OR address LIKE ?) ORDER BY id DESC LIMIT 100";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('ssss', $search_keyword, $search_keyword, $search_keyword, $search_keyword);
            $stmt->execute();
            $result = $stmt->get_result();
 
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    //$id = $row['id'];
                    $name = $row['name'];
                    $nim = $row['nim'];
                    $email = $row['email'];
                    $address = $row['address'];
        ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $name; ?></td>
                <td><?= $nim; ?></td>
                <td><?= $email; ?></td>
                <td><?= $address; ?></td>
                <td>
                    <a class="button-36" href="index.php?action=show&id=<?= $user['id']; ?>">Show</a>
                    <a class="button-36" href="index.php?action=edit&id=<?= $user['id']; ?>">Edit</a>
                    <a class="button-36" href="index.php?action=delete&id=<?= $user['id']; ?>" onclick="return checkDelete()">Hapus</a>
                </td>
            </tr>
        <?php } } else { ?> 
            <tr>
                <td colspan='6'>Tidak ada data ditemukan</td>
            </tr>
        <?php } ?>
    </tbody>
</table>