<?php 

    // incuir o auto load do composer para carregar automaticamente as classes utilizadas
    require_once __DIR__ . '/../vendor/autoload.php';

    // incluir o arquivo com as variaveis
    require_once __DIR__ . '/../config/config.php';

    session_start();

    // inserir a classe de autenticação
    use Services\Auth;

    // Inicializa a variável para mensagens de erro
    $mensagem = '';

    // instanciar a classe de autenticação
    $auth = new Auth();

    // verifica se já foi autenticado
    if (Auth::verificarLogin()) {
        echo "Usuário já autenticado. Redirecionando...";
        header('Location: index.php');
        exit;
    }

    // verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
    
        if ($auth->login($username, $password)) {
            header('Location: index.php');
            exit;
        } else {
            $mensagem = 'Usuário ou senha incorretos!';
        }
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
        <!-- usar por link online quando tiver internet, caso contrário usar local -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- bootstrap icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="../node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <!-- css extra -->
    <link rel="stylesheet" href="../style.css">
    <title>CineHome</title>
</head>
<body style="background-image: url(../img/foto_filmes.png); background-size: cover;">
    <div class="container m-md-5 mt-5 log-container common-container">
        <h1>Login</h1>
        <form method="post" class="log-form">
            <div class="mb-3">
                <label for="user" class="form-label">Usuário</label>
                <input type="text" name="user" id="usuario" class="form-control common-input" placeholder="Nome de usuario" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha" class="form-control common-input" required>
            </div>
            <button class="btn common-btn" type="submit">Entrar</button>
        </form>
    </div>
    <?php if($mensagem): ?>
        <div class="alert mx-5" style="background-color: #f02020;"><?= htmlspecialchars($mensagem) ?></div>
    <?php endif; ?>
    <!-- js do bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>