<?php
$from = new DateTime('1997-03-13');
$to = new DateTime('today');
$edad = $from->diff($to)->y;
?>
<!DOCTYPE html>
<html class="no-js" lang="es">

<head>

    <meta charset="utf-8">
    <title>CV</title>
    <meta name="description" content="My CV">
    <meta name="author" content="Alexis">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css/media-queries.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <script src="https://kit.fontawesome.com/10ae283bae.js"></script>
    <script defer src="js/modernizr.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/starback@2.1.1/dist/starback.global.js"></script>

    <link rel="shortcut icon" href="favicon.ico">
</head>

<body onload="test2()">
<canvas id="canvas"></canvas>

<header id="home">


    <nav id="nav-wrap">

        <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show navigation</a>
        <a class="mobile-btn" href="#" title="Hide navigation">Hide navigation</a>

        <ul id="nav" class="nav">
            <li class="current"><a class="smoothscroll" href="#home">Home</a></li>
            <li><a class="smoothscroll" href="#about">Acerca</a></li>
            <li><a class="smoothscroll" href="#resume">Curriculum</a></li>
            <li><a class="smoothscroll" href="#portfolio">Portafolio</a></li>
        </ul>

    </nav>

    <div class="row banner">
        <div class="banner-text">
            <h1 class="responsive-headline neonText">Soy <span class="border-0"><img class="sq-com"
                                                                                     src="images/sqcompass.webp"></span>lexis
                Garcia</a>.</h1>

            <h3 class="neonText">
                <span class="typed"
                      data-typed-items="WebDev, GameDev, Dev, Una Mente Creativa y De Buenas Costumbres"></span>
                <hr/>
                <h2><a class="smoothscroll neonText" href="#about">Quien soy yo?.</a></h2>
            </h3>

            <hr/>
            <ul class="social">
                <li><a href="https://www.linkedin.com/in/alexis-garc%C3%ADa-6019a817b/"><i
                            class="fa fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/reptilian_hacker/"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://github.com/M00rphy"><i class="fa fa-github"></i></a></li>
            </ul>
        </div>
    </div>

    <p class="scrolldown">
        <a class="smoothscroll" href="#about"><i class="icon-down-circle"></i></a>
    </p>

</header>

<section id="about">

    <div class="row">

        <div class="three columns">

            <img class="profile-pic" src="images/profilepic.png" alt=""/>

        </div>

        <div class="nine columns main-col">

            <h2>Acerca de mi.</h2>

            <p class="aboutme">
                Tengo <?php echo $edad ?> años, y cuento con experiencia en varias tecnologías Web.
            </p>

            <div class="row">

                <div class="columns contact-details">

                    <h2>Lugar de contacto</h2>
                    <p class="address">
                        <span>Alexis García</span><br>
                        <span>Atenco #25,<br>
                                Col. Prado Ixtacala, Tlalnepantla de Baz, Estado de México
                            </span><br>
                        <span>(+52) 55 3401 7838</span><br>
                        <span>algpjw@gmail.com</span>
                    </p>

                </div>

                <div class="columns download">
                    <p>
                        <a href="inc/CV.pdf" class="button"><i class="fa fa-download"></i>Descargar Curriculum</a>
                        <!--a href="inc/cvTemp.html" class="button"><i class="fa fa-download"></i>Descargar Curriculum</a-->
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>

