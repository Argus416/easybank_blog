<?php
    $domain = $_ENV['DOMAIN'];
    $public = $_ENV['PUBLIC'];

?>

<header class="dashboard">
    <h2>Dashboard</h2>
    <div class="left">
        <!-- <form method="GET" class="search_form">
            <i class="fas fa-search"></i>
            <input type="search" placeholder="Recherer un article">
        </form> -->
        <div class="profile">
            <img src="<?= Helpers::imgProfile() ?>" alt="photo profil">
            <a href="<?= $urlGenerator->generate('authorShow', ['id' =>$_SESSION['idAdmin']])?>"
                class="current_user"><?=$_SESSION['authorPrenom']?></a>
        </div>
    </div>
</header>