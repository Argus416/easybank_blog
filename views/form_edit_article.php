<?php 
    require_once 'inc/header.php';
    use App\Helper\Helpers;
?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content form_article">
                <h3> Edit Article <?=$getArticle->articleID?> </h3>

                <form method="POST" id="edit-article" enctype="multipart/form-data">
                    <input type="hidden" name="token-edit-article" value="<?= $token ?>">

                    <div class="row">
                        <div class="col-lg-3 blog_photo_container">
                            <img class="article_banner"
                                src="<?= Helpers::imgToInsert('imgArticle', $getArticle->articleImg) ?>"
                                alt="article_banner">
                            <input class="form-control article_banner_input" type="file" name="imgArticle"
                                accept="image/png, image/gif, image/jpeg" />
                            <p class="text-danger err-text mt-1 mb-1 d-none">Veuillez remplir le champs</p>
                        </div>

                        <div class="row col-lg-9">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="artilce-title"
                                    value="<?=$getArticle->articleTitle?>" id="title-article-edit">
                                <p class="text-danger err-text mt-1 mb-1 d-none">Veuillez remplir le champs</p>
                            </div>

                            <div class="mb-3">
                                <label for="floatingTextarea2" class="form-label">Body</label>
                                <textarea class="form-control" id="body-article-edit" name="artilce-body" rows="5"
                                    placeholder="Contenu de l'article"><?=$getArticle->articleBody?></textarea>
                                <p class="text-danger err-text mt-1 mb-1 d-none">Veuillez remplir le champs</p>
                            </div>

                        </div>

                        <div class="btn-container">
                            <input type="submit" name="edit-article" class="btn btn-third-cus" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>