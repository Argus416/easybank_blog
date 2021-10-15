<?php require_once 'template/header.php' ?>
<title>Projet PHP</title>
</head>

<body>

    <?php require_once 'template/nav.php' ?>
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
                            <img src="style/images/icon-online.svg" alt="Online Banking" />
                            <h3>Online Banking</h3>
                            <p>
                                Our modern web and mobile applications allow you to keep track of your finances
                                wherever you are in the world.
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <img src="style/images/icon-budgeting.svg" alt="Simple Budgeting" />
                            <h3>Simple Budgeting</h3>
                            <p>
                                See exactly where your money goes each month. Receive notifications when you’re
                                close to hitting your limits.
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <img src="style/images/icon-onboarding.svg" alt="Fast Onboarding" />
                            <h3>Fast Onboarding</h3>
                            <p>
                                We don’t do branches. Open your account in minutes online and start taking control
                                of your finances right away.
                            </p>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <img src="style/images/icon-api.svg" alt="Open API" />
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
                    <a href="#" class="card-cus">
                        <img src="style/images/image-currency.jpg" class="card-img-top" alt="image-currency" />
                        <div class="card-body">
                            <small class="writer-name">By Claire Robinson</small>
                            <h5 class="card-title">Receive money in any currency with no fees</h5>
                            <p class="card-text">
                                The world is getting smaller and we’re becoming more mobile. So why should you be
                                forced to only receive money in a single …
                            </p>
                        </div>
                    </a>

                    <a href="#" class="card-cus">
                        <img src="style/images/image-restaurant.jpg" class="card-img-top" alt="image-currency" />
                        <div class="card-body">
                            <small class="writer-name">By Wilson Hutton</small>
                            <h5 class="card-title">Treat yourself without worrying about money</h5>
                            <p class="card-text">
                                Our simple budgeting feature allows you to separate out your spending and set
                                realistic limits each month. That means you …
                            </p>
                        </div>
                    </a>

                    <a href="#" class="card-cus">
                        <img src="style/images/image-plane.jpg" class="card-img-top" alt="image-currency" />
                        <div class="card-body">
                            <small class="writer-name">By Wilson Hutton</small>
                            <h5 class="card-title">Take your Easybank card wherever you go</h5>
                            <p class="card-text">
                                We want you to enjoy your travels. This is why we don’t charge any fees on purchases
                                while you’re abroad. We’ll even show you …
                            </p>
                        </div>
                    </a>

                    <a href="#" class="card-cus">
                        <img src="style/images/image-currency.jpg" class="card-img-top" alt="image-currency" />
                        <div class="card-body">
                            <small class="writer-name">By Claire Robinson</small>
                            <h5 class="card-title">Our invite-only Beta accounts are now live!</h5>
                            <p class="card-text">
                                After a lot of hard work by the whole team, we’re excited to launch our closed beta.
                                It’s easy to request an invite through the site ...
                            </p>
                        </div>
                    </a>
                </div>
                <div class="text-center">
                    <a href="#" class="link"> Tous nos articles </a>
                </div>
            </div>
        </section>
    </main>

    <?php require_once 'template/footer.php' ?>
    <!-- <div class="attribution">
            Challenge by <a href="https://www.frontendmentor.io?ref=challenge" target="_blank">Frontend Mentor</a>.
            Coded by <a href="#">Mohamad Al-khatib</a>.
        </div> -->
</body>

</html>