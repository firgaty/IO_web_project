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
	echo"<table>";
	echo"<tr> <td> Nom : </td> <td>".htmlspecialchars($lastname)."</td></tr>";
	echo"<tr> <td> Prénom : </td> <td>".htmlspecialchars($firstname)."</td></tr>";
	echo"<tr> <td> Pseudo : </td> <td>".htmlspecialchars($pseudo)."</td></tr>";
	echo"<tr> <td> Mail : </td> <td>".htmlspecialchars($mail)."</td></tr>";
	echo"</table>";
	?>

	<?php include 'footer.php'; ?>
</body>
</html>
