<?php 
    use App\Helper\Helpers;
    require_once 'inc/header.php';
?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content my_profile">
                <h3> Bienvenu Mohamad </h3>


                <form method="POST" id="edit-profile" enctype="multipart/form-data">
                    <input type="hidden" name="token-edit-profile" value="<?= $token ?>">
                    <div class="row">
                        <div class="col-lg-2 current_photo_container">
                            <img class="current_photo"
                                src="<?= Helpers::imgToInsert('photoProfil', $user->img_profile) ?>" alt="photo profil">
                            <input class="form-control" type="file" name="photo_profile"
                                accept="image/png, image/jpeg, image/jpg" />

                        </div>

                        <div class="col-lg-10">
                            <div class="row">
                                <div class="mb-3 col-lg-6">
                                    <label for="nom" class="form-label">Votre nom</label>
                                    <input type="text" class="form-control" name="nom" id="nom-profil"
                                        value="<?= $user->nom?>">
                                    <p class="text-danger err-text mt-1 mb-1 d-none">Veuillez remplir le champs</p>
                                </div>
                                <div class="mb-3 col-lg-6">
                                    <label for="prenom" class="form-label">Votre prenom</label>
                                    <input type="text" class="form-control" name="prenom" id="prenom-profil"
                                        value="<?= $user->prenom?>">
                                    <p class="text-danger err-text mt-1 mb-1 d-none">Veuillez remplir le champs</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email-profil"
                                    value="<?= $user->email?>">
                                <p class="text-danger err-text mt-1 mb-1 d-none">Veuillez remplir le champs</p>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Date de naissance</label>
                                <input type="date" class="form-control" name="date-de-naissance" id="date-de-naissance"
                                    value="<?= $user->date_de_naissance?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                        </div>
                        <div class="btn-container">
                            <button type="submit" name="update-account" class="btn btn-third-cus">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>