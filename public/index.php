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

    <button type="button" id="toggleGitHub" style="margin-top: 15px;" onclick="TogglePage()">GitHub</button>

    <div id="gitHub" class="gitHub">

        <h2>GitHub dos dev's:</h2>

        <br>

        <pre>
<div class="item"><img src="assets/img/arthurPFP.png" alt="Ícone de Arthur"><a href="https://github.com/Olithur"><h5>Arthur: Olithur</h5></a></div>
<div class="item"><img src="assets/img/danielPFP.jpg" alt="Ícone de Daniel"><a href="https://github.com/allvez-1"><h5>Daniel: Daniel Alves (@allvez-1)</h5></a></div>
<div class="item"><img src="assets/img/enzoPFP.png" alt="Ícone de Enzo"><a href="https://github.com/EnzoMurky"><h5>Enzo: EnzoMurky</h5></a></div>
<div class="item"><img src="assets/img/ericPFP.jpg" alt="Ícone de Eric"><a href="https://github.com/Eric-Nogueira"><h5>Eric: Nogueira (@Eric-Nogueira)</h5></a></div>
        </pre>

    </div>

    <h1>JOGO DA ADVINHAÇÃO</h1>
    <!-- JOGO DE ARTHUR O. G. NOVAIS, DANIEL A. BRITO, ENZO A. V. FARIAS E ERIC N. SILVA -->
    <form method="post" id="form">
        <label for="number">Diga um número para que o próximo player acerte</label>
        <input type="number" name="number" id="number" min="1" max="20">
        <button type="submit" name="button" value="1">Tentar</button>
    </form>

    

    <?php

    $number = (int) $_POST['number'];
    $jsonContent = json_encode($number);
    $arquivo = 'dados.json';

    if (!empty($number)) {
        file_put_contents($arquivo, $jsonContent);
        header("Location: pagetwo.php");
        die();
    } else {
        if (isset($_POST['button'])) {
            echo '<p style="color: #ff0000" class="errorMessage">Insira um número</p>';
        }
    }
    ?>

    <script src="assets/js/script.js"></script>
</body>

</html>