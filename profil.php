<?php
       include 'session.php';
?>
<!DOCTYPE>
<html>
<head>
        <title> Profil </title>
        <meta charset='utf-8'>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
        <?php
	include 'header.php';
        ?>
	<h1>Profil</h1>
	<?php
	echo"<table>
	<tr> <td> Nom : </td> <td> $lastname </td></tr>
	<tr> <td> Prénom : </td> <td> $firstname </td></tr>
	<tr> <td> Pseudo : </td> <td> $pseudo </td></tr>
	<tr> <td> Mail : </td> <td> $mail </td></tr>
	</table>";
	?>

	<?php include 'footer.php'; ?>
</body>
</html>
