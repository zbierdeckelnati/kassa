<?php
	include_once 'connection.php';

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
			$sql="INSERT INTO zahlungen(file,type,size, beschreibung, soll, haben) VALUES('$final_file','$file_type','$new_size', '$beschreibung', '$soll', '$haben')";
			mysqli_query($db, $sql);
			?>
			<script>
			alert('successfully uploaded');
			window.location.href='index.php?success';
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert('error while uploading file');
			window.location.href='index.php?fail';
			</script>
			<?php
		}
	}
?>