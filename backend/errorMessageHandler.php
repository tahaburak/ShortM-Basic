<?php

//check if there is an error message in this session
$errorMessage = "noError";

if (array_key_exists('errorMessage', $_SESSION) && !empty($_SESSION['errorMessage'])) {
	$errorMessage = $_SESSION['errorMessage'];
}
//store the error message and remove it from session
unset($_SESSION['errorMessage']);


function showErrorMSG()
{

	//show error message if it's not "noError"
	if ($GLOBALS['errorMessage'] !== "noError"):
		?>
		<script>
            jQuery.notify.defaults({
                className: 'error',
                clickToHide: true,
                autoHide: false,
                globalPosition: 'top center'
            });

            jQuery.notify("<?=$GLOBALS['errorMessage']?>");
		</script>
		<script>
            var cornerDiv = jQuery(".notifyjs-corner");
            cornerDiv.attr('style', 'top: 0px; left: 50%;transform: translateX(-50%)');
		</script>
	<? endif;


}
?>
