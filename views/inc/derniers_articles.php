<section class="section-main latest-articles">
    <div class="container">
        <h2>Derniers Articles</h2>

        <div class="d-flex">
            <?php foreach($data as $article):?>
            <a href="<?= $urlGenerator->generate('article', ['id'=>$article->articleID]) ?>" class="card-cus">
                <div class="card-header-cus">
                    <img src="<?= "$domain$public"?>style/images/image-currency.jpg" class="card-img-top"
                        alt="image-currency" />
                    <span class="categorie"><?= $article->categorieType ?></span>
                </div>
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