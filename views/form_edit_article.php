<?php 
    require_once 'inc/header.php';
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

                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-3 blog_photo_container">
                            <img class="article_banner"
                                src="<?= "$domain$public"."upload/post-img/".$getArticle->articleImg ?>"
                                alt="article_banner">
                            <input class="form-control article_banner_input" type="file" name="imgArticle"
                                accept="image/png, image/gif, image/jpeg" />
                        </div>

                        <div class="row col-lg-9">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="artilce-title"
                                    value="<?=$getArticle->articleTitle?>" id="title">
                            </div>

                            <div class="mb-3">
                                <label for="floatingTextarea2" class="form-label">Body</label>
                                <textarea class="form-control" name="artilce-body" rows="5"
                                    placeholder="Contenu de l'article"><?=$getArticle->articleBody?></textarea>
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