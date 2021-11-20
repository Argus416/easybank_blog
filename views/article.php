<?php 
    require_once 'inc/header.php';
?>
<title><?= $article[0]->articleTitle ?></title>
</head>

<body>

    <?php require_once 'inc/nav.php' ?>
    <main>
        <div class="container my-5">
            <article class="mb-5">
                <h1 class="mb-4"><?= $article[0]->articleTitle ?></h1>
                <p><?= $article[0]->articleBody ?></p>
            </article>
        </div>

        <?php require_once 'inc/derniers_articles.php'; ?>

    </main>
    <?php require_once 'inc/footer.php' ?>

</body>

</html>