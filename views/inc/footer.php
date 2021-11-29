<footer>
    <div class="container">
        <div class="row">
            <div class="fisrt-col col-lg-4 col-md-6 col-sm-12">
                <a href="<?= $urlGenerator->generate('accueil') ?>"><img
                        src="<?= "$domain$public"?>style/images/logo-white.svg" alt="" /></a>
                <div class="icons">
                    <a href="#"><img src="<?= "$domain$public"?>style/images/icon-facebook.svg"
                            alt="icon-facebook" /></a>
                    <a href="#"><img src="<?= "$domain$public"?>style/images/icon-youtube.svg" alt="icon-youtube" /></a>
                    <a href="#"><img src="<?= "$domain$public"?>style/images/icon-twitter.svg" alt="icon-twitter" /></a>
                    <a href="#"><img src="<?= "$domain$public"?>style/images/icon-pinterest.svg"
                            alt="icon-pinterest" /></a>
                    <a href="#"><img src="<?= "$domain$public"?>style/images/icon-instagram.svg"
                            alt="icon-instagram" /></a>
                </div>
            </div>
            <div class="sec-col col-lg-4 col-md-6 col-sm-12">
                <ul>
                    <li><a href="<?= $urlGenerator->generate('contact') ?>">Nous contacter</a></li>
                    <li><a href="<?= $urlGenerator->generate('blog') ?>">Blog</a></li>
                </ul>
            </div>

            <div class="third-col col-lg-4 col-md-6 col-sm-12">
                <p>© Easybank. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<script src="<?= "$domain$public"?>script/sandbox.js"></script>