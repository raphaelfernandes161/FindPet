<?php
    $row['img'] = 'profile.jpg';
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <title>FindPet</title>
            <meta charset="UTF-8">
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <!--Import Favicon-->
            <link rel="icon" href="favicon.ico" type="image/x-icon"/>
            <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon"/>

            <!--Import Jquery-->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <!--Máscara-->
            <script src="js/jquery.maskedinput.js"></script>

            <!--Import Materialize-->
            <link rel="stylesheet" href="css/materialize.css" media="screen,projection">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

            <!--Import Noty-->
            <link href="css/noty.css" rel="stylesheet">
            <script src="js/noty.min.js" type="text/javascript"></script>     

            <!--Import Slim-->
            <link href="css/slim.min.css" rel="stylesheet">
            <script src="js/slim.kickstart.min.js" type="text/javascript"></script>

            <!--Import Style-->
            <link rel="stylesheet" type="text/css" href="css/style.css">
            
            <script>
                $(document).ready(function(){
                    $('.slider').slider();
                    //$(".dropdown-button").dropdown();
                    $(".button-collapse").sideNav();
                    $('.dropdown-button').dropdown({
                        inDuration: 300,
                        outDuration: 225,
                        constrainWidth: false, // Does not change width of dropdown to that of the activator
                        //hover: true, // Activate on hover
                        gutter: 0, // Spacing from edge
                        belowOrigin: false, // Displays dropdown below the button
                        alignment: 'left', // Displays dropdown with edge aligned to the left of button
                        stopPropagation: false // Stops event propagation
                    });
                });           
            </script>
        </head>
        <body>
            <?php 
                $logado = "false";
                if(isset($_SESSION['id'])) {
                    $logado = "true";
                }
            ?>
            <script type="text/javascript">
                function notificar(tipo, msg){
                    new Noty({
                        theme: 'relax',
                        type: tipo,
                        layout: 'topRight',
                        text: msg,
                        timeout: 2000
                    }).show();
                }
                function login() {
                    if (<?php echo $logado; ?>) {
                        window.location = 'perfil.php';
                    } else {
                        window.location = 'cadastro.php';
                    }
                }
            </script>
            
            <ul id="dropdown2" class="dropdown-content">
                <li><a href="adotar.php">Adotar</a></li>
                <li><a href="doacao.php">Doar</a></li>
                <li><a href="perdido.php">Perdi Meu Pet</a></li>
                <li><a href="encontrado.php">Encontrei Um Pet</a></li> 
            </ul>
            <ul id="dropdown3" class="dropdown-content">
                <li><a href="perfil.php">Meu Perfil</a></li>
                <li><a href="meuspets.php">Meus Pets</a></li>
                <li><a href="ajax/logoff.php">Sair</a></li>
            </ul>
            
            <ul id="dropdown4" class="dropdown-content">
                <li><a href="depoimentos.php">Depoimentos</a></li>
                <li><a href="ajude-nos.php">Ajude-nos</a></li>
                <li><a href="sobre.php">Sobre</a></li>
            </ul>
            
            <div class="row">
                <div class="navbar-fixed">
                    <nav id="navbar">
                        <div class="nav-wrapper">
                            <img src="img/Logo.svg" class="logo">
                            <a href="index.php" class="brand-logo">FindPet</a>
                            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                            <ul id="nav-mobile" class="right hide-on-med-and-down"><!-- Navbar computador -->                        
                                <li><a href="index.php"><i class="material-icons left">home</i>Pagina Inicial</a></li>
                                <li><a href="mapa.php"><i class="material-icons left">location_on</i>Mapa dos Pets</a></li>
                                <li><a class="dropdown-button" href="#" data-activates="dropdown2">Serviços<i class="material-icons right">arrow_drop_down</i></a></li>
                                <li><a class="dropdown-button" href="#" data-activates="dropdown4">Comunidade<i class="material-icons right">arrow_drop_down</i></a></li>
                                <ul class="right hide-on-med-and-down" id="areaLogin">
                                    <li><a href="javascript:;" onclick="login()">Cadastrar/Entrar<img class="avatar" id="avatarnavbar" src="img/<?php echo $row['img']; ?>"></a></li>
                                </ul>
                            </ul>
                            <ul class="side-nav" id="mobile-demo"><!-- Navbar mobile -->
                                <li id="areaLoginMobile">
                                    <div class="user-view">
                                        <div class="background">
                                            <a href="javascript:;" onclick="login()">
                                                <img src="img/ground.png">
                                            </a>
                                        </div>
                                        <?php if(isset($_SESSION['img'])) { ?> <a href="javascript:;" onclick="login()"><img class="circle" src="img/<?php echo $_SESSION['img']; ?>"></a> <?php } ?>
                                        <a href="javascript:;" onclick="login()"><span class="white-text name">Cadastro/Entrar</span></a>
                                    </div>
                                </li>
                                <li><a class="dropdown-button" href="#" data-activates="dropdown1">Serviços<i class="material-icons right">arrow_drop_down</i></a></li>
                                <li><a class="dropdown-button" href="#" data-activates="dropdown5">Comunidade<i class="material-icons right">arrow_drop_down</i></a></li>
                                <?php if(isset($_SESSION['id'])){ ?>
                                <li><a href="meuspets.php"><i class="material-icons left">pets</i>Meus Pets</a></li>
                                <?php } ?>
                                <li><a href="mapa.php"><i class="material-icons left">location_on</i>Mapa dos Pets</a></li>

                                <ul id="dropdown1" class="dropdown-content">
                                    <li><a href="doacao.php">Doar</a></li>
                                    <li><a href="adotar.php">Adotar</a></li>
                                    <li><a href="perdido.php">Perdi meu pet</a></li> 
                                    <li><a href="encontrado.php">Encontrei um pet</a></li> 
                                </ul>
                                
                                  <ul id="dropdown5" class="dropdown-content">
                                    <li><a href="depoimentos.php">Depoimentos</a></li>
                                    <li><a href="ajude-nos.php">Ajude-nos</a></li>
                                    <li><a href="sobre.php">Sobre</a></li>
                                </ul>
                                
                                <ul class="right hide-on-med-and-down" id="areaLogin">
                                    <li><a href="javascript:;" onclick="login()"><i class="large material-icons right">account_circle</i>Cadastrar/Entrar</a></li>
                                </ul>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <?php
                if(isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $nome = $_SESSION['nome'];
                    $img = $_SESSION['img'];
            ?>
            <script type="text/javascript">
                $("#areaLogin").html('<li><a class="dropdown-button" data-activates="dropdown3" href="javascript:;"><spam class="nomedousuario"><?php echo $nome; ?></spam><img class="avatar" id="avatarnavbarlogado" src="img/<?php echo $img; ?>"></a></li>');
                $("#areaLoginMobile").html('<div class="user-view"><div class="background"><a href="javascript:;" onclick="login()"><img src="img/ground.png"></a></div><a href="javascript:;" onclick="login()"><img class="circle" src="img/<?php echo $img; ?>"></a><a href="javascript:;" onclick="login()"><span class="white-text name"><?php echo $nome; ?></span></a></div>');
                $("#mobile-demo").append('<li><a href="ajax/logoff.php"><i class="material-icons left">exit_to_app</i>Sair</a></li>');
            </script>
            <?php  } ?>