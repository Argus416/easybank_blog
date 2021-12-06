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
            <div class="dashboard_content form_article">
                <h3> Bienvenu Mohamad </h3>

                <!-- TODO REGEX input -->
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="token-add-article" value="<?= $token ?>">
                    <div class="row">
                        <div class="col-lg-3 blog_photo_container">

                            <img src="<?= Helpers::imgToInsert('imgArticle', Null) ?>" class="card-img-top"
                                alt="image-currency" />
                            <input class="form-control article_banner_input" type="file" name="imgArticle"
                                accept="image/png, image/gif, image/jpeg" />
                        </div>

                        <div class="row col-lg-9">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" name="artilce-title" id="title">
                            </div>

                            <div class="mb-3">
                                <label for="body" class="form-label">Body</label>
                                <textarea class="form-control" name="artilce-body" rows="5"
                                    placeholder="Contenu de l'article" id="body"></textarea>
                            </div>

                        </div>

                        <div class="btn-container">
                            <input type="submit" name="add-article" class="btn btn-third-cus" value="Submit">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </main>
</body>

</html>