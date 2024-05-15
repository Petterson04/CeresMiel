
<!DOCTYPE html>
<html lang="es">
   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href="css/Principal.css"  rel="stylesheet">
</head>
<body>
    <header>
        <div class="Perfil">
            <?php
                include("base.php");
                session_start();
                if (isset($_SESSION['correo'])) {
                    $correo=$_SESSION['correo'];
                    echo $correo;
                } else {
                    echo '';
                }
            ?>
        </div>
        <nav id="Navegacion" class="contenedor">

            
            <a href="index.php">Pagina Principal</a>
            <a href="productos.php">productos</a>
            <?php if(isset($_SESSION['correo'])): ?>
            <a href="./Administrador/Cerrar_sesion.php">Cerrrar sesion</a>
            <?php else:?>
            <a href="login.html"> Login</a>
            <a href="Registro.html">Registro</a>
           
            <?Php endif;?>
            
        </nav>
    </header>
    <h1>Ceres</h1>
    
    <section id="Mision">
        <h2 class="Mision">Mision</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos, culpa architecto alias animi ipsam fugit neque error rerum tempora quis deleniti odio, ullam voluptatibus fugiat maiores, officia repudiandae. Culpa, consequatur!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta nam explicabo rem quibusdam necessitatibus voluptatem, tempora aliquid ipsum ducimus quia consectetur vel tempore. Deserunt cupiditate, in tenetur illum laboriosam provident!</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima voluptates sequi cum harum exercitationem cumque debitis aspernatur? Atque cumque fuga eum recusandae, saepe exercitationem nihil, obcaecati odit dicta animi quos.</p>
    </section>
    <section id="Vision">
        <h2 class="Vision"> Vision </h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur voluptatem ipsa culpa iste dignissimos, quo aliquam. Et, id illum unde laborum, officia dolor quod vitae consequatur aperiam cum reprehenderit non?</p>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias, natus officiis blanditiis quia dolore pariatur impedit quae placeat numquam nesciunt, inventore corporis. Earum incidunt ducimus magnam exercitationem sunt quaerat minus?</p>
        <p>
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veniam ad quia asperiores, veritatis at aperiam deleniti ratione eos animi itaque obcaecati necessitatibus reiciendis non iusto eius atque recusandae officia consequatur.
        </p>
    </section>
    <div class="slider"><!--
        <ul>
            <li>
                <img src="imagenes/Logo.jpg"> 
            </li>
            <li>
                <img src="./imagenes/CARRUSEL2.jpeg">
            </li>
            <li>
                <img src="./imagenes/CARRUSEL3.jpeg">
            </li>
            <li>
                <img src="./imagenes/CARRUSEL4.jpeg">
            </li>
        </ul>
    </div>-->
    <footer>
        <p>Redes sociales </p>
    </footer>

</body>
</html>