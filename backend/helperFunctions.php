<?php

function prePrint($value)
{
	print '<pre>';
	print_r($value);
	print '</pre>';

}

// Abort the operation and send user to the target page.
// if target is not exists redirect to index page.

function abortRedirect($errorMessage = "", $target = "index")
{
	if (strlen($errorMessage) > 0 && strlen($target) > 0) {
		$_SESSION["errorMessage"] = $errorMessage;
		header("Location: /$target");
		exit();
	}
}

// Get User's IP as long
function getIP()
{
	$client = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote = $_SERVER['REMOTE_ADDR'];

	if (filter_var($client, FILTER_VALIDATE_IP)) {
		$ip = $client;
	} elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
		$ip = $forward;
	} else {
		$ip = $remote;
	}
	return (empty($ip) || $ip < 1) ? 1 : ip2long($ip);
}

// Generate readable random string to shorten url
function generateReadableRandomString($length = 5)
{
	$array = "bcdfghjklmnprstvyzaeiou";
	$result = "";
	$randDecision = mt_rand(0, 1);
	$length += $randDecision;

	switch ($randDecision) {
		case 0:
			for ($i = 0; $i < $length; $i++) {
				$result .= ($i % 2) ? $array[mt_rand(0, 17)] : $array[mt_rand(18, 22)];
			}
			break;
		case 1:
			for ($i = 0; $i < $length; $i++) {
				$result .= ($i % 2) ? $array[mt_rand(18, 22)] : $array[mt_rand(0, 17)];
			}
			break;
		default:
			for ($i = 0; $i < $length; $i++) {
				$result .= ($i % 2) ? $array[mt_rand(0, 17)] : $array[mt_rand(18, 22)];
			}
			break;
	}

	return $result;

}

/* Check if url has http or https protocol. if not add http.*/
function addHTTPProtocolIfNeeded($url)
{

	if ((!(substr($url, 0, 7) == 'http://')) && (!(substr($url, 0, 8) == 'https://'))) {
		$url = 'http://' . $url;
	}


	return $url;

}

// Check if the data is really a url
function validateURL($url)
{
    return !(filter_var($url, FILTER_VALIDATE_URL) === FALSE);

}

// Loader for pages

function getLoader()
{
	?>
	<div id="loader-wrapper">
		<div id="loader"></div>
		<div class="loader-section section-left"></div>
		<div class="loader-section section-right"></div>
	</div>

	<script>
        var removed = false;

        function removeLoader() {
            if (document.readyState === "complete" && $("#loaderCSS").length > 0 && $("#loader").length > 0) {
                /* $("#loader").hide('slow',function () {
                 this.remove();
                 });*/
                $("#loader").remove();
                $("#loaderCSS").remove();

                removed = true;
            }

        }
        var interval = setInterval(function () {
            if (removed) {
                clearInterval(interval);
            }
            else {
                removeLoader();
            }
        }, 1000);

	</script>
	<?


}
