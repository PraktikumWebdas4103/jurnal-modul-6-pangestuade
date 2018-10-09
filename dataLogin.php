
<?php
session_start();
$dataArray = array(
			array(
				"id"=>"1",
				"username"=>"ade",
				"password"=>"ade",
				"akses"=>"admin"	
			),
			array(
				"id"=>"2",
				"username"=>"pangestu",
				"password"=>"pangestu",
				"akses"=>"user"	
			),
			array(
				"id"=>"2",
				"username"=>"webdas",
				"password"=>"susah",
				"akses"=>"user"	
			)
		);
if (isset($_POST['login'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$a = 0;
	$data_valid = 0;
	while($a < count($dataArray)){
		if($username == $dataArray[$a]['username'] && $password == $dataArray[$a]['password'] ){
			$_SESSION['username'] = $username;
			$_SESSION['akses'] = $dataArray[$a]['akses'];
			$_SESSION['id'] = $dataArray[$a]['id'];
			$data_valid = 1;
		}
		$a++;
	}
	if ($data_valid < 1) {
		echo "Gagal login <br>";
	} else {
		header('location: from.php');
	}
}
?>