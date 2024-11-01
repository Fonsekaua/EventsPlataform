<?php 
require "./actions/db.php";
session_start();
if(isset($_SESSION['usuario'])){
    echo $_SESSION['usuario'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=<?= $globalCSS?>>
    <link rel="stylesheet" href=<?= $css?>>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
    <?php include "header.php";?>
     <div id="box__info" class="">
        por erros e falhas
     </div>   
    <main>
        <?php include $content?>
    </main>
    <?php include "footer.php"?>
</body>
<script src=<?=$globalJS?>></script>
<script src=<?=$js ?>></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</html>