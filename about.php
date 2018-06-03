<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/errorMessageHandler.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShortM - About</title>
    <link rel="stylesheet" id="loaderCSS" href="/css/loader.css">
    <link rel="stylesheet" id="loaderCSS" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<?php getLoader(); ?>
</head>


<body>
<br>
<div class="container-fluid">
    <nav class="navbar navbar-expand-sm navbar-dark" style="background: #5a6268">
        <a class="navbar-brand" href="/">ShortM - URL Shortening Service</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="/records" class="nav-link">Records</a>
                </li>
                <li class="nav-item active">
                    <a href="/about" class="nav-link">About</a>
                </li>

            </ul>

        </div>
    </nav>
</div>
<hr class="customHR">

<div class="container mx-auto col-md-8">
    <img src="/resources/ShortMLogoMin.png" alt="ShortM" class="mx-auto d-block">

</div>

<div class="container mx-auto col-md-8">

    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sodales bibendum massa vel lacinia. Ut nec
        diam vitae lectus mattis ullamcorper. Vestibulum vel pretium dolor. Nulla ut odio odio. Fusce a lacus a lacus
        pulvinar auctor id ut est. Vestibulum maximus, quam in ornare fringilla, lorem tellus mollis sapien, at luctus
        justo odio sit amet sem. Aliquam viverra turpis et enim tempor viverra. Sed dictum magna eu pellentesque
        lobortis. Pellentesque ultrices interdum sem, a rutrum ex posuere quis. Maecenas eros sem, pharetra sed ultrices
        at, mattis convallis orci. Integer nec elit lobortis, semper odio ut, facilisis tortor. Nulla tortor nisl,
        vehicula vel tristique ut, sodales facilisis dui. Praesent viverra odio ligula, a commodo ligula pulvinar sed.
        Praesent at arcu turpis.
    </p>
    <p>
        Aenean quis leo luctus, faucibus lectus at, laoreet erat. Maecenas diam odio, auctor sed leo eu, pulvinar
        efficitur quam. Praesent convallis sed diam sed consectetur. Sed vestibulum laoreet nibh, consectetur aliquet
        risus. Donec maximus in erat in aliquam. Suspendisse eu mauris vitae dui egestas aliquet at in ante. Quisque
        venenatis rhoncus suscipit. Vivamus convallis molestie viverra. Nulla volutpat lorem est. Phasellus finibus
        blandit risus, ut vehicula nisi sollicitudin a. Nullam pellentesque est vitae eros gravida, in condimentum massa
        facilisis. Ut urna tellus, iaculis faucibus urna nec, facilisis tincidunt felis. Quisque id nulla elit. Fusce
        aliquam massa id tortor porttitor molestie. Nulla facilisi.
    </p>
    <p>
        Etiam sit amet lorem at odio porttitor cursus. Phasellus id auctor turpis, vitae bibendum ligula. Maecenas
        rhoncus felis id vulputate efficitur. Quisque et turpis ut magna scelerisque feugiat vitae nec neque. Vestibulum
        porta tellus a elit porta dapibus. Nam rutrum lectus non sem volutpat, at iaculis urna laoreet. Integer
        consectetur mauris libero, eget facilisis diam feugiat vel. Maecenas hendrerit aliquam neque semper malesuada.
    </p>

</div>
<hr class="customHR" style="width: 50%;">

<div class="container mx-auto col-md-8">
    <div id="bootstrapSlider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#bootstrapSlider" data-slide-to="0" class="active"></li>
            <li data-target="#bootstrapSlider" data-slide-to="1"></li>
            <li data-target="#bootstrapSlider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="/resources/images/benjamin-child-17946-unsplash_min.jpg"
                     alt="First slide">

                <div class="carousel-caption d-none d-md-block">
                    <h5>Minimalist boardroom photo</h5>
                    <p>by Benjamin Child (@bchild311) on Unsplash</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/resources/images/nastuh-abootalebi-284882-unsplash_min.jpg"
                     alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Office hallway photo</h5>
                    <p>by Nastuh Abootalebi (@sunday_digital) on Unsplash</p>
                </div>

            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="/resources/images/samuel-zeller-111218-unsplash_min.jpg"
                     alt="Third slide">

                <div class="carousel-caption d-none d-md-block">
                    <h5>Building, window, concrete</h5>
                    <p>by Samuel Zeller (@samuelzeller) on Unsplash</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#bootstrapSlider" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bootstrapSlider" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>

<script src="/js/jquery-3.3.1.min.js"></script>
<script>
    if (!window.jQuery) {
        var JQSScript = document.createElement('script');
        JQSScript.type = "text/javascript";
        JQSScript.src = "https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js";
        document.getElementsByTagName('head')[0].appendChild(JQSScript);
    }
</script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/hammer.min.js"></script>
<script>

    $('.carousel').each(function () {
        var $carousel = $(this);
        var hammertime = new Hammer(this, {
            recognizers: [
                [Hammer.Swipe, { direction: Hammer.DIRECTION_HORIZONTAL }]
            ]
        });
        hammertime.on('swipeleft', function () {
            $carousel.carousel('next');
        });
        hammertime.on('swiperight', function () {
            $carousel.carousel('prev');
        });
    });

</script>

</body>
</html>
