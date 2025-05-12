<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CineHome - Página Inicial</title>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.min.css" />

  <!-- Fonte Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

  <!-- Estilo interno -->
  <style>
    * {
      font-family: 'Poppins', sans-serif;
      color: #fff !important;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background-color: #313131;
    }

    .common-container {
      background-color: #00000020 !important;
      border: 3px solid #fff;
      border-radius: 5px;
    }

    .borderless {
      border: none;
    }

    .poster-img {
      width: 100%;
      max-width: 240px;
      height: 360px;
      object-fit: cover;
      border-radius: 8px;
    }

    footer {
      background-color: #585858;
      padding: 2rem 0;
      width: 100%;
      text-align: center;
    }

    footer .nav-logo img {
      width: 75px;
      height: 75px;
    }

    footer p {
      color: #fff;
      margin: 0.5rem 0;
    }

    footer p.lh-1 {
      font-size: small;
    }

    .nav-logo img {
      width: 100px;
      height: 100px;
    }

    .nav-color {
      background-color: #000;
    }

    .limite {
      color: #D22424 !important;
      text-decoration: underline dashed;
    }

    .catalogo-texto {
      font-size: 0.95rem;
      text-align: left;
    }

    /* Botões minimalistas do carrossel */
    .carousel-control-prev,
    .carousel-control-next {
      width: 30px;
      height: 30px;
      top: 50%;
      transform: translateY(-50%);
      background: none;
      border: none;
      padding: 0;
      opacity: 0.8;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: transparent;
      border: solid white;
      border-width: 0 4px 4px 0;
      width: 16px;
      height: 16px;
    }

    .carousel-control-prev-icon {
      transform: rotate(135deg);
    }

    .carousel-control-next-icon {
      transform: rotate(-45deg);
    }

    /* Redução do tamanho das imagens do carrossel de banners */
    #banners-container .carousel-inner img {
      max-height: 580px;
      max-width: 95%;
      margin: 0 auto;
      object-fit: cover;
      border-radius: 8px;
    }

    /* Menu hamburguer personalizado */
    .navbar-toggler {
      border: none;
      background: none;
    }

    .navbar-toggler-icon {
      background-image: none;
      width: 24px;
      height: 18px;
      position: relative;
      display: inline-block;
    }

    .navbar-toggler-icon::before,
    .navbar-toggler-icon::after,
    .navbar-toggler-icon div {
      content: "";
      background-color: #fff;
      display: block;
      height: 2px;
      width: 100%;
      position: absolute;
      left: 0;
      transition: all 0.3s ease;
    }

    .navbar-toggler-icon div {
      top: 8px;
    }

    .navbar-toggler-icon::before {
      top: 0;
    }

    .navbar-toggler-icon::after {
      bottom: 0;
    }

    @media (max-width: 768px) {
      .poster-img {
        height: 250px;
      }

      .catalogo-texto {
        text-align: center;
        font-size: 0.85rem;
        padding: 0 1rem;
      }

      #banners-container .carousel-inner img {
        max-height: 200px;
      }
    }
  </style>
</head>

<body>
  <!-- Barra de navegação -->
  <nav class="navbar navbar-expand-lg nav-color p-3">
    <div class="container-fluid justify-content-center">
      <a href="home_adm.html" class="navbar-brand nav-logo mx-auto">
        <img src="../img/Logo Streaming Filmes.svg" alt="Logo">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"><div></div></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center text-center" id="navbarNav">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="home_adm.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="main_adm.html">Assinaturas</a>
          </li>
        </ul>
        <!-- Menu -->
        <div class="dropdown nav-item ms-lg-auto w-100 w-lg-auto">
          <div class="d-flex justify-content-center justify-content-lg-end">
            <div class="dropdown">
              <button class="btn common-btn dropdown-toggle w-100 text-center text-lg-end px-3" type="button"
                id="adminDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-stars"></i> Admin
              </button>
              <ul class="dropdown-menu dropdown-menu-end w-100 text-center text-lg-end"
                aria-labelledby="adminDropdown">
                <li>
                  <a href="login.html" class="dropdown-item d-flex justify-content-between align-items-center px-3">
                    <span>Sair</span> <i class="bi bi-box-arrow-right ms-2"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <!-- Título e subtítulo -->
  <div class="container my-5 text-center">
    <div class="card common-container borderless p-4">
      <div class="card-header fs-3 fw-bold">Bem-vindo de volta</div>
      <div class="card-body">
        <p class="card-text fs-5">Veja a recomendação de filme e série da semana</p>
      </div>
    </div>
  </div>

  <!-- Carrossel de Banners -->
  <div class="container my-5" id="banners-container">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/conclave.jpg" class="d-block w-100 img-fluid" alt="Conclave" />
        </div>
        <div class="carousel-item">
          <img src="img/peaky-blinders2.jpeg" class="d-block w-100 img-fluid" alt="Vale Tudo" />
        </div>
        <div class="carousel-item">
          <img src="img/greysanatomy.jpg" class="d-block w-100 img-fluid" alt="Peaky Blinders" />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#slider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#slider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Próximo</span>
      </button>
    </div>
  </div>

  <!-- Carrossel de Assinaturas -->
  <div class="container mb-4">
    <div class="card-header fs-5 fw-semibold">Minhas Assinaturas</div>
    <div id="carrosselAssinaturas" class="carousel slide mt-3" data-bs-ride="carousel">
      <div class="carousel-inner text-center">
        <!-- Página 1 -->
        <div class="carousel-item active">
          <div class="row justify-content-center">
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/you.jpg" class="poster-img" alt="Avenida Brasil">
            </div>
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/wicked.jpg" class="poster-img" alt="Vale Tudo">
            </div>
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/pantanal.png" class="poster-img" alt="Peaky Blinders">
            </div>
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/Breaking_bad.jpg" class="poster-img" alt="Liga da Justiça">
            </div>
          </div>
        </div>
        <!-- Página 2 -->
        <div class="carousel-item">
          <div class="row justify-content-center">
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/pecadores.jpg" class="poster-img" alt="Como Treinar seu Dragão 2">
            </div>
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/stranger_things.jpg" class="poster-img" alt="Chiquititas">
            </div>
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/outroladodoparaiso.jpg" class="poster-img" alt="Cobra Kai">
            </div>
            <div class="col-6 col-md-3 mb-3 d-flex justify-content-center">
              <img src="img/simpsons.jpg" class="poster-img" alt="Bosko Looney Tunes">
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carrosselAssinaturas" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carrosselAssinaturas" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>
  </div>

  <!-- Texto Final -->
  <div class="container my-5">
    <p class="fs-6 catalogo-texto">
      Já terminou de assistir ou quer ver mais filmes e séries?<br />
      Veja o nosso catálogo por mais filmes e séries!<br />
      <a href="catalogo.html" class="text-decoration-underline text-info fw-semibold">Clique aqui</a> para ir ao catálogo.
    </p>
  </div>

  <!-- Rodapé -->
  <footer class="d-flex flex-column align-items-center justify-content-center">
    <div class="nav-logo">
      <img src="../img/Logo_streaming(2).png" alt="Logo">
    </div>
    <p class="lh-1"><strong>Entre em contato:</strong> contact@cinehome.com </p>
    <p class="lh-1">©️2025, Cinehome.com | Direitos Reservados</p>
  </footer>

  <!-- JS do Bootstrap -->
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
