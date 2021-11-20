<?php

require_once 'inc/header.php' ?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content articles_management">
                <div class="gestion-article-header d-flex justify-content-between mb-4 ">
                    <h3 class="m-0"> Gestion d'articles </h3>
                    <a href="<?= $urlGenerator->generate('addArticle') ?>" class="btn-secondary-cus me-4">Ajouter un
                        article</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col" class="col-cus">Author</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($articles as $article):?>
                        <tr>
                            <th scope="row"><?= $article->articleID?></th>
                            <td><?= $article->articleTitle?></td>
                            <td><?= $article->categorieType?></td>
                            <td><?= $article->userNom?> <?= $article->userPrenom?></td>
                            <td>
                                <a href="<?= $urlGenerator->generate('article', ['id' => $article->articleID]) ?>"
                                    class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="<?= $urlGenerator->generate('editArticle', ['id' => $article->articleID]) ?>"
                                    class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="<?= $urlGenerator->generate('article', ['id' => $article->articleID]) ?>"
                                    class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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