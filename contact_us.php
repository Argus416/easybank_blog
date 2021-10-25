<?php require_once 'template/header.php' ?>
<title>Nous contacter</title>

</head>

<body>
    <?php require_once 'template/nav.php' ?>
    <main class="contact_us">
        <div class="container">
            <h1 class="page-title">Nous contacter</h1>

            <div class="d-flex">
                <div class="left">
                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i> 3 rue de Flandre Dunkerque, 28000 Chartres</li>
                        <li><i class="fas fa-mobile-alt"></i> +33 61 21 23 45 68</li>
                    </ul>
                    <div class="icons">
                        <a href="#"><img src="style/images/icon-facebook-black.svg" alt="icon-facebook" /></a>
                        <a href="#"><img src="style/images/icon-youtube-black.svg" alt="icon-youtube" /></a>
                        <a href="#"><img src="style/images/icon-twitter-black.svg" alt="icon-twitter" /></a>
                        <a href="#"><img src="style/images/icon-pinterest-black.svg" alt="icon-pinterest" /></a>
                        <a href="#"><img src="style/images/icon-instagram-black.svg" alt="icon-instagram" /></a>
                    </div>
                    <div id="map">
                    </div>
                </div>

                <div class="right">
                    <form method="POST">
                        <p>Laisser nous un message !</p>
                        <input type="text" name="name" placeholder="Nom">
                        <input type="text" name="email" placeholder="Email">
                        <textarea name="message" placeholder="Votre message"></textarea>
                        <div class="btn-container">
                            <button type="submit" class="btn-submit btn-third-cus">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'template/footer.php' ?>
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdsqFknb00ivhg3zu3-maFTt063F7WboY&callback=initMap&v=weekly"
        async></script>
    <script src="script/google_map.js"></script>
</body>

</html>