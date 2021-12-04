<aside>
    <nav>
        <a href="<?= $urlGenerator->generate('accueil') ?>" class="logo">
            <img src="<?= "$domain$public"?>style/images/logo.svg" alt="logo" class="logo">
        </a>
        <ul>
            <!-- <li class="nav-item">
                <i class="fas fa-desktop"></i>
                <a class="nav-link" href=" $urlGenerator->generate('stat') ">Main</a>
            </li> -->

            <li class="nav-item">
                <i class="fas fa-newspaper"></i>
                <a class="nav-link" href="<?= $urlGenerator->generate('articlesManagement') ?>">Gestion d'article</a>
            </li>

            <li class="nav-item">
                <i class="fas fa-columns">

                </i> <a class="nav-link" href="<?= $urlGenerator->generate('categorieManagement') ?>">Gestion de
                    catégorie</a>
            </li>

            <!-- <li class="nav-item">
                <i class="far fa-user"></i>
                <a class="nav-link" href="?= $urlGenerator->generate('usersManagement') ?">Gestions d'utilisateurs</a>
            </li> -->

            <li class="nav-item">
                <i class="fas fa-cog"></i>
                <a class="nav-link"
                    href="<?= $urlGenerator->generate('authorShow', ['id' =>$_SESSION['idAdmin']])?>">Mon
                    profil</a>
            </li>
            <li class="nav-item">
                <i class="far fa-compass"></i>
                <a class="nav-link" href="<?= $urlGenerator->generate('accueil') ?>">Website</a>
            </li>
        </ul>
    </nav>
</aside>