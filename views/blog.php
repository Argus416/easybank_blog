<?php
    require_once 'inc/header.php';
    dump($data);
?>
<title>Nos articles</title>

</head>

<body>
    <?php require_once 'inc/nav.php' ?>
    <main class="blogs">
        <div class="container">
            <h1 class="page-title">Nos articles</h1>
            <div class="d-flex">
                <div class="left">
                    <?php foreach($data as $article):?>
                    <article class="article">
                        <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>">
                            <h2><?= $article->articleTitle ?></h2>
                        </a>
                        <span class="mb-4"><?= $article->categorieType; ?></span>

                        <p> <?= substr($article->articleBody, 0, 255)."..." ?> </p>

                        <div class="text-center view-more-container">
                            <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>"
                                class="btn-forth-cus">Voir plus</a>
                        </div>
                    </article>
                    <?php endforeach;?>
                </div>

                <div class="right"></div>
            </div>
        </div>
    </main>

    <?php require_once 'inc/footer.php' ?>
</body>

</html>