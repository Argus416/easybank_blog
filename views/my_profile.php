<?php
    // echo $user->img_profile;

?>
<?php require_once 'inc/header.php' ?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content my_profile">
                <div class="mb-5 d-flex align-items-center justify-content-between">
                    <h3 class="m-0"> Bienvenu <?= $user->prenom?> </h3>
                    <a class="btn btn-secondary-cus"
                        href="<?= $urlGenerator->generate('authorEdit', ['id' =>$_ENV['USER_ID']])?>">Modifier</a>
                </div>


                <div class="current_photo_container mb-3">
                    <img class="current_photo" src="<?= "$domain$public" ?>style/images/image-currency.jpg"
                        alt="profile_photo">
                </div>

                <div class="row w-75 m-auto">
                    <div class="mb-3 col-lg-6">
                        <label for="nom" class="form-label">Votre nom</label>
                        <input type="text" class="form-control" id="nom" value="<?= $user->nom?>" disabled>
                    </div>
                    <div class="mb-3 col-lg-6">
                        <label for="prenom" class="form-label">Votre prenom</label>
                        <input type="text" class="form-control" name="prenom" id="prenom" value="<?= $user->prenom?>"
                            disabled>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?= $user->email?>"
                            disabled>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Date de naissance</label>
                        <input type="date" class="form-control" name="date-de-naissance" id="date-de-naissance"
                            value="<?= $user->date_de_naissance?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </main>
</body>

</html>