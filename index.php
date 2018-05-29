<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/errorMessageHandler.php');


$operationFrontEnd = 'shorten';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ShortM - Home</title>
    <link rel="stylesheet" id="loaderCSS" href="/css/loader.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
	<?php getLoader(); ?>
</head>


<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-sm navbar-light">
        <a class="navbar-brand" href="/">ShortM - URL Shortening Service</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="/records" class="nav-link">Records</a>
                </li>

            </ul>

        </div>
    </nav>
</div>
<form action="/backend/shorten" method="post">
    <div class="container">

        <div class="row d-flex">

            <div class="input-group col-md-4">
                <input name="url" type="url" value="http://tahaburakkoc.com" class="form-control input-lg"
                       placeholder="Please enter the URL."
                       minlength="5"
                       autofocus required>
            </div>

        </div>

    </div>
    <input type="hidden" name="ip" value="<?= getIP(); ?>">
    <input type="hidden" name="operation" value="<?= $operationFrontEnd; ?>">
</form>

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
<script src="/js/notify/notify.min.js"></script>
<script>
    function showError(a) {

        $.notify.defaults({
            className: 'error',
            clickToHide: true,
            autoHide: false,
            globalPosition: 'top center'
        });
        $.notify(a);
        let cornerDiv = jQuery(".notifyjs-corner");
        cornerDiv.attr('style', 'top: 0px; left: 50%;transform: translateX(-50%)');
    }

    function removeNotifyDiv() {
        let cornerDiv = jQuery(".notifyjs-corner");
        if (cornerDiv.length > 0) {
            cornerDiv.remove();
        }
    }

</script>

<?php
showErrorMSG();
?>
</body>
</html>
