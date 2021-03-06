<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="Page description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">

  <link href="./assets/apple-icon-180x180.png" rel="apple-touch-icon">
  <link href="./assets/favicon.ico" rel="icon">

  <link href="css/main.82cfd66e.css" rel="stylesheet">
  <link href="css/my-style.css" rel="stylesheet">

  <title><?php echo $title; ?></title>
</head>

<body>

<!-- Add your content of header -->
<header class="">
  <div class="navbar navbar-default visible-xs">
    <button type="button" class="navbar-toggle collapsed">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a href="./index.html" class="navbar-brand">Lugares a ir</a>
  </div>

  <nav class="sidebar">
    <div class="navbar-collapse" id="navbar-collapse">
      <div class="site-header hidden-xs">
          <a class="site-brand" href="./index.html" title="">
            <img class="img-responsive site-logo" alt="" src="./assets/images/mashup-logo.svg">
            Lugares a ir
          </a>
        <p>Veja e compartilhe fotos de lugares especias bons para passeios.</p>
      </div>

      <form action="" class="reveal-content">
        <div class="row mt-3">
          <div class="form-group">
              <input type="buscar" class="form-control" id="email" placeholder="Pequise pessoas ou lugares">
          </div>
          <button type="submit" class="btn btn-info">Buscar</button>
        </div>
      </form>

      <nav class="nav-footer">
        <p>© Lugares a ir | Website created with <a href="http://www.mashup-template.com/" title="Create website with free html template">Mashup Template</a>/<a href="https://www.unsplash.com/" title="Beautiful Free Images">Unsplash</a></p>
        <p class="nav-footer-social-buttons">
          <a class="fa-icon" href="https://www.instagram.com/" title="">
            <i class="fa fa-instagram"></i>
          </a>
          <a class="fa-icon" href="https://dribbble.com/" title="">
            <i class="fa fa-facebook"></i>
          </a>
          <a class="fa-icon" href="https://twitter.com/" title="">
            <i class="fa fa-twitter"></i>
          </a>
          <a class="fa-icon" href="https://twitter.com/" title="">
            <i class="fa fa-github"></i>
          </a>
        </p>
      </nav>
    </div>
  </nav>
</header>
<main class="" id="main-collapse">

<!-- Add your site or app content here -->

<div class="row">
  <div class="col-xs-12">
    <div class="section-container-spacer">
      <h1>Criar conta</h1>
      <p>Preencha todos os dados com cuidado.</p>
    </div>

    <div class="section-container-spacer">
       <form class="reveal-content" action="<?=base_url('criar-conta');?>" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">

              <!-- validation erros -->
              <?php if (!empty($erros)): ?>
                <div class="alert alert-<?=$class_error?>" role="alert">
                    <?php foreach ($erros as $erro): ?>
                        <?=$erro?>
                    <?php endforeach;?>
                </div>
              <?php endif?>

              <?php if (!empty($msg)): ?>
                <div class="alert alert-<?=$class_error?>" role="alert">
                  <?=$msg?>
                  <a href="<?=base_url('login')?>" class="btn btn-primary btn-sm">Fazer login</a>
                </div>
              <?php endif?>
              <!-- validation erros -->

              <div class="form-group">
                <input type="text" name="nome" class="form-control" value="<?php echo (isset($_POST['nome'])) ? $_POST['nome'] : ''?>" placeholder="Nome">
              </div>
              <div class="form-group border">
                <input type="file" class="custom-file-input" value="<?php echo (isset($_POST['img_perfil'])) ? $_POST['img_perfil'] : ''?>" name="img_perfil" id="input-img"/>
                <i class="fa fa-picture-o fa-2x" style="padding-right: 10px;"></i>
                <label class="custom-file-label" id="file-name">Selecione uma foto de perfil</label>
              </div>
              <div class="form-group">
                <input type="text" name="email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''?>" class="form-control" placeholder="email">
              </div>
              <div class="form-group">
                <input type="password" name="senha" value="<?php echo (isset($_POST['senha'])) ? $_POST['senha'] : ''?>" class="form-control" placeholder="Crie sua senha">
              </div>
              <div class="form-group">
                <input type="password" name="conf_senha" class="form-control" placeholder="Confirme sua senha">
              </div>
              <button type="submit" class="btn btn-info btn-lg">Criar conta</button>

              <div class="section-container-spacer mt-5">
                <p>Já possui uma conta?</p>
                <h1>Faça login</h1>
                <a href="<?php echo base_url('login'); ?>" class="btn btn-primary btn-lg">Fazer login</a>
              </div>
            </div>

            <div class="col-md-6">
              <img class="img-responsive site-logo" alt="" src="https://picsum.photos/500/300?random=1">
              <h3>Compartilhe com seus amigos locais que você visitou, cite a região e nome pelo qual é conhecido, adicione uma descrição e imagens. Simples assim!</h3>
            </div>
          </div>
        </form>
    </div>

  </div>
</div>

<!-- End main -->

</main>

<script>
    document.addEventListener("DOMContentLoaded", function (event) {
    navbarToggleSidebar();
    navActivePage();
    });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID
<script>
  (function (i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
      (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date(); a = s.createElement(o),
      m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
  })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-XXXXX-X', 'auto');
  ga('send', 'pageview');
</script> -->
<!-- Bootstrap js components -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Bootstrap js components -->

<script type="text/javascript" src="js/main.85741bff.js"></script>
</body>
</html>
