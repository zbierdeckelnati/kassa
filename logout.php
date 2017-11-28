<html>
<head>
  <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<body>

<?php
session_start();
if(session_destroy())
{
?>
				<script>
				setTimeout(function () { 
				swal({
				  title: "Abmeldung erfolgreich!",
				  //text: "Message!",
				  type: "success",
				  confirmButtonText: "OK"
				},
				function(isConfirm){
				  if (isConfirm) {
					window.location.href = "index.php";
				  }
				}); }, 0);
				</script>
				<?php
}

?>
</body>
</html>