<?php 
    use App\Helper\Helpers;

    require_once 'inc/header.php';
?>
<title><?= $article[0]->articleTitle ?></title>
</head>

<body>

    <?php
        require_once 'inc/nav.php';
     ?>

    <main>
        <div class="container my-5">
            <!-- Si l'article existe -->
            <?php if(count($article)): ?>

            <?php
                if(isset($_SESSION['alert'])){
                    if($_SESSION['alert'] === 'go'){
                        echo Helpers::alertManager('primary' ,'articleModifie'); 
                    }else{
                        echo Helpers::alertManager(); 
                    }
                }    
            ?>
            <article class="mb-5">
                <div class="header-article mb-4">
                    <h1><?= $article[0]->articleTitle ?></h1>

                    <?php if(isset($_SESSION['isLoggedin']) && $_SESSION['isLoggedin'] == true ):?>
                    <a href="<?= $urlGenerator->generate('editArticle', ['id' => $article[0]->articleID]) ?>"
                        class="btn btn-warning">Editer l'article</a>
                    <?php endif;?>

                </div>
                <p><?= $article[0]->articleBody ?></p>
            </article>

            <?php 
                else: echo "<h1>Article non trouvé</h1>";
                endif;
            ?>
        </div>

        <?php
        
        require_once 'inc/derniers_articles.php'; 
        ?>

    </main>
    <?php require_once 'inc/footer.php' ?>

</body>

</html>