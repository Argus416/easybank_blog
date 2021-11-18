<?php
    $domain = $_ENV['DOMAIN'];
    $public = $_ENV['PUBLIC'];
?>

<header class="dashboard">
    <h2>Dashboard</h2>
    <div class="left">
        <form method="GET" class="search_form">
            <i class="fas fa-search"></i>
            <input type="search" placeholder="Recherer un article">
        </form>
        <div class="profile">
            <img src="<?= "$domain$public" ?>style/images/image-currency.jpg" alt="profile_photo">
            <a href="my_profile.php" class="current_user">Mohamad</a>
        </div>
    </div>
</header>