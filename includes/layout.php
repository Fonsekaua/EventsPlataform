<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eventos</title>
    <link rel="stylesheet" href= "<?php echo $global ?? "" ?> ">   
    <link rel="stylesheet" href="<?php echo $css  ?? "" ?> "> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <?php include "header.php" ?>
    </header>
    <main>
        <?php include $content ?>
    </main>
    <footer>
        <?php include "footer.php"?>
    </footer>
</body>
</html>