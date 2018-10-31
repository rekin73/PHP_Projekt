<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <span class="loggedAs">
    <?php session_start(); if(isset($_SESSION['username'])) echo "Jesteś zalogowany jako: ".$_SESSION['username']; ?>
</span>
    <a href='getProducts.php?p=k_1'>Łuki</a>
    <a href="getProducts.php?p=k_2">Strzały</a>
    <a href="getProducts.php?p=k_3">Cięciwy</a>
    <a href="getProducts.php?p=k_4">Rękawice</a>
    <a href="getProducts.php?p=k_5">Odzierz</a>

</body>

</html>