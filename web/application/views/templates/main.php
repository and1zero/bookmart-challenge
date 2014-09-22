<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Andi Susanto">
        <title><?= isset($title) ? $title :  'Book-Mart'?></title>
        <link rel="shortcut icon" href="<?= asset_url('images/favicon.ico')?>" type="image/x-icon">
        <link rel="icon" href="<?= asset_url('images/favicon.ico')?>" type="image/x-icon">
        <?= stylesheet_link_tag('bootstrap/bootstrap')?>
        <?= stylesheet_link_tag('fontawesome/font-awesome')?>
        <?= stylesheet_link_tag('main')?>
        <?= javascript_link_tag('jquery-1.11.1.min')?>
        <?= javascript_link_tag('bootstrap')?>
        <?= javascript_link_tag('main')?>
    </head>
    <body>
        <header>
        <div class="bg-darkred">
            <div class="container">
                <div class="pull-right">
                    <span style="font-size:16px;">Welcome to Book-Mart!</span>
                    <span><a href="#">Register</a> / <a href="#">Login</a></span>
                    <span><a href="#">Bag $0.00</a></span>
                    <span><a href="#">Checkout</a></span>
                    <select>
                        <option value="sgd" selected="selected">SGD</option>
                        <option value="usd" >USD</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="bg-red">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"><a class="logo" href="#">BOOK-MART</a></div>
                    <div class="col-md-7 col-sm-9 col-xs-9 search ">
                        <div class="row">
                            <div class="col-md-10 col-sm-8 col-xs-9"><input type="text" class="form-control" placeholder="SEARCH FOR ANYTHING HERE" /></div>
                            <div class="col-md-2 col-xs-2"><button type="submit" class="btn btn-danger"><i class="fa fa-search"></i></button></div>
                        </div>
                    </div>
                    <div class="col-md-2 icons">
                        <a href="http://google.com" target="_blank"><i class="fa fa-google-plus fa-lg"></i></a>
                        <a href="http://facebook" target="_blank"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="http://twitter.com" target="_blank"><i class="fa fa-twitter fa-lg"></i></a>
                        <a href="http:/youtube.com" target="_blank"><i class="fa fa-youtube fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <!-- this is the main container -->
        <div class="main-container container">
            <!-- NAVIGATION -->
            <div class="book-nav row">
                <div class="col-md-1 active"><a href="#">HOME</a></div>
                <div class="col-md-2"><a href="#">HOT DEALS</a></div>
                <div class="col-md-2"><a href="#">EDUCATION</a></div>
                <div class="col-md-2"><a href="#">MAGAZINES</a></div>
                <div class="col-md-1"><a href="#">GIFT</a></div>
                <div class="col-md-2"><a href="#">READING ACCESSORIES</a></div>
                <div class="col-md-2"><a href="#">BULK SALES</a></div>
            </div>

<?php echo $body ?>

            <div class="push"></div>
        </div><!-- End of main container -->
        <footer class="bg-darkred">
        <div class="container">
            <div class="pull-right">
                All rights are reserved &copy; 2014 BOOK-MART
            </div>
        </div>
        </footer>
    </body>
</html>