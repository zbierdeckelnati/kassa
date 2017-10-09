<html>

<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>


<body>
<?php
	include_once 'connection.php';

	$datenbank = $_POST['datenbank'];
	$datum = $_POST['datum'];
	$beschreibung = $_POST['beschreibung'];
	$soll = $_POST['soll'];
	$haben = $_POST['haben'];

	if(isset($_POST['btn-upload']))
	{    
		 
		 
		$file = rand(1000,100000)."-".$_FILES['file']['name'];
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		$folder="uploads/";
		
		$new_size = $file_size/1024;  
		
		$new_file_name = strtolower($file);
		
		$final_file=str_replace(' ','-',$new_file_name);
		
		if(move_uploaded_file($file_loc,$folder.$final_file))
		{
			$sql="INSERT INTO $datenbank(file,type,size, beschreibung, soll, haben, datum) VALUES('$final_file','$file_type','$new_size', '$datum', '$beschreibung', '$soll', '$haben')";
			mysqli_query($db_kassa, $sql);
			?>
			<script>
				setTimeout(function () { 
				swal({
				  title: "Erfolgreich hochgeladen!",
				  //text: "Message!",
				  type: "success",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "kassa.php";
				  }
				}); }, 250);
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert('Fehler beim Hochladen');
			window.location.href='index.php?fail';
			</script>
			<?php
		}
	}
?>
</body>

</html>