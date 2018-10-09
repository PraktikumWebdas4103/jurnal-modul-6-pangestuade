<html>
<body>
	<center >
		<h1>Form Pendaftaran</h1>
		<table>
			<form action="formProses.php" method="POST">
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><input type="text" name="nim" required></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="nama" required></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td><input type="radio" name="kls" value="D3MI-41-01">D3MI-41-01
						<input type="radio" name="kls" value="D3MI-41-02">D3MI-41-02
					<input type="radio" name="kls" value="D3MI-41-03">D3MI-41-03
				<input type="radio" name="kls" value="D3MI-41-04">D3MI-41-04</td>
				</tr>
				
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><input type="radio" name="jk" value="Laki-laki">Laki-laki
						<input type="radio" name="jk" value="Perempuan">Perempuan</td>
				</tr>
				<tr>
					<td>Fakultas</td>
					<td>:</td>
					<td><select name="fakultas">
							<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
							<option value="Fakultas Industri Kreatif">Fakultas Industri Kreatif</option>
							<option value="Fakultas Komunikasi Bisnis">Fakultas Komunikasi Bisnis</option>
							<option value="Fakultas Ekonomi Bisnis">Fakultas Ekonomi Bisnis</option>
							<option value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri</option>
							<option value="Fakultas Informatika">Fakultas Informatika</option>
							<option value="Fakultas Teknik Elektro">Fakultas Teknik Elektro</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Program Studi</td>
					<td>:</td>
					<td><select name="prodi">
							<option value="D3 Manajemen Informatika">D3 Manajemen Informatika</option>
							<option value="D3 Teknik Komputer">D3 Teknik Komputer</option>
							<option value="D3 Teknik Informatika">D3 Teknik Informatika</option>
							<option value="D3 Teknik Telekomunikasi">D3 Teknik Telekomunikasi</option>
							<option value="D3 Komputerisasi Akuntansi">D3 Komputerisasi Akuntansi</option>
							<option value="D3 Perhotelan">D3 Perhotelan</option>
							<option value="D4 Sistem Multimedia">D3 Sistem Multimedia</option>
							<option value="S1 Akutansi">S1 Akutansi</option>
							<option value="S1 MBTI">S1 MBTI</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Hobi</td>
					<td>:</td>
					<td><input type="checkbox" name="hobi[]" value="Kayang">Kayang
					<input type="checkbox" name="hobi[]" value="Salto">Salto
					<input type="checkbox" name="hobi[]" value="Belajar">Belajar<br>
					<input type="checkbox" name="hobi[]" value="Koding">Koding
					<input type="checkbox" name="hobi[]" value="Tidur">Tidur
					<input type="checkbox" name="hobi[]" value="Push Up">Push Up</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><input type="textarea" name="alamat"></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="submit" name="submit" value="Kirim"></td>
				</tr>
			</form>
	</table>
	<br>
	<br>
	<br>
	<?php
	include 'koneksi.php';
	if (isset($_POST['submit'])) {
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$kls = $_POST['kls'];
		
		$jk = $_POST['jk'];
		$fakultas = $_POST['fakultas'];
		$prodi = $_POST['prodi'];
		$hobi = $_POST['hobi'];
		$alamat = $_POST['alamat'];

		if (strlen($nim) != 10 && strlen($nama) > 35 ) {
			echo "Nim harus 10 karakter atau Nama harus huruf dengan maksimal 35 karakter";
		}else if(strlen($nim) == 10 && strlen($nama) < 35){
			$dataArray ="INSERT INTO 'pendaftaran'('nim', 'nama','kls', 'jk', 'fakultas', 'prodi', 'hobi','alamat') 
			VALUES ('$nim','$nama','$kls','$jk','$fakultas','$prodi','$hobi','$alamat')";
			if (mysqli_query($koneksi,$dataArray)) {
			echo "Database berhasil masuk";
			}else{
			echo "gagal";
			}
		}
	}
?>
<?php 
include_once 'koneksi.php'; 
?>
<!DOCTYPE html>
<html>
	<body>
		<center>
			<h2>Data Masuk</h2>
			<table border="1">
			<tr>
				<th>NIM</th>
				<th>Nama</th>
				<th>Kelas</th>

				<th>Jenis Kelamin</th>
				<th>Fakultas</th>
				<th>Program Studi</th>
				<th>Hobi</th>
				<th>Alamat</th>
			</tr>
<?php 
	$query = "SELECT * FROM pendaftaran";
	$query_result = mysqli_query($koneksi, $query);
	while ($array = mysqli_fetch_array($query_result)) {
?>
		<tr>
			<td><?php echo $array['nim']; ?></td>
			<td><?php echo $array['nama']; ?></td>
			<td><?php echo $array['kls']; ?></td>
			<td><?php echo $array['jk']; ?></td>
			<td><?php echo $array['fakultas']; ?></td>
			<td><?php echo $array['prodi']; ?></td>
			<td><?php echo $array['hobi']; ?></td>
			<td><?php echo $array['alamat']; ?></td>
			<td></td>
		</tr>
<?php 
	}
?>
		</table>
	</body>
</html>
</body>