<?php 
    require_once 'inc/header.php';
?>
<title><?= $article[0]->title ?></title>
</head>

<body>

    <?php require_once 'inc/nav.php' ?>
    <main class="container my-5">
        <article class="mb-5">
            <h1 class="mb-4"><?= $article[0]->articleTitle ?></h1>
            <p><?= $article[0]->articleBody ?></p>
        </article>


        <!-- TODO : Create Include-->
        <div class="latest-articles">
            <div class="d-flex">
                <?php foreach($data as $article):?>
                <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>" class="card-cus">
                    <img src="<?= "$domain$public"?>style/images/image-currency.jpg" class="card-img-top"
                        alt="image-currency" />
                    <div class="card-body justify-content-between">
                        <small class="writer-name">Par
                            <?php echo $article->userPrenom." "; echo $article->userNom ?></small>
                        <h5 class="card-title"><?= $article->articleTitle ?></h5>
                        <p class="card-text"> <?= substr($article->articleBody, 0, 255)."..." ?> </p>
                    </div>
                </a>
                <?php endforeach;?>
            </div>

    </main>
    <?php require_once 'inc/footer.php' ?>

</body>

</html>