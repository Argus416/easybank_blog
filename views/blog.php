<?php

use App\Helper\Helpers;

require_once 'inc/header.php';
?>
<title>Nos articles</title>

</head>

<body>
    <?php require_once 'inc/nav.php' ?>
    <main class="blogs">
        <div class="container">
            <div class="header-blog">
                <div class="left">
                    <div class="title-container">
                        <?php if(isset($_GET['search-articles'])): ?>
                        <h1 class="page-title">Vous avez cherché <strong><?= $_GET['search-articles'] ?></strong></h1>
                        <small><strong> <?= $nbArticles ?> </strong> résultat ont été trouvés </small>
                        <?php else: ?>
                        <h1 class="page-title">Nos articles</h1>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="right">
                    <form method="GET" class="search_form">
                        <i class="fas fa-search"></i>
                        <input type="text" name="search-articles" placeholder="Recherer un article" required>
                    </form>
                </div>

            </div>

            <?php if(count($articles)): ?>

            <div class="articles-container d-flex">
                <div class="left">
                    <?php foreach($articles as $article):?>
                    <article class="article">
                        <div class="left">
                            <img src="<?= Helpers::imgToInsert('imgArticle', $article->articleImg) ?>" alt="">
                        </div>

                        <div class="right">
                            <div class="article-content">
                                <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>">
                                    <h2><?= $article->articleTitle ?></h2>
                                </a>

                                <p> <?= substr($article->articleBody, 0, 255)."..." ?> </p>
                            </div>
                            <div class="text-center view-more-container">
                                <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>"
                                    class="btn-third-outline-cus">Voir plus</a>
                            </div>
                        </div>


                    </article>
                    <?php endforeach;?>
                </div>
            </div>
            <?= $pagintation ?>
            <?php elseif(!count($articles) && isset($_GET['search-articles']) ): ?>
            <h2 class="mb-5"> Aucun articles n'a été trouvé avec votre recherche
                <strong><?=$_GET['search-articles']?></strong>
            </h2>
            <?php else: ?>
            <h2 class="mb-5"> Aucun articles n'est publié </h2>
            <?php endif; ?>

        </div>

    </main>

    <?php require_once 'inc/footer.php' ?>
</body>

</html>