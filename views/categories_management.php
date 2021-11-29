<?php

require_once 'inc/header.php';

?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content articles_management">
                <div class="gestion-article-header d-flex justify-content-between mb-4 ">
                    <h3 class="m-0"> Gestion de catégories </h3>
                    <a href="<?= $urlGenerator->generate('addCategorie') ?>" class="btn-secondary-cus me-4">Nouvelle
                        catégorie</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data as $categorie):?>
                        <tr>
                            <th scope="row"><?= $categorie->id?></th>
                            <td><?= $categorie->type?></td>
                            <td>
                                <a href="<?= $urlGenerator->generate('editCategorie', ['id' => $categorie->id]) ?>"
                                    class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="<?= $urlGenerator->generate('article', ['id' => $categorie->id]) ?>"
                                    class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalConfirmation<?= $categorie->id?>"><i
                                        class="far fa-trash-alt"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="modalConfirmation<?= $categorie->id?>" tabindex="-1"
                                    aria-labelledby="modalConfirmationLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalConfirmationLabel">Supprimer la
                                                    catégorie
                                                    <b><?= $categorie->type?></b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <span>
                                                    Êtes vous sur de vouloir supprimer la catégorie ?
                                                </span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <form method="POST">
                                                    <input type="hidden" name="categorie-id"
                                                        value="<?= $categorie->id?>">
                                                    <button type="submit" name="categorie-del"
                                                        class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Modal -->
                            </td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>



</body>

</html>