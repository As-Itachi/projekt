<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Knjižara</a>
        <button
            class="navbar-toggler d-lg-none"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#collapsibleNavId"
            aria-controls="collapsibleNavId"
            aria-expanded="false"
            aria-label="Toggle navigation"
>
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#" aria-current="page">Hauptseite</a>
                </li>
                <?php if(isset($_SESSION['email'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./profil/">Benutzerprofil</a>
                </li>
                <?php } else {?>
                <li class="nav-item">
                    <a class="nav-link" href="./login.php">Anmelden</a>
                </li>
                <?php } ?>
            </ul>
            <a class="nav-link" href="./logout.php">Abmelden</a>
        </div>
    </div>
</nav>
