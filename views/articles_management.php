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

            <div class="dashboard_content articles_management">

                <?php
                    if(isset($_SESSION['alert'])){
                        if($_SESSION['alert'] === 'del-article'){
                            echo Helpers::alertManager('danger' ,'articleDel'); 
                        }elseif($_SESSION['alert'] === 'add-article'){
                            echo Helpers::alertManager('success', 'articleAjoute'); 
                        }else{
                            echo Helpers::alertManager(); 
                        }
                    }
                ?>

                <div class="gestion-article-header d-flex justify-content-between mb-4 ">
                    <h3 class="m-0"> Gestion d'articles </h3>
                    <a href="<?= $urlGenerator->generate('addArticle') ?>" class="btn-secondary-cus me-4">Ajouter un
                        article</a>
                </div>

                <?php 
                    if(count($articles)):
                ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col" class="col-cus">Author</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            foreach($articles as $article):
                        ?>

                        <tr>
                            <th scope="row"><?= $article->articleID?></th>
                            <td><?= $article->articleTitle?></td>
                            <td><?= $article->userNom?> <?= $article->userPrenom?></td>
                            <td>
                                <a href="<?= $urlGenerator->generate('article', ['id' => $article->articleID]) ?>"
                                    class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="<?= $urlGenerator->generate('editArticle', ['id' => $article->articleID]) ?>"
                                    class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="<?= $urlGenerator->generate('article', ['id' => $article->articleID]) ?>"
                                    class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modalConfirmation<?= $article->articleID?>"><i
                                        class="far fa-trash-alt"></i></a>

                                <!-- Modal -->
                                <div class="modal fade" id="modalConfirmation<?= $article->articleID?>" tabindex="-1"
                                    aria-labelledby="modalConfirmationLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalConfirmationLabel">Supprimer l'article
                                                    <b><?= $article->articleID?> </b>
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Êtes vous sur de vouloir supprimer l'article ?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Fermer</button>
                                                <form method="POST">
                                                    <input type="hidden" name="article-id"
                                                        value="<?= $article->articleID?>">
                                                    <input type="hidden" name="article-del-token" value="<?= $token ?>">
                                                    <button type="submit" name="article-del"
                                                        class="btn btn-danger">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Fin Modal -->
                            </td>
                        </tr>
                        <?php 
                            endforeach;
                        ?>
                    </tbody>
                </table>
                <?php 
                    else: 
                ?>
                <h2>Aucun articles n'est publié</h2>
                <?php 
                    endif; 
                ?>

            </div>
        </div>
    </main>



</body>

</html>