<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM tb_users WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    if($row) {
?>
<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content= "width=device-width, initial-scale=1">
    <title>index</title>
</head>
<body>
    <h1>Welcome <?php echo $row["name"]; ?></h1>
    <a href="logout.php">Logout</a>
</body>
</html> -->

<!DOCTYPE html>
<html data-wf-domain="spellbound-a74583.webflow.io" data-wf-page="663f0b338e5ea3b0b65e2172"
    data-wf-site="663f0b338e5ea3b0b65e2166">

<head>
    
    
    <meta charset="utf-8" />
    <title>Spellbound</title>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Webflow" name="generator" />
    
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

<!--=============== CSS ===============-->
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/maindesign.css">

    <link href="https://assets-global.website-files.com/663f0b338e5ea3b0b65e2166/css/spellbound-a74583.webflow.b49b5f6df.css"
        rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin="anonymous" />
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js" type="text/javascript"></script>
    <script
        type="text/javascript">WebFont.load({ google: { families: ["Varela:400", "Changa One:400,400italic", "Bungee Outline:regular", "Bungee:regular"] } });</script>
    <script
        type="text/javascript">!function (o, c) { var n = c.documentElement, t = " w-mod-"; n.className += t + "js", ("ontouchstart" in o || o.DocumentTouch && c instanceof DocumentTouch) && (n.className += t + "touch") }(window, document);</script>
    <link href="https://assets-global.website-files.com/img/webclip.png" rel="apple-touch-icon" />
</head>

<body class="body">

<div class="nav" id="nav">
            <nav class="nav__content">
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-chevron-right' ></i>
                </div>
    
                <a href="#" class="nav__logo">
                    <i class='bx bxs-heart' ></i>
                    <span class="nav__logo-name">Healthy</span>
                </a>
    
                <div class="nav__list">
                    <a href="#" class="nav__link active-link">
                        <i class='bx bx-grid-alt'></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-file'></i>
                        <span class="nav__name">Appointments</span>
                    </a>
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-envelope' ></i>
                        <span class="nav__name">Messages</span>
                    </a>
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-bar-chart-square' ></i>
                        <span class="nav__name">Statistic</span>
                    </a>
                    
    
                    <a href="#" class="nav__link">
                        <i class='bx bx-cog' ></i>
                        <span class="nav__name">Settings</span>
                    </a>

                    <a href="logout.php" class="nav__link">
                    <i class='bx bx-log-out' ></i>
                        <span class="nav__name">Logout</span>
                    </a>

                    
                </div>
            </nav>
        </div>



<div>

<section class="hero-without-image-2">
        <div class="container-2">
            <div class="hero-wrapper-two-2">
                <h1 class="heading-2">SPELLBOUND</h1>
                <a data-w-id="77554306-e4d7-7658-2a1c-d91ce0dc5687" href="game/start.html"
                    class="button-primary-2 w-button">START</a>
            </div>
        </div>
    </section>
    <section class="footer-subscribe">
        <div class="container-3">
            <div class="footer-wrapper-three">
                <div class="footer-block-three"><a href="#" class="footer-link-three">About us</a><a href="#"
                        class="footer-link-three">Features</a><a href="#" class="footer-link-three">User Example</a>
                        <a href="#"
                        class="footer-link-three">Resources</a></div>
                <div class="footer-social-block-three"><a href="https://www.facebook.com/bdette.img" class="footer-social-link-three w-inline-block"><img
                            src="https://assets-global.website-files.com/62434fa732124a0fb112aab4/62434fa732124a705912aaeb_facebook%20big%20filled.svg"
                            loading="lazy" alt="" /></a><a href="#" class="footer-social-link-three w-inline-block"><img
                            src="https://assets-global.website-files.com/62434fa732124a0fb112aab4/62434fa732124ab37a12aaf0_twitter%20big.svg"
                            loading="lazy" alt="" /></a><a href="#" class="footer-social-link-three w-inline-block"><img
                            src="https://assets-global.website-files.com/62434fa732124a0fb112aab4/62434fa732124a61f512aaed_instagram%20big.svg"
                            loading="lazy" alt="" /></a><a href="#" class="footer-social-link-three w-inline-block"><img
                            src="https://assets-global.website-files.com/62434fa732124a0fb112aab4/62434fa732124a717f12aaea_youtube%20small.svg"
                            loading="lazy" alt="" /></a></div>
            </div>
           
            <div class="footer-bottom">
                <div class="footer-copyright">© 2022 Company name. All rights reserved</div>
            </div>
        </div>
    </section>
    <div class="modal-wrapper">
        <div data-w-id="73872990-25b5-0044-cc8d-8e787c26b763" class="modal-background"></div>
        <div class="modal-card">
            <div class="page-wrapper">
                <div class="global-styles w-embed">
                    <style>

                    </style>
                </div>
            </div>
        </div>
    </div>
    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=663f0b338e5ea3b0b65e2166"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>



</div>




        <script src="assets/js/main.js"></script>


</body>

</html>

<?php
    } else {
       
        header("Location: login.php");
    }
} else {
   
    header("Location: login.php");
}
?>
