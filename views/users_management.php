<?php require_once 'inc/header.php' ?>
<title>Users management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content users_management">
                <div class="gestion-user-header d-flex justify-content-between mb-4 ">
                    <h3 class="m-0"> Gestion d'utilisateurs </h3>
                    <a href="" class="btn-secondary-cus me-4">Nouveau
                        utilisateur</a>
                </div>
                <table class="table table-striped table-success">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col" class="col-cus">Email</th>
                            <th scope="col">nb article</th>
                            <th scope="col"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user): ?>
                        <tr>
                            <th scope="row">
                                <?= $user->authorID ?>
                            </th>
                            <td>
                                <?= $user->authorNom ?>
                            </td>
                            <td>
                                <?= $user->authorPrenom ?>
                            </td>
                            <td>
                                <?= $user->authorEmail ?>
                            </td>
                            <td>
                                <?= $user->nbArticle ?>
                            </td>
                            <td>
                                <a href="<?= $urlGenerator->generate('authorShow', ['id' =>$user->authorID]) ?>"
                                    class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="<?= $urlGenerator->generate('authorEdit', ['id' =>$user->authorID]) ?>"
                                    class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="<?= $urlGenerator->generate('article', ['id' => $user->authorID]) ?>"
                                    class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalConfirmation<?= $user->authorID?>"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="modalConfirmation<?= $user->authorID?>" tabindex="-1"
                            aria-labelledby="modalConfirmationLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalConfirmationLabel">Supprimer l'utilisateur
                                            <b><?= $user->authorID?> </b>
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes vous sur de vouloir supprimer l'user ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Fermer</button>
                                        <form method="POST">
                                            <input type="hidden" name="user-id" value="<?= $user->authorID?>">
                                            <button type="submit" name="user-del"
                                                class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin Modal -->

                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>

</html>