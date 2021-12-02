<?php
    require_once 'inc/header.php';
?>
<title>Nos articles</title>

</head>

<body>
    <?php require_once 'inc/nav.php' ?>
    <main class="blogs">
        <div class="container">
            <h1 class="page-title">Nos articles</h1>

            <?php if(count($articles)): ?>
            <div class="d-flex">
                <div class="left">
                    <?php foreach($articles as $article):?>
                    <article class="article">
                        <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>">
                            <h2><?= $article->articleTitle ?></h2>
                        </a>
                        <small class="d-block mb-3"><?= $article->categorieType; ?></small>

                        <p> <?= substr($article->articleBody, 0, 255)."..." ?> </p>

                        <div class="text-center view-more-container">
                            <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>"
                                class="btn-forth-cus">Voir plus</a>
                        </div>
                    </article>
                    <?php endforeach;?>
                </div>

                <div class="right">
                    <form method="GET" class="d-flex flex-column categorie-select-form">
                        <h4>Catégories</h4>
                        <ul class="categorie-list">
                            <?php 
                                foreach($categories as $categorie):
                                $checked = $_GET["cat-$categorie->type"] === "$categorie->id" ? 'checked' :
                            '';
                            ?>

                            <li>
                                <label for="cat-<?= $categorie->type ?>" class="mb-1">
                                    <input type="checkbox" name="cat-<?= $categorie->type ?>" class="categorie"
                                        id="cat-<?= $categorie->type ?>" value="<?= $categorie->id ?>" <?= $checked?>>
                                    <?= $categorie->type ?>
                                </label>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <input type="submit" name="categories-selected" class="categorie-select" hidden>
                    </form>
                </div>
            </div>
            <?= $pagintation ?>
            <?php else: ?>
            <h2 class="mb-5"> Aucun articles n'est publié </h2>
            <?php endif; ?>

        </div>

    </main>

    <?php require_once 'inc/footer.php' ?>
</body>

</html>