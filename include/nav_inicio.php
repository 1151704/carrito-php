<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Domicilios.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Inicio
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Ingreso</a>
                </li>
                <li class="nav-item">
                    <a href="carro.php" class="btn btn-primary">
                        Carrito <span class="badge badge-light"><?php echo isset($_SESSION["carrito"]) ? sizeof($_SESSION["carrito"]) : 0 ?></span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>