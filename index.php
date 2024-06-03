<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Autos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <style>
        .card-custom {
            background-color: #f8f9fa; /* Gris desvanecido */
        }
        .card-custom img {
            height: 200px;
            object-fit: cover;
        }

        .filter-buttons .btn {
            margin: 0.5rem;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="nav-container">
                <div class="logo">
                    <img src="./assets/logo.png" alt="Logo de la empresa">
                </div>
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#about">Acerca de</a></li>
                    <li><a href="#services">Servicios</a></li>
                    <li><a href="#contact">Contacto</a></li>
                    <li><a href="login.php">Iniciar Sesion</a></li>
                    
                </ul>
            </div>
        </nav>
    </header>
    
    <div class="hero-container">
        <div class="image-container">
            <div class="title">
                <h1>Renta de Autos BJX</h1>
                <p>Encuentra el auto perfecto para tu viaje</p>
            </div>
            <img src="./assets/c1.png" alt="Imagen de ejemplo">
        </div>
    </div>
    
    <section id="about" class="about">
        <div class="about-container">
            <h2>Acerca de Nosotros</h2>
            <div class="about-content">
                <div class="about-image">
                    <img src="./assets/c4.jpg" alt="Acerca de nosotros">
                </div>
                <div class="about-text">
                    <p>Somos una empresa dedicada a proporcionar los mejores vehículos para cualquier necesidad de transporte en el estado de Guanajuato. 
                        Con años de experiencia en el mercado, garantizamos la satisfacción de nuestros clientes ofreciendo un servicio de calidad y vehículos de alta gama.</p>
                </div>
            </div>
        </div>
    </section>

    
    <?php
      include_once "database.php";

      try{
        //Realizamos la consulta
        $sql_select = 'SELECT * FROM carro';
        $stmt = $pdo->prepare($sql_select);
        $stmt->execute();

        //recuperamos los datos
        $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);        
      } catch(PDOException $e){
        echo "Error en la consulta: " . $e->getMessage();
      }
      ?>



    <section id="services" class="content">
        <h2>Nuestros Servicios</h2>
        <p>Ofrecemos una amplia variedad de vehículos para todas tus necesidades de transporte.</p>

        <div class="container mt-5">
        <!-- Botones de filtro -->
        <div class="filter-buttons text-center mb-4">
            <button class="btn btn-outline-primary filter-btn" data-filter="all">Todos</button>
            <button class="btn btn-outline-primary filter-btn" data-filter="Automóvil de Lujo">Automóvil de Lujo</button>
            <button class="btn btn-outline-primary filter-btn" data-filter="Automóvil Intermedio">Automóvil Intermedio</button>
            <button class="btn btn-outline-primary filter-btn" data-filter="Automóvil Eléctrico">Automóvil Eléctrico</button>
            <button class="btn btn-outline-primary filter-btn" data-filter="Camioneta de Lujo">Camioneta de Lujo</button>
            <button class="btn btn-outline-primary filter-btn" data-filter="Camioneta Intermedia">Camioneta Intermedia</button>
        </div>
        
        <div class="row">
            <?php foreach($carros as $registro){  ?>
                <div class="col-md-4 mb-4 filter-item" data-category="<?php echo $registro['car_categoria']; ?>">
                    <div class="card h-100 shadow-sm card-custom">
                        <img src="<?php echo $registro['car_imagen']?>" class="card-img-top" alt="Imagen de <?php echo $registro['car_modelo']?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $registro['car_modelo']?></h5>
                            <p class="card-text text-muted"><?php echo $registro['car_categoria']?></p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Precio por día:</strong> $<?php echo number_format($registro['car_precio_dia'], 2); ?> MXN</li>
                            <li class="list-group-item"><strong>Placas:</strong> <?php echo $registro['car_placas']?></li>
                            <li class="list-group-item"><strong>Capacidad:</strong> <?php echo $registro['car_capacidad']?> pasajeros</li>
                        </ul>
                        <div class="card-body text-center">
                            <a href="#" class="btn btn-primary">Rentar</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>


</section>

    <section id="contact" class="about">
        <div class="about-container">
            <h2>Contacto</h2>
            <div class="about-content">
                <div class="about-image">
                    <img src="./assets/c2.jpg" alt="Contacto">
                </div>
                <div class="about-text">
                    <p>Somos una empresa dedicada a proporcionar los mejores vehículos para cualquier necesidad de transporte en el estado de Guanajuato. 
                        Con años de experiencia en el mercado, garantizamos la satisfacción de nuestros clientes ofreciendo un servicio de calidad y vehículos de alta gama.</p>
                </div>
            </div>
        </div>
    </section>



    <script src="./js/index.js"></script>
    <script>
        //Función para los filtros
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const filterItems = document.querySelectorAll('.filter-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filterValue = button.getAttribute('data-filter');

            filterItems.forEach(item => {
                if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
});
    </script>
</body>
</html>
