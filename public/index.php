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
    <?php
    
    ob_start(); //Cria espaço pra outputs; É necessário pra que a gente possa limpar as outputs depois
    session_start(); //Inicia a sessão
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { //Checagem do request method
        $palpite = $_POST['number']; //Chute do usuário
        $_SESSION['num']; //Set da variável que receberá o número gerado pelo sistema
        $_SESSION['buttonClickCount']; //Set da variável que contará o número de vezes que o usuário clicou no botão (número de tentativas)
        $_SESSION['parametro'] = 0;
        $_SESSION['isGameOver'] = false;


        while($_SESSION['isGameOver'] == false){
    
        if (!empty($_POST['button']) && !empty($palpite)) { //Checa se o botão não está com um valor vazio
            $_SESSION['buttonClickCount']++; //Se a expressão for verdadeira, o sistema adciona '1' ao número de tentativas
        }
        echo $_SESSION['buttonClickCount'] . "\n"; //Trecho pra debugar; Será apagado na versão final 
    
        if (!isset($_SESSION['num'])) { //Checa se a variável está setada; trecho necessário pois, se ele não existisse, o site geraria um novo valor a cada atualização ou submit da página
            $_SESSION['num'] = rand(1, 20); //Gera um valor aleatório de 1 a 20 e guarda-o na variável
        }
        echo $_SESSION['num'] . "\n"; //Trecho pra debugar; Será apagado na versão final 
    
        if ($palpite !== $_SESSION['num'] && $palpite < $_SESSION['num']) { //Checa se o valor do palpite é diferente do gerado e se ele é menor
            echo "<p>Tente um maior</p>";
        } elseif ($palpite !== $_SESSION['num'] && $palpite > $_SESSION['num']) { //Checa se o valor do palpite é diferente do gerado e se ele é maior
            echo "<p>Tente um menor</p>";
        }

         if ($palpite == $_SESSION['num']) {
            $_SESSION['parametro'] = 1;
        }

        if ($_SESSION['parametro'] == 1) { //Checa se o valor do palpite é igual ao gerado
            echo "<p>Você acertou!</p><br>";
            /*echo '
        <form method="post">
            <p>Tentar novamente?</p>
            <button type="submit" name="tryAgain" value="1">Tentar novamente</button>
        </form>
        ';
            if (!empty($_POST['tryAgain'])) {
                $_SESSION['buttonClickCount'] = 0; //Zera o número de tentativas
                session_destroy(); //Para a sessão para que, quando o usuário resete a página para uma nova tentativa, o sistema gere um novo número
                ob_clean(); //Limpa os outputs;;
                goto start; // Volta pro início
            }*/
                
        $_SESSION['isGameOver'] = true;

        }

        if ($_SESSION['buttonClickCount'] >= 5 && $_SESSION['parametro'] == 0) {  //Checa se o valor de tentativas é maior ou igual a cinco
           echo "<pre>
            Número de tentativas excedido.
            O número era " . $_SESSION['num'] .
                ".</pre>";

             /*echo '
        <form method="post">
            <p>Tentar novamente?</p>
            <button type="submit" name="tryAgain" value="1">Tentar novamente</button>
        </form>
        ';
            if (!empty($_POST['tryAgain'])) {
                $_SESSION['buttonClickCount'] = 0; //Zera o número de tentativas
                session_destroy(); //Para a sessão para que, quando o usuário resete a página para uma nova tentativa, o sistema gere um novo número
                session_start();
                ob_clean(); //Limpa os outputs;;
                goto start; // Volta pro início
            }*/
                
        $_SESSION['isGameOver'] = true;

        }
    }

    echo '
        <form method="post">
            <p>Tentar novamente?</p>
            <button type="submit" name="tryAgain" value="1">Tentar novamente</button>
        </form>
        ';
            if (!empty($_POST['tryAgain'])) {
                $_SESSION['buttonClickCount'] = 0; //Zera o número de tentativas
                session_destroy(); //Para a sessão para que, quando o usuário resete a página para uma nova tentativa, o sistema gere um novo número
                session_start();
                ob_clean(); //Limpa os outputs
            }

            /*O PRIMEIRO SUBMIT, O JOGO RODA AS CINCO TENTATIVAS, ALÉM DE QUE, QUANDO O USUÁRIO ACERTA, O JOGO DEMORA MAIS DE 120s E NÃO CARREGA A PÁGINA*/
}
    ?>

    <form method="post" id="form">
        <label for="number">Advinhe o número pensado pelo sistema</label>
        <input type="number" name="number" id="number" min="1" max="20">
        <br><span id="erro">Por favor, insira um número</span>
        <button type="submit" name="button" value="1" onclick="numberCheck()">Tentar</button>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/ajax/ajaxRequest.js"></script>
        <script src="assets/js/ajax/variablePull.js"></script>
    </form>
</body>

</html>