<section id="resume">

    <div class="row education">

        <div class="three columns header-col">
            <h1><span>Educación</span></h1>
        </div>

        <div class="nine columns main-col">

            <div class="row item">

                <div class="twelve columns">

                    <h3>Instituto Tecnológico de Tlalnepantla</h3>
                    <p class="info">Ingeniería en Tecnologías de Información y Comunicaciones <span>&bull;</span>
                        <em class="date">2016 - Trunca.</em>
                    </p>

                </div>

            </div>

            <div class="row item">

                <div class="twelve columns">

                    <h3>Microsoft Office Specialist</h3>
                    <p class="info">Certificación como Especialista en manejo de Excel 2010 <span>&bull;</span> <em
                            class="date">March
                            2003</em></p>
                </div>

            </div>

        </div>

    </div>


    <div class="row work">

        <div class="three columns header-col">
            <h1><span>Trabajo</span></h1>
        </div>

        <div class="nine columns main-col">

            <div class="row item">

                <div class="twelve columns">
                    <div id="jobExp">
                        <h3>Desarrollador Independiente de VideoJuegos</h3>
                        <p class="info">Desarrollador líder <span>&bull;</span> <em class="date">Junio 2013 -
                                Presente</em></p>
                        <p class="info">Diseñador líder <span>&bull;</span> <em class="date">Junio 2013 -
                                Presente</em></p>
                        <p class="info">Líder de proyecto <span>&bull;</span> <em class="date">Junio 2013 -
                                Presente</em></p>
                        <p class="info">Scoring <span>&bull;</span> <em class="date">Enero 2018 -
                                Presente</em></p>
                        <p class="info">Compositor <span>&bull;</span> <em class="date">Enero 2018 -
                                Presente</em></p>
                        <p class="info">Animador <span>&bull;</span> <em class="date">Junio
                                2013 -
                                Presente</em></p>


                        <h3>Desarrollador en Nomanches</h3>
                        <p class="info">Desarrollador web líder <span>&bull;</span> <em class="date">Febrero 2018 -
                                Presente</em></p>
                    </div>


                </div>

            </div>

        </div>

    </div>


    <div class="row skill">

        <div class="three columns header-col">
            <h1><span>Habilidades</span></h1>
        </div>

        <div class="nine columns main-col">

            <table id="skillset">
            </table>

            <p>Aparte de programar, tengo otros hobbies en los que me he ido desenvolviendo,
                <br>
                <span>tales como: </span>
            </p>

            <div class="bars">

                <ul class="skills">
                    <li><span class="bar-expand skill16"></span><em>Photoshop</em></li>
                    <li><span class="bar-expand skill15"></span><em>Adobe After Effects</em></li>
                    <li><span class="bar-expand skill16"></span><em>Adobe Premiere</em></li>
                    <li><span class="bar-expand skill12"></span><em>Producción y edición de Audio</em></li>
                </ul>

            </div>

        </div>

    </div>

</section>


