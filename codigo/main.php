<?php
require_once __DIR__ . '/../services/auth.php';

use Services\Auth;

$usuario = Auth::getUsuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap -->
        <!-- usar por link online quando tiver internet, caso contrário usar local -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <!-- bootstrap icons -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->
    <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.min.css">
    <!-- css extra -->
    <link rel="stylesheet" href="style.css">
    <title>CineHome</title>
</head>
<body>

<!-- HEADER -->
    <nav class="navbar nav-expand-lg nav-color p-0">
        <div class="container">
            <a href="home_adm.html" class="navbar-brand nav-logo"><img src="../img/Logo Streaming Filmes.svg" alt="Logo"></a>
            <div class="dropdown nav-item">
                <button class="btn common-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?= htmlspecialchars($usuario['username'])?></button>
                <ul class="dropdown-menu">
                    <li><a href="home.php" class="dropdown-item">Home</a></li>
                    <li><a href="main.php" class="dropdown-item">Catálogo</a></li>
                </ul>
            </div>
        </div>
    </nav>

    
    <?php if($mensagem):?>
    <div class="alert alert-info alert-dismissable fade show" role="alert">
        <?= htmlspecialchars($mensagem) ?>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif;
    if(Auth::isAdmin()): ?>
    <div class="card m-5 common-container">
        <div class="card-header">
            <h4 class="mb-0 title-font fs-2">Adicionar filme novo</h4>
        </div>
        <div class="card-body">
            <form action="post" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="filme" class="form-label">Nome do filme/série:</label>
                    <input type="text" name="modelo" id="filme" class="form-control common-input">
                    <div class="invalid-feedback">
                        Inválido
                    </div>
                </div>
                <div class="mb-3">
                    <label for="sinopse" class="form-label">Sinópse</label>
                    <textarea class="form-control common-input" id="sinopse" rows="5"></textarea>
                    <div class="invalid-feedback">
                        Inválido
                    </div>
                </div>
                <div class="mb-3">
                    <label for="genero" class="form-label">Gênero:</label>
                    <select name="genero" id="genero" class="form-select common-input">
                        <option value="acao" class="common-input">Ação</option>
                        <option value="romance" class="common-input">Romance</option>
                        <option value="comedia" class="common-input">Comédia</option>
                        <option value="terror" class="common-input">Terror</option>
                        <option value="drama" class="common-input">Drama</option>
                        <option value="ficcao" class="common-input">Ficção Científica</option>
                        <option value="animado" class="common-input">Animação</option>
                        <option value="infantil" class="common-input">Infântil</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tipo" class="form-label">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select common-input" required>
                        <option value="filme" class="common-input">Filme</option>
                        <option value="serie" class="common-input">Série</option>
                        <option value="novela" class="common-input">Novela</option>
                        <option value="documentario" class="common-input">Documentário</option>
                        <option value="null" disabled selected hidden></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="poster" class="form-label">Pôster:</label>
                    <input type="file" name="poster" id="poster" class="form-control common-input" accept="image/*">
                </div>
                <button class="btn common-btn" type="submit" name="adicionar">
                    Adicionar ao catálogo
                </button>
            </form>
        </div>
    </div>
    <?php endif; ?>

    <!-- Calculadora de aluguel -->
    <div class="card m-5 common-container">
        <div class="card-header">
            <h4 class="mb-0">Calcular a previsão de aluguel</h4>
        </div>
        <div class="card-body">
            <form action="post" class="needs-validation" novalidate>
                <div class="mb-3">
                    <label for="tipo" class="input-label">Tipo:</label>
                    <select name="tipo" id="tipo" class="form-select common-input" required>
                        <option value="filme" class="common-input">Filme</option>
                        <option value="serie" class="common-input">Série</option>
                        <option value="novela" class="common-input">Novela</option>
                        <option value="documentario" class="common-input">Documentário</option>
                        <option value="null" selected hidden></option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="dias" class="input-label">Tempo em dias: </label>
                    <input type="number" name="dias" id="tempo" class="form-control common-input" value="1" required>
                </div>
                <button class="btn common-btn" type="submit" name="calcular">Calcular</button>
            </form>
        </div>
    </div>

    <!-- Listagem de produtos -->
    <div class="col-12">
        <div class="card common-container m-5">
            <div class="card-header">
                <h4 class="mb-0">Catalogo de filmes, séries, novelas e documentários</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table listagem table-hover">
                        <thead>
                            <th>Poster</th>
                            <th>Título</th>
                            <th>Sinópse</th>
                            <th>Gênero</th>
                            <th>Tipo</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </thead>
                        <tbody>
                            <?php foreach($categorias->getCatalogo() as $item): ?>
                            <tr>
                                <td><img src="<?= $item->poster ?>"></td>
                                <td><?= htmlspecialchars($item->titulo)?></td>
                                <td><?= htmlspecialchars($item->sinopse)?></td>
                                <td><?= htmlspecialchars($item->genero)?></td>
                                <td><?= htmlspecialchars($item->tipo)?></td>
                                <td>
                                    <span class="badge bg-<?= $veiculo->isDisponivel() ? 'success' : 'warning' ?>">
                                        <?= $veiculo->isDisppnivel() ? 'Disponível' : 'Alugado' ?>
                                    </span>
                                </td>
                                <?php if (Auth::isAdmin()): ?>
                                <td>
                                    <!-- formulario de ações -->
                                    <div class="action-wrapper">
                                        <form action="POST" class="btn-group-actions">
                                            <input type="hidden" name="modelo" value="<?php htmlspecialchars($veiculo->getModelo); htmlspecialchars($veiculo->getPlaca); ?>">
                                            <!-- botôm de delete (sempre disponível pro adm) -->
                                            <button class="btn btn-danger btn-sm delete-btn" type="submit" name="deletar">Deletar</button>
                                            <!-- botoins condicionais -->
                                            <div class="rent-group">
                                                <?php if (!$veiculo->isDisponivel): ?>
                                                <!-- veículo alugado -->
                                                <button class="btn btn-warning btn-sm hidden" type="submit" name="devolver">Devolver</button>
                                                <?php else: ?>
                                                <!-- veículo disponível -->
                                                <input type="number" name="dias" class="form-control days-input" value="1" min="1" required>
                                                <button class="btn btn-primary btn-sm" type="submit" name="alugar">Alugar</button>
                                                <?php endif ?>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="d-flex flex-column align-items-center justify-content-center">
        <div class="nav-logo"><img src="../img/Logo_streaming(2).png" alt="Logo"></div>
        <p class="lh-1"><strong>Entre em contato:</strong> contact@cinehome.com</p>
        <p class="lh-1" style="font-size: small;">©️2025, Cinehome.com | Direitos Reservados</p>
    </footer>


    <!-- js do bootstrap -->
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>