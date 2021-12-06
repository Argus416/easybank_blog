<?php
    use App\Controllers\ConnexionController;
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= $urlGenerator->generate('accueil') ?>">
                <img src="<?= "$domain$public"?>style/images/logo.svg" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $urlGenerator->generate('accueil') ?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $urlGenerator->generate('blog') ?>"">Blog</a>
                    </li>
                    <li class=" nav-item">
                            <a class="nav-link" href="<?= $urlGenerator->generate('contact') ?>">Nous Contacter</a>
                    </li>

                    <?php if(isset($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] != true ):?>
                    <li class=" nav-item-cus">
                        <a class="nav-link " href="<?= $urlGenerator->generate('login') ?>">Me
                            connecter</a>
                    </li>

                    <?php 
                        elseif(isset($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] == true ):
                        ConnexionController::Deconnexion();
                    ?>

                    <li class=" nav-item">
                        <a class="nav-link" href="<?= $urlGenerator->generate('articlesManagement') ?>">Dashboard</a>
                    </li>
                    <li class="nav-link">
                        <form method="POST" class="form-deconnexion">
                            <input type="submit" name="deconnexion" class="nav-item-cus-dec" value="Me déconnecter">
                        </form>
                    </li>
                    <?php endif;?>

                </ul>
            </div>
        </div>
    </nav>
</header>