<section id="portfolio">

    <div class="row">

        <div class="twelve columns collapsed">

            <h1>Hechale un vistazo a algunos de mis trabajos.</h1>

            <div id="portfolio-wrapper" class="bgrid-quarters s-bgrid-thirds cf">

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#TheSource" title="TheSource">
                            <img alt="" src="images/portfolio/TheSource.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>TheSource</h5>
                                    <p>VideoJuego</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#raycaster" title="Raycaster">
                            <img alt="" src="images/portfolio/et.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Raycaster</h5>
                                    <p>Videojuego</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#fractal" title="FractalTrees">
                            <img alt="" src="images/portfolio/fractal.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Fractal Trees</h5>
                                    <p>Web Maths</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#intersection" title="LineIntersection">
                            <img alt="" src="images/portfolio/line.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Line Intersection</h5>
                                    <p>Web Maths</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#crud" title="CRUD">
                            <img alt="" src="images/portfolio/crud.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Sistema CRUD con PHP</h5>
                                    <p>Sistema</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#frameworks" title="FrameworksJS">
                            <img alt="" src="images/portfolio/frameworks.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>FrameworksJS</h5>
                                    <p>Web Dev</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#oxen" title="oxen">
                            <img alt="" src="images/portfolio/oregon.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Oxen</h5>
                                    <p>Videojuego</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

                <div class="columns portfolio-item">
                    <div class="item-wrap">

                        <a href="#atariGames" title="Atari Games">
                            <img alt="" src="images/portfolio/atari.png">
                            <div class="overlay">
                                <div class="portfolio-item-meta">
                                    <h5>Juegos de Atari 2600</h5>
                                    <p>Videojuego</p>
                                </div>
                            </div>
                            <div class="link-icon"><i class="icon-plus"></i></div>
                        </a>

                    </div>
                </div>

            </div>

        </div>

        <div id="TheSource" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-TheSource.png" alt=""/>

            <div class="description-box">
                <h4>TheSource</h4>
                <p>TheSource es un juego de plataformas (WIP), de acción y exploración en un mundo fantastico.</p>
                <span class="categories"><i class="fa fa-tag"></i>GameDev, WebDev</span>
            </div>

            <div class="link-box">
                <a href="projects/TheSource/index.html">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>

        <div id="raycaster" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-et.png" alt=""/>

            <div class="description-box">
                <h4>Raycaster</h4>
                <p>Un juego viejo tipo Raycaster en donde ET es el enemigo principal.</p>
                <span class="categories"><i class="fa fa-tag"></i>GameDev, WebDev</span>
            </div>

            <div class="link-box">
                <a href="projects/a_trippy_doom/index.html">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>

        <div id="fractal" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-fractal.png" alt=""/>

            <div class="description-box">
                <h4>Fractal Trees</h4>
                <p>Arboles Fractales hechos con puro Javascript.</p>
                <span class="categories"><i class="fa fa-tag"></i>Web Development</span>
            </div>

            <div class="link-box">
                <a href="projects/fractalTree/index.html">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>

        <div id="intersection" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-line.png" alt=""/>

            <div class="description-box">
                <h4>Line Intersection</h4>
                <p>Un pequeño programa para calcular y demostrar la intersección de dos lineas.</p>
                <span class="categories"><i class="fa fa-tag"></i>Web Maths</span>
            </div>

            <div class="link-box">
                <a href="projects/lineIntersect/index.html">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>

        <div id="crud" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-crud.png" alt=""/>

            <div class="description-box">
                <h4>Sistema CRUD con PHP</h4>
                <p>Un sistema CRUD hecho con PHP puro.</p>
                <span class="categories"><i class="fa fa-tag"></i>Back End</span>
            </div>

            <div class="link-box">
                <a href="projects/login/login.php">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>

        <div id="frameworks" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-frameworks.png" alt=""/>

            <div class="description-box">
                <h4>FrameworksJS</h4>
                <p>Pruebas y demostraciones del uso de frameworks de Javascript.</p>
                <span class="categories"><i class="fa fa-tag"></i>Web, Development</span>
            </div>

            <div class="link-box">
                <a href="projects/Frameworks/index.html">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>

        <div id="oxen" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-oregon.png" alt=""/>

            <div class="description-box">
                <h4>Oxen</h4>
                <p>Mi versión del juego clásico de Oregon Trail.</p>
                <span class="categories"><i class="fa fa-tag"></i>GameDev, WebDev</span>
            </div>

            <div class="link-box">
                <a href="projects/oregonTrail/index.html">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>

        <div id="atariGames" class="popup-modal mfp-hide">

            <img class="scale-with-grid" src="images/portfolio/modals/m-atari.png" alt=""/>

            <div class="description-box">
                <h4>Juegos de Atari 2600</h4>
                <p>Juegos de Atari 2600 desarrollados por mi.</p>
                <span class="categories"><i class="fa fa-tag"></i>GameDev, WebDev</span>
            </div>

            <div class="link-box">
                <a href="projects/atari/index.php">Jugar</a>
                <a class="popup-modal-dismiss">Cerrar</a>
            </div>

        </div>


    </div>

</section>


<footer>

    <div class="row">

        <div class="twelve columns">

            <ul class="social-links">
                <li><a href="https://www.linkedin.com/in/alexis-garc%C3%ADa-6019a817b/"><i
                            class="fa fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/reptilian_hacker/"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://github.com/M00rphy"><i class="fa fa-github"></i></a></li>
            </ul>

            <div class="banner" style="color: #FFFFFF">
                <ul class="copyright">
                    <li>&copy; Copyright <?php echo date("Y") ?></li>
                    <br>
                    <p style="align: center">LX - LXMOr</p>
                </ul>
            </div>

        </div>

        <div id="go-top"><a class="smoothscroll" title="Back to Top" href="#home"><i class="icon-up-open"></i></a>
        </div>

    </div>

</footer>

<script defer src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script defer src="js/jquery-1.10.2.min.js"><\/script>')
</script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

<script defer src="js/jquery.flexslider.js"></script>
<script defer src="js/waypoints.js"></script>
<script defer src="js/jquery.fittext.js"></script>
<script defer src="js/magnific-popup.js"></script>
<script defer src="js/init.js"></script>
<script defer src="js/print.js"></script>
<script defer src="js/typed.js/typed.min.js"></script>

<script defer src="js/space.js"></script>

</body>

</html>
