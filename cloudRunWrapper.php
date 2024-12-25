<?php
// Wrapper function to call makefulltextfeed.php from Google Cloud Platform Cloud Run

function callMakeFullTextFeed($url) {
    // Validate URL
    if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
        return json_encode(array('error' => 'Invalid URL'));
    }

    // Set the URL parameter
    $_GET['url'] = $url;

    // Include the makefulltextfeed.php script
    include 'makefulltextfeed.php';

    // Capture the output
    ob_start();
    include 'makefulltextfeed.php';
    $output = ob_get_clean();

    // Return the output
    return $output;
}

// Example usage
if (isset($_GET['url'])) {
    header('Content-Type: application/json');
    echo callMakeFullTextFeed($_GET['url']);
} else {
    echo json_encode(array('error' => 'No URL provided'));
}
?>