<?php require_once 'inc/header.php' ?>
<title>Users management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content users_management">
                <h3> Gestion d'utilisateurs </h3>

                <table class="table table-striped table-success">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col" class="col-cus">Email</th>
                            <th scope="col">nb articles</th>
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
                                <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>

</html>