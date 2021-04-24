<?php

	// Content Type JSON
	header("Content-type: application/json");

	// Veri tabanı bağlantısı
	$conn = new mysqli("localhost", "root", "", "film_vue");
	if ($conn->connect_error) {
		die("Database connection failed!");
	}
	$res = array('error' => false);


	// Veri tabanındaki verileri çekiyoruz.
	$action = 'read';

	if (isset($_GET['action'])) {
		$action = $_GET['action'];
	}

	if ($action == 'read') {
		$result = $conn->query("SELECT * FROM `filmler`");
		$filmler  = array();

		while ($row = $result->fetch_assoc()) {
			array_push($filmler, $row);
		}
		$res['filmler'] = $filmler;
	}


	// Veri tabanına veri ekliyoruz.
	if ($action == 'create') {
		$film_adi = $_POST['film_adi'];
		$film_yonetmen    = $_POST['film_yonetmen'];
		$film_yapim_yili   = $_POST['film_yapim_yili'];
		$film_tur   = $_POST['film_tur'];

		if(!$film_adi || !$film_yonetmen || !$film_yapim_yili || !$film_tur){
			echo "bos";
		}
	else
	{

		$result = $conn->query("INSERT INTO `filmler` (`film_adi`, `film_yonetmen`, `film_yapim_yili`, `film_tur`) VALUES('$film_adi', '$film_yonetmen', '$film_yapim_yili', '$film_tur')");

		if ($result) {
			$res['message'] = "Film başarılı bir şekilde eklendi.";
		} else {
			$res['error']   = true;
			$res['message'] = "Bir hata oluştu!";
		}
	}
	}


	// Veri tabanındaki verileri güncelliyoruz.

	if ($action == 'update') {
		$id       = $_POST['id'];
		$film_adi = $_POST['film_adi'];
		$film_yonetmen    = $_POST['film_yonetmen'];
		$film_yapim_yili   = $_POST['film_yapim_yili'];
		$film_tur   = $_POST['film_tur'];


		$result = $conn->query("UPDATE `filmler` SET `film_adi`='$film_adi', `film_yonetmen`='$film_yonetmen', `film_yapim_yili`='$film_yapim_yili', `film_tur`='$film_tur' WHERE `id`='$id'");

		if ($result) {
			$res['message'] = "Başarılı bir şekilde güncellendi.";
		} else {
			$res['error']   = true;
			$res['message'] = "Bir hata oluştu!";
 		}
	}


	// Veri siliyoruz.

	if ($action == 'delete') {
		$id       = $_POST['id'];
		$film_adi = $_POST['film_adi'];
		$film_yonetmen    = $_POST['film_yonetmen'];
		$film_yapim_yili   = $_POST['film_yapim_yili'];
		$film_tur   = $_POST['film_tur'];

		$result = $conn->query("DELETE FROM `filmler` WHERE `id`='$id'");

		if ($result) {
			$res['message'] = "Film başarılı bir şekilde silindi.";
		} else {
			$res['error']   = true;
			$res['message'] = "Bir hata oluştu!";
		}
	}


	// Veri tabanı bağlantısını kapatıyoruz.
	$conn->close();

	// Verileri json formatında aktarıyoruz.
	echo json_encode($res);
	die();

?>