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
                <h3> Ajouter une nouvelle catégorie </h3>

                <!-- TODO REGEX input -->
                <form method="POST">
                    <div class="row">

                        <div class="mb-5">
                            <label for="catgorie-type" class="form-label">Catgorie</label>
                            <input type="title" class="form-control" name="catgorie-type" id="catgorie-type"
                                value="<?= $getCategorie->type?>">
                        </div>

                        <div class="btn-container">
                            <input type="submit" name="add-categorie" class="btn btn-third-cus" value="Ajouter">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>