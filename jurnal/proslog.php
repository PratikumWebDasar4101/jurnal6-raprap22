<?php 

include("koneksi.php");

if (isset($_POST['nama'])) {
	$nama = $_POST['nama'];
	$nim = $_POST['nim'];	
	$query = $pdo -> prepare("SELECT * FROM siswa WHERE nama = '$nama' AND nim = '$nim'");
	$query -> execute();

	$row = $query -> rowcount();
	$data = $query -> fetch(PDO::FETCH_ASSOC);

	if ($row != 0) {
		$_SESSION['nim'] = $data['nim'];
		header("location: form.html")
	}else{
		?>
            <script>
                alert("Data tidak tersimpan");
            </script>
            <?php
	}
}

 ?>