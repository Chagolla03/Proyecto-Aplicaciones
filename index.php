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
    <?php
      session_start();
    ?>
    
    <header>
        <nav class="nav-container">
            <div class="logo">
                <img src="./assets/logo.png" alt="Logo de la empresa">
                <p>Autos BJX</p>
            </div>
            <ul class="nav-links">
                <li><a href="#">Inicio</a></li>
                <li><a href="#about">Acerca de</a></li>
                <li><a href="#services">Servicios</a></li>
                <li><a href="#contact">Contacto</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><a href="logout.php">Cerrar Sesión</a></li>
                <?php else: ?>
                    <li><a href="#" id="login-btn">Iniciar Sesión</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    
    <section class="hero-container">
        <div class="hero-title">
            <h1>Renta de Autos BJX</h1>
            <p>Encuentra el auto perfecto para tu viaje</p>
        </div>
        <img src="./assets/c1.png" alt="Imagen de ejemplo">
    </section>

    
    <section id="about" class="section">
        <h2>Acerca de Nosotros</h2>
        <div class="section-content">
            <div class="section-image">
                <img src="./assets/c4.jpg" alt="Acerca de nosotros">
            </div>
            <div class="section-text">
                <p>Somos una empresa dedicada a proporcionar los mejores vehículos para cualquier necesidad de transporte en el estado de Guanajuato. 
                    Con años de experiencia en el mercado, garantizamos la satisfacción de nuestros clientes ofreciendo un servicio de calidad y vehículos de alta gama.</p>
            </div>
        </div>
    </section>

    <?php
    include_once "database.php";

    try {
        //Realizamos la consulta
        $sql_select = 'SELECT * FROM carro';
        $stmt = $pdo->prepare($sql_select);
        $stmt->execute();

        //recuperamos los datos
        $carros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error en la consulta: " . $e->getMessage();
    }
    ?>

    <section id="services" class="content">
        <h2>Nuestros Servicios</h2>
        <p>Ofrecemos una amplia variedad de vehículos para todas tus necesidades de transporte.</p>

        <div class="content-data">
            <!-- Botones de filtro -->
            <div class="filter-buttons text-center pb-4">
                <p class="filter-text">Filtra por Categorias:</p>
                <button class="btn btn-outline-primary filter-btn active" data-filter="all">Mostrar Todos</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="Automóvil de Lujo">Automóvil de Lujo</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="Automóvil Intermedio">Automóvil Intermedio</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="Automóvil Eléctrico">Automóvil Eléctrico</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="Camioneta de Lujo">Camioneta de Lujo</button>
                <button class="btn btn-outline-primary filter-btn" data-filter="Camioneta Intermedia">Camioneta Intermedia</button>
            </div>

            <div class="row">
                <?php foreach ($carros as $registro): ?>
                    <div class="col-md-4 mb-4 filter-item" data-category="<?php echo $registro['car_categoria']; ?>">
                        <div class="card h-100 shadow-sm card-custom">
                            <img src="<?php echo $registro['car_imagen'] ?>" class="card-img-top" alt="Imagen de <?php echo $registro['car_modelo'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $registro['car_modelo'] ?></h5>
                                <p class="card-text text-muted"><?php echo $registro['car_categoria'] ?></p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Precio por día:</strong> $<?php echo number_format($registro['car_precio_dia'], 2); ?> MXN</li>
                                <li class="list-group-item"><strong>Placas:</strong> <?php echo $registro['car_placas'] ?></li>
                                <li class="list-group-item"><strong>Capacidad:</strong> <?php echo $registro['car_capacidad'] ?> pasajeros</li>
                            </ul>
                            <div class="card-body text-center">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <a href="renta.php?id=<?php echo $registro['car_id'] ?>" class="btn btn-primary">Rentar</a>
                                <?php else: ?>
                                    <a href="#" class="btn btn-primary" onclick="alert('Debe iniciar sesión para rentar un vehículo.');">Rentar</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section id="contact" class="section">
        <h2>Contacto</h2>
        <div class="section-content">
            <div class="section-image">
                <img src="./assets/c2.jpg" alt="Contacto">
            </div>
            <div class="section-text">
                <p>Somos una empresa dedicada a proporcionar los mejores vehículos para cualquier necesidad de transporte en el estado de Guanajuato. 
                    Con años de experiencia en el mercado, garantizamos la satisfacción de nuestros clientes ofreciendo un servicio de calidad y vehículos de alta gama.</p>
            </div>
        </div>
    </section>

    <footer class="footer text-center">
    <div class="footer-section">
      <div class="logo">
        <img src="./assets/logo.png" alt="Logo de la empresa">
        <p>Autos BJX</p>
      </div>
      <div class="social-icons">
        <a href="#"><img src="./assets/facebook.svg" alt="Facebook"></a>
        <a href="#"><img src="./assets/instagram.svg" alt="Instagram"></a>
        <a href="#"><img src="./assets/youtube.svg" alt="YouTube"></a>
        <a href="#"><img src="./assets/twitter.svg" alt="Twitter"></a>
      </div>
    </div>
    <div class="separator"></div>
    <div class="footer-section">
      <div class="footer-links">
        <h5>Gestiona tu reserva</h5>
        <a onClick="window.location.href='detalle.php'" href="#">Revisar mis Reservaciones</a>
        <a href="#">Facturación</a>
        <a href="#">Obtener promociones</a>
      </div>
      <div class="footer-links">
        <h5>Más información</h5>
        <a href="#">Políticas y requisitos de renta</a>
        <a href="#">Formas de pago</a>
        <a href="#">Aviso de Privacidad</a>
        <a href="#">Preguntas Frecuentes</a>
      </div>
      <div class="footer-links">
        <h5>Contáctanos</h5>
        <p>Reservaciones: +52 462 123 7337</p>
        <p>Servicio al cliente: +52 462 123 7337</p>
        <p>contacto@autosbjx.com</p>
        <p>Atención por WhatsApp</p>
      </div>
    </div>
    <div class="separator"></div>
    <div class="footer-section">
      <h5>Formas de pago</h5>
      <img style="filter: invert(1);" src="./assets/visa.png" alt="Visa">
      <img style="filter: invert(1);" src="./assets/mastercard.png" alt="MasterCard">
      <img style="filter: invert(1);" src="./assets/amex.png" alt="American Express">
      <img style="filter: invert(1);" src="./assets/paypal.png" alt="Paypal">
      <img src="./assets/esr.png" alt="ESR">
      <img src="./assets/safe-travels.png" alt="Safe Travels">
    </div>
  </footer>

    <!-- Formulario de inicio de sesión modal -->
    <div class="modal" tabindex="-1" id="loginModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="login.php" method="post">
                        <div class="form-group">
                            <input type="email" placeholder="Ingresa tu correo electónico" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Ingresa tu contraseña" name="password" class="form-control">
                        </div>
                        <div class="form-btn">
                            <input type="submit" value="Iniciar Sesión" name="login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>¿No tienes una cuenta? <a href="registration.php">Regístrate</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('login-btn').addEventListener('click', function() {
            var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();
        });

        // Función para los filtros
        document.addEventListener('DOMContentLoaded', function () {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const filterItems = document.querySelectorAll('.filter-item');

            function filterItemsByCategory(filterValue) {
                filterItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // Iniciamos con el boton "Todos" activo
            filterItemsByCategory('all');

            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remueve la clase active de todos los botones
                    filterButtons.forEach(btn => btn.classList.remove('active'));

                    // Agrega la clase active al botón seleccionado
                    button.classList.add('active');

                    const filterValue = button.getAttribute('data-filter');
                    filterItemsByCategory(filterValue);
                });
            });
        });
    </script>
</body>
</html>
