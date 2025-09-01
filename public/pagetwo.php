<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quicksand:wght@300..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>Advinhe o número</title>
</head>

<body>
    <h1>JOGO DA ADVINHAÇÃO</h1>
    <!-- JOGO DE ARTHUR O. G. NOVAIS, DANIEL A. BRITO, ENZO A. V. FARIAS E ERIC N. SILVA -->
    <form method="post" id="form">
        <label for="number">Advinhe o número pensado pelo player anterior</label>
        <input type="number" name="palpite" id="palpite" min="1" max="20">
        <button type="submit" name="button" value="1">Tentar</button>
    </form>
</body>

</html>

<?php

session_start();

$number = file_get_contents('dados.json');
$palpite = $_POST['palpite'];
$button = $_POST['button'];
$_SESSION['buttonClickCount'];
if(!empty($button) && !empty($palpite)){
    $_SESSION['buttonClickCount']++;
    echo $_SESSION['buttonClickCount'];
}

if($palpite > $number){
    echo '<p>Tente um número menor que '. $palpite. '</p>';
} elseif($palpite < $number){
    echo '<p>Tente um número maior que '. $palpite. '</p>';
} elseif($palpite == $number){
    echo '<p>Você acertou!</p>';
    echo '<form method="post"><button type="submit" name="tryAgain" value="1">Tentar novamente</button></form>';
}

if($_SESSION['buttonClickCount']>=5 && $palpite!==$number){
    echo '<p>Número de tentativas excedido!<br>
    O número era '.$number.'
    </p>';

    echo '<form method="post"><button type="submit" name="tryAgain" value="1">Tentar novamente</button></form>';
}

if(!empty($_POST['tryAgain'])){
    session_destroy();
    header("Location: index.php");
}

?>