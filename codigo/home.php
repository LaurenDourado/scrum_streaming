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
<<<<<<< HEAD:codigo/home_user.html
    <nav class="navbar navbar-expand-lg nav-color p-0">
=======
    <nav class="navbar nav-expand-lg nav-color">
>>>>>>> 300e11f717f7bfdb8ef679defbfdad82784137e6:codigo/home.php
        <div class="container">
            <a href="home_adm.html" class="navbar-brand nav-logo"><img src="../img/Logo Streaming Filmes.svg" alt="Logo"></a>
            <div class="dropdown nav-item">
<<<<<<< HEAD:codigo/home_user.html
                <i class="bi bi-person"></i>
                <nav class="navbar navbar-expand-lg secondary-bg-color p-2" id="bottom-navbar-container">
                    <div class="container">
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bottom-navbar"
                        aria-controls="bottom-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="bi bi-list"></i>
                      </button>
                      <ul class="navbar-nav mb-2 mb-lg-0 collapse navbar-collapse" id="bottom-navbar">
                        <li class="nav-item">
                          <a class="nav-link" href="home_user.html">
                            Home
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="main_user.html">
                            Catálogo
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">
                            Assinaturas
                          </a>
                        </li>
                      </ul>
                    </div>
                  </nav>
=======
                <button class="btn common-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?= htmlspecialchars($usuario['username']) ?></button>
                <ul class="dropdown-menu">
                    <li><a href="home.php" class="dropdown-item">Home</a></li>
                    <li><a href="main.php" class="dropdown-item">Catálogo</a></li>
                </ul>
>>>>>>> 300e11f717f7bfdb8ef679defbfdad82784137e6:codigo/home.php
            </div>
        </div>
    </nav>

<<<<<<< HEAD:codigo/home_user.html
    <div class="bem">
        <h1>Bem-vindo de volta, Usuário!</h1>
        <p>Veja a recomendação de filme e série da semana</p>
=======
    <div class="container m-lg-5">
        <div class="card common-container borderless">
            <div class="card-header fs-5 title-font">Bem-vindo de volta, <?= htmlspecialchars($usuario['username']) ?>!</div>
            <div class="card-body">
                <p class="card-text">Veja a seleção de filmes e séries da semana!</p>
                <div class="row justify-content-around gap-3">
                    <img src="../img/osfantasmassedivertem.jpg" alt="semanal1" class="fmsr-poster">
                    <img src="../img/boskolooneytunes.jpg" alt="semanal2" class="fmsr-poster">
                    <img src="../img/ligadajustiça.jpg" alt="semanal3" class="fmsr-poster">
                </div>
            </div>
        </div>
        
        <div class="card common-container borderless mt-3">
            <div class="card-header fs-5 title-font">Alugados por você</div>
            <div class="card-body">
                <div class="row justify-content-around gap-3">
                    <img src="../img/mylittlepony.jpg" alt="alugado1" class="fmsr-poster">
                    <img src="../img/monsterhigh.jpg" alt="alugado2" class="fmsr-poster">
                    <img src="../img/backardigans.jpg" alt="alugado3" class="fmsr-poster">
                    <img src="../img/jurassicpark.jpg" alt="alugado4" class="fmsr-poster">
                </div>
                <p class="mt-3 limite card-text">Você atingiu o limite de alugados no momento, devolva um item para poder alugar um novo</p>
            </div>
        </div>
>>>>>>> 300e11f717f7bfdb8ef679defbfdad82784137e6:codigo/home.php
    </div>

    
    <!-- banners -->
    <div class="container" id="banners-container">
        <div id="slider" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="img/conclave.jpg" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
              <img src="img/valetudo.jpg" class="d-block w-100 img-fluid" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/peakyblinders.jpg" class="d-block w-100 img-fluid" alt="...">
              </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

    <!-- container -->
    <div class="card-header fs-5 title-font">Minhas Assinaturas</div>
<div id="carrosselAssinaturas" class="carousel slide carrossel-posters mt-3" data-bs-ride="carousel">
  <div class="carousel-inner text-center">
    <div class="carousel-item active">
      <img src="img/avenidabrasil.jpg" class="d-block poster-img mx-auto" alt="Avenida Brasil">
    </div>
    <div class="carousel-item">
      <img src="img/valetudo.jpg" class="d-block poster-img mx-auto" alt="Vale Tudo">
    </div>
    <div class="carousel-item">
      <img src="img/peakyblinders.jpg" class="d-block poster-img mx-auto" alt="Peaky Blinders">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carrosselAssinaturas" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carrosselAssinaturas" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Próximo</span>
  </button>
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