<?php 
    require_once 'inc/header.php';

?>
<title>Projet PHP</title>
</head>

<body>

    <?php require_once 'inc/nav.php' ?>
    <main>
        <div class="test">
            <section class="presentation-header">
                <div class="container">
                    <div class="row">
                        <div class="text col-lg-5 col-sm-12">
                            <h1>Next generation digital banking</h1>
                            <p>
                                Take your financial life online. Your Easybank account will be a one-stop-shop for
                                spending, saving, budgeting, investing, and much more.
                            </p>
                            <a href="#" class="btn-primary-cus">Request Invite</a>
                        </div>
                        <div class="col-lg-6 col-sm-12 imgs">
                            <img src="style/images/image-mockups.png" class="img-mockup" alt="bg-intro-desktop" />
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-main why-us">
                <div class="container">
                    <h2>Why choose Easybank?</h2>
                    <p>
                        We leverage Open Banking to turn your bank account into your financial hub. <br />
                        Control your finances like never before.
                    </p>

                    <div class="row cards">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <img src="<?= "$domain$public"?>style/images/icon-online.svg" alt="Online Banking" />
                            <h3>Online Banking</h3>
                            <p>
                                Our modern web and mobile applications allow you to keep track of your finances
                                wherever you are in the world.
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <img src="<?= "$domain$public"?>style/images/icon-budgeting.svg" alt="Simple Budgeting" />
                            <h3>Simple Budgeting</h3>
                            <p>
                                See exactly where your money goes each month. Receive notifications when you’re
                                close to hitting your limits.
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <img src="<?= "$domain$public"?>style/images/icon-onboarding.svg" alt="Fast Onboarding" />
                            <h3>Fast Onboarding</h3>
                            <p>
                                We don’t do branches. Open your account in minutes online and start taking control
                                of your finances right away.
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <img src="<?= "$domain$public"?>style/images/icon-api.svg" alt="Open API" />
                            <h3>Open API</h3>
                            <p>
                                Manage your savings, investments, pension, and much more from one account. Tracking
                                your money has never been easier.
                            </p>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="section-main latest-articles">
            <div class="container">
                <h2>Latest Articles</h2>

                <div class="d-flex">
                    <?php foreach($data as $article):?>
                    <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articlesID]) ?>" class="card-cus">
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

                <div class="text-center">
                    <a href="<?= $urlGenerator->generate('blog') ?>" class="link"> Tous nos articles </a>
                </div>
            </div>
        </section>
    </main>

    <?php require_once 'inc/footer.php' ?>
    <!-- <div class="attribution">
            Challenge by <a href="https://www.frontendmentor.io?ref=challenge" target="_blank">Frontend Mentor</a>.
            Coded by <a href="#">Mohamad Al-khatib</a>.
        </div> -->
</body>

</html>