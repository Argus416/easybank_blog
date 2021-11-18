<?php require_once 'inc/header.php' ?>
<title>Articls management</title>
</head>

<body>
    <main class="dashboard">
        <?php require_once 'inc/dashboard_aside.php' ?>
        <div class="dashboard_body">
            <?php require_once 'inc/dashboard_header.php' ?>
            <div class="dashboard_content articles_management">
                <h3> Gestion d'articles </h3>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col" class="col-cus">Author</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Mohamad</td>
                            <td>alkhatib.m804@gmail.com</td>
                            <td>
                                <a href="form_article.php" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="form_article.php" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>test@gmail.com</td>
                            <td>
                                <a href="form_article.php" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="form_article.php" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Bonjour</td>
                            <td>coucou@gmail.com</td>
                            <td>
                                <a href="form_article.php" class="btn btn-primary"><i class="far fa-eye"></i></a>
                                <a href="form_article.php" class="btn btn-warning"><i class="far fa-edit"></i></a>
                                <a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </main>
</body>

</html>