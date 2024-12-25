
<?php 

echo '
<h1> Votre compte a été crée avec succès ! </h1>

';

$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];