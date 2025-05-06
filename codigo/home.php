<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CineHome - Página Inicial</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.min.css" />

  <!-- Estilos internos essenciais -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap');

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

    .title-font {
      font-family: 'Roboto Mono', monospace;
    }

    .common-container {
      background-color: #00000020 !important;
      border: 3px solid #fff;
      border-radius: 5px;
    }

    .borderless {
      border: none;
    }

    .fmsr-poster {
      height: 300px;
      width: 200px;
      border-radius: 5px;
    }

    .carrossel-posters {
      max-width: 300px;
      margin: 0 auto;
    }

    .poster-img {
      height: 400px;
      width: auto;
      object-fit: cover;
      border-radius: 8px;
    }

    footer {
      background-color: #585858;
      padding: 2rem 0;
      text-align: center;
    }

    footer img {
      width: 75px;
      height: 75px;
    }

    .nav-logo img {
      width: 75px;
      height: 75px;
    }

    .nav-color {
      background-color: #000;
    }

    .limite {
      color: #D22424 !important;
      text-decoration: underline dashed;
    }

    @media (max-width: 767px) {
      .fmsr-poster {
        max-width: 200px;
        height: 200px;
        margin-top: 0.5em;
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
      <button class="navbar-toggler text-white border-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegação">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center text-center" id="navbarNav">
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="home_adm.html">Página Inicial</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Catálogo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="main_adm.html">Adicionar</a>
          </li>
        </ul>
        <!-- Menu -->
        <div class="dropdown nav-item ms-lg-auto w-100 w-lg-auto">
            <div class="d-flex justify-content-center justify-content-lg-end">
                <div class="dropdown">
                    <button
                    class="btn common-btn dropdown-toggle w-100 text-center text-lg-end px-3"
                    type="button"
                    id="adminDropdown"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    >
                    <i class="bi bi-stars"></i> Admin
                    </button>
                    <ul
                    class="dropdown-menu dropdown-menu-end w-100 text-center text-lg-end"
                    aria-labelledby="adminDropdown"
                    style="min-width:não definido;"
                    >
                    <li>                         
                      <a href="login.html" class="dropdown-item d-flex justify-content-between align-items-center px-3" >                                               
                      <span>Sair</span>
                      <i class="bi bi-box-arrow-right ms-2"></i>                         
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
  <div class="container my-5">
    <div class="card common-container borderless">
      <div class="card-header fs-5 title-font">Bem-vindo de volta</div>
      <div class="card-body">
        <p class="card-text">Veja a recomendação de filme e série da semana</p>
      </div>
    </div>
  </div>

  <!-- Carrossel de banners -->
  <div class="container my-5" id="banners-container">
    <div id="slider" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/conclave.jpg" class="d-block w-100 img-fluid" alt="Conclave" />
        </div>
        <div class="carousel-item">
          <img src="img/valetudo.jpg" class="d-block w-100 img-fluid" alt="Vale Tudo" />
        </div>
        <div class="carousel-item">
          <img src="img/peakyblinders.jpg" class="d-block w-100 img-fluid" alt="Peaky Blinders" />
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
  <div class="container">
    <div class="card-header fs-5 title-font">Minhas Assinaturas</div>
    <div id="carrosselAssinaturas" class="carousel slide mt-3" data-bs-ride="carousel">
      <div class="carousel-inner text-center">
        <!-- Primeira "página" de 3 imagens -->
        <div class="carousel-item active">
          <div class="row">
            <div class="col-4">
              <img src="img/avenidabrasil.jpg" class="d-block w-100 poster-img mx-auto" alt="Avenida Brasil">
            </div>
            <div class="col-4">
              <img src="img/valetudo.jpg" class="d-block w-100 poster-img mx-auto" alt="Vale Tudo">
            </div>
            <div class="col-4">
              <img src="img/peakyblinders.jpg" class="d-block w-100 poster-img mx-auto" alt="Peaky Blinders">
            </div>
          </div>
        </div>

        <!-- Segunda "página" de 3 imagens -->
        <div class="carousel-item">
          <div class="row">
            <div class="col-4">
              <img src="img/avenidabrasil.jpg" class="d-block w-100 poster-img mx-auto" alt="Avenida Brasil">
            </div>
            <div class="col-4">
              <img src="img/valetudo.jpg" class="d-block w-100 poster-img mx-auto" alt="Vale Tudo">
            </div>
            <div class="col-4">
              <img src="img/boskolooneytunes.jpg" class="d-block w-100 poster-img mx-auto" alt="Peaky Blinders">
            </div>
          </div>
        </div>

        <!-- Mais páginas de imagens conforme necessário -->
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
  </div>

  <!-- Rodapé -->
  <footer class="mt-5">
    <div class="nav-logo">
      <img src="../img/Logo_streaming(2).png" alt="Logo">
    </div>
    <p class="lh-1"><strong>Entre em contato:</strong> contact@cinehome.com</p>
    <p class="lh-1" style="font-size: small;">©️2025, Cinehome.com | Direitos Reservados</p>
  </footer>

  <!-- JS do Bootstrap -->
  <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
