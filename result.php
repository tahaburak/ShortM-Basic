<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/sessionHandler.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/helperFunctions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/backend/errorMessageHandler.php');

$url = '';
$slang = '';
$slangAsLink = '';
if (!array_key_exists('savedURL', $_SESSION) || empty($_SESSION['savedURL']) ||
	!array_key_exists('savedSlang', $_SESSION) || empty($_SESSION['savedSlang'])
) {
	abortRedirect('An error occured.');

} else {
	$url = $_SESSION['savedURL'];
	$slang = $_SESSION['savedSlang'];
	$slangAsLink = "https://shortm.ml/$slang";

	//empty the values so that user can shorten more links.
	$_SESSION['savedURL'] = '';
	$_SESSION['savedSlang'] = '';

}

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
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="/records" class="nav-link">Records</a>
                </li>
                <li class="nav-item">
                    <a href="/about" class="nav-link">About</a>
                </li>

            </ul>

        </div>
    </nav>
</div>
<hr class="customHR">
<br>
<div class="container mx-auto col-md-8">
    <img src="/resources/ShortMLogoMin.png" alt="ShortM" class="mx-auto d-block">

</div>

<div class="container mx-auto col-md-4">

    <div class="row d-flex justify-content-center text-center align-items-center ">

        <div class="input-group col-md-8 mx-auto">
            <input id="resultInput" name="url" type="url" value="<?= $slangAsLink; ?>"

                   class="form-control input-lg text-center"
                   readonly>
        </div>
        <br>
        <br>
        <div class="input-group col-md-8 mx-auto">
            <input name="btn" type="submit" id="btn" value="Copy"
                   data-clipboard-target="#resultInput" onclick="copy()"
                   class="btn btn-block btn-outline-primary form-control input-lg copyBtn" autofocus>
        </div>
        <br><br>
        <div id="qrCode"></div>
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

<!-- Copy to clipboard Section -->
<script src="/js/clipboardJS/clipboard.min.js"></script>
<script src="/js/zeroClipBoard/ZeroClipboard.min.js"></script>
<script>

    function copy() {
        var clipboard = new Clipboard('.copyBtn');
        var zeroClipBoard = new ZeroClipboard($(".copyBtn"));
        $.notify.defaults({
            className: "success"
        });
        $(".copyBtn").notify("Copied!");
    }
</script>
<!-- QR Code Section -->
<script src="/js/kjua-0.1.1.min.js"></script>
<script src="/js/jquery-qrcode-0.14.0.min.js"></script>

<script>

    let qrCode = kjua({
        render: 'canvas'
        , fill: '#333333'
        , back: '#ffffff'
        , text: '<?= $slangAsLink?>'
        , crisp: 'true'
        , minVersion: 5
        , ecLevel: 'H'
        , size: 300
        , rounded: 100
        , quiet: 1
        , mode: 'plain'
    });

    document.querySelector('#qrCode').appendChild(qrCode);

</script>

<?php
showErrorMSG();
?>
</body>
</html>
