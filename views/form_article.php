<?php require_once 'inc/header.php' ?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content form_article">
                <h3> Bienvenu Mohamad </h3>


                <form method="POST">
                    <div class="row">
                        <div class="col-lg-3 blog_photo_container">
                            <img class="article_banner" src="style/images/image-currency.jpg" alt="article_banner">
                            <input class="form-control article_banner_input" type="file" name="article_banner"
                                accept="image/png, image/gif, image/jpeg" />
                        </div>

                        <div class="row col-lg-9">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="title" class="form-control" name="title" id="title"
                                    aria-describedby="titleHelp">
                            </div>

                            <div class="mb-3">
                                <label for="prenom" class="form-label">Catégorie</label>
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">Action</option>
                                    <option value="2">Culture</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="floatingTextarea2" class="form-label">Body</label>
                                <textarea class="form-control" name="form-body" rows="5"
                                    placeholder="Leave a comment here"></textarea>
                            </div>

                        </div>

                        <div class="btn-container">
                            <input type="submit" name="form_article" class="btn btn-third-cus" value="Submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>