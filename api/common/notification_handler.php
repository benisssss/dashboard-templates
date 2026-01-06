<!-- handles notification -->
<?php
if (isset($_SESSION['notification'])) {
	$notification = json_decode($_SESSION['notification'], true);
	echo <<<HTML
	    TOAST.fire({
		    icon: "{$notification['icon']}",
		    title: "{$notification['text']}",
	    });
	HTML;
	$_SESSION['notification'] = null;
} else {
    echo <<<HTML
        // no notification loaded
    HTML;
}
?>