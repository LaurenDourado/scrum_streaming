<?php

    // incluir o autoload
    require_once __DIR__ . '/../vendor/autoload.php';

    // incluir o arquivo com as variáveis
    require_once __DIR__ . '/../config/config.php';

    session_start();

    // importar as classes Locadora e Auth
    use Services\{Locadora, Auth};

    // inportar as classes Carro e moto
    use Models\{Filme, Serie, Novela, Documentario};

    // Verifica se o usuário está logado
    if(!Auth::verificarLogin()){
        header('Location: login.php');
        exit;
    }

    // Condição para logout
    if(isset($_GET['logout'])){
        (new Auth())->logout();
        header('Location: ../index.html');
        exit;   
    }

    // Criar uma instância da classe Locadora
    $locadora = new Locadora();

    $mensagem = '';

    $usuario = Auth::getUsuario();

    // veriifica os dados do formupario via POST
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // verificar se requer permissão de administrador
        if(isset($_POST['adicionar']) || isset($_POST['deletar']) || isset($_POST['alugar']) || isset($_POST['devolver'])){

            if(!Auth::isAdmin()){
                $mensagem = "Você não tem permissão para realizar essa ação.";
                goto renderizar;
            }
        }

        if(isset($_POST['adicionar'])){
            $titulo = $_POST['titulo'];
            $sinopse = $_POST['sinopse'];
            $genero = $_POST['genero'];
            $tipo = $_POST['tipo'];

            // Processar e redimensionar a imagem
            function processarImagem($arquivo) {
                $diretorio = __DIR__ . "/../data/img/";
                if (!file_exists($diretorio)) {
                    mkdir($diretorio, 0777, true);
                }
                $nomeArquivo = uniqid() . '_' . basename($arquivo['name']);
                $caminhoCompleto = $diretorio . $nomeArquivo;
                $tipoArquivo = strtolower(pathinfo($caminhoCompleto, PATHINFO_EXTENSION));

                $formatosPermitidos = ['jpg', 'jpeg', 'png', 'gif'];
                if (!in_array($tipoArquivo, $formatosPermitidos)) {
                    return ['erro' => 'Formatos permitidos: JPG, JPEG, PNG e GIF'];
                }

                if ($arquivo['size'] > 5000000) { // Limite de 5MB
                    return ['erro' => 'O tamanho máximo permitido é 5MB'];
                }

                // Redimensionar a imagem
                list($larguraOriginal, $alturaOriginal) = getimagesize($arquivo['tmp_name']);
                $novaLargura = 800; // Largura desejada
                $novaAltura = ($alturaOriginal / $larguraOriginal) * $novaLargura;

                $imagemRedimensionada = imagecreatetruecolor($novaLargura, $novaAltura);

                switch ($tipoArquivo) {
                    case 'jpg':
                    case 'jpeg':
                        $imagemOriginal = imagecreatefromjpeg($arquivo['tmp_name']);
                        break;
                    case 'png':
                        $imagemOriginal = imagecreatefrompng($arquivo['tmp_name']);
                        break;
                    case 'gif':
                        $imagemOriginal = imagecreatefromgif($arquivo['tmp_name']);
                        break;
                    default:
                        return ['erro' => 'Erro ao processar a imagem'];
                }

                imagecopyresampled(
                    $imagemRedimensionada,
                    $imagemOriginal,
                    0, 0, 0, 0,
                    $novaLargura,
                    $novaAltura,
                    $larguraOriginal,
                    $alturaOriginal
                );

                // Salvar a imagem redimensionada
                switch ($tipoArquivo) {
                    case 'jpg':
                    case 'jpeg':
                        imagejpeg($imagemRedimensionada, $caminhoCompleto, 90);
                        break;
                    case 'png':
                        imagepng($imagemRedimensionada, $caminhoCompleto);
                        break;
                    case 'gif':
                        imagegif($imagemRedimensionada, $caminhoCompleto);
                        break;
                }

                imagedestroy($imagemOriginal);
                imagedestroy($imagemRedimensionada);

                return ['caminho' => $caminhoCompleto];
            }

            // Processar o upload da imagem
            if (isset($_FILES['poster']) && $_FILES['poster']['error'] === UPLOAD_ERR_OK) {
                $resultadoImagem = processarImagem($_FILES['poster']);
                if (isset($resultadoImagem['erro'])) {
                    $mensagem = $resultadoImagem['erro'];
                }
                $poster = $resultadoImagem['caminho'];
            } else {
                $poster = null;
            }

            $item = ((($tipo == 'Filme') ? new Filme($titulo, $sinopse, $genero, $tipo, $poster) : ($tipo = 'Serie'))
             ? new Serie($titulo, $sinopse, $genero, $tipo, $poster) : ($tipo = 'Documentario'))
              ? new Documentario($titulo, $sinopse, $genero, $tipo, $poster) : new Novela($titulo, $sinopse, $genero, $tipo, $poster);

            $locadora->adicionarItem($item);

            $mensagem = "{$tipo} adicionado com sucesso!";
        }
        elseif(isset($_POST['alugar'])){
            $dias = isset($_POST['dias']) ? (int)$_POST['dias'] :1;
            $mensagem = $locadora->alugarItem($_POST['tipo'], $dias);
        }
        elseif(isset($_POST['devolver'])){
            $mensagem = $locadora->devolverItem($_POST['tipo']);
        }
        elseif(isset($_POST['deletar'])){
            $mensagem = $locadora->deletarItem($_POST['tipo'], $_POST['titulo']);
        }
        elseif(isset($_POST['calcular'])){
            $dias = (int)$_POST['dias_calculo'];
            $tipo = $_POST['tipo_calculo'];
            $valor = $locadora->calcularPrevisaoAluguel($dias, $tipo);

            $mensagem = "Previsão de valor para {$dias} dias: R$ " . number_format($valor, 2, ',','.');
        }

    }

    renderizar:
    require_once __DIR__ . '/../view/home.php';