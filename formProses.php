
<?php
include_once 'koneksi.php';

if (isset($_POST['submit'])) {
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$kls = $_POST['kls'];
	$jk = $_POST['jk'];
	$fakultas = $_POST['fakultas'];
	$prodi = $_POST['prodi'];
	$hobi = implode(", ", $_POST['hobi']);
	$alamat = $_POST['alamat'];

	$query = "INSERT INTO 'pendaftaran'('nim','nama','kls','jk','fakultas','prodi','hobi', 'alamat') 
			VALUES ('$nim','$nama','$kls','$jk','$fakultas','$prodi','$hobi','$alamat')";
	$query_success = mysqli_query($koneksi, $query);
	if ($query_success) {
		header('location: from.php');
	} else {
		echo "Gagal Bung";
	}

}
?>