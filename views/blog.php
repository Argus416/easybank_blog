<?php
    require_once 'inc/header.php';
    dump($_POST);
?>
<title>Nos articles</title>

</head>

<body>
    <?php require_once 'inc/nav.php' ?>
    <main class="blogs">
        <div class="container">
            <div class="header-blog">
                <h1 class="page-title">Nos articles</h1>

                <form method="POST" class="search_form">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search-articles" placeholder="Recherer un article">
                </form>

            </div>

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
                                class="btn-third-outline-cus">Voir plus</a>
                        </div>
                    </article>
                    <?php endforeach;?>
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