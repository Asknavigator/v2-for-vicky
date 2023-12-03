<?php
if (isset($_GET['phone'])) {
    // Sanitize input
    $name = htmlspecialchars($_GET['name']);
    $phone = htmlspecialchars($_GET['phone']);
    $bhk_label = htmlspecialchars($_GET['bhk_label']);
    $re_from = htmlspecialchars($_GET['re_from']);
    $re_to = htmlspecialchars($_GET['re_to']);

    // Slack notification
    $url = "https://hooks.slack.com/services/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";
    $data = array(
        "text" => "*New message from* " . $name . "\n" .
            "Phone number: " . $phone . "\n" .
            "What moving: " . $bhk_label . "\n" .
            "Relocation from: " . $re_from . "\n" .
            "Relocation to: " . $re_to
    );
    $options = array(
        "http" => array(
            "header"  => "Content-type: application/json",
            "method"  => "POST",
            "content" => json_encode($data),
        ),
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);

    if ($result === false) {
        echo "Error: The message was not sent to Slack.";
    } else {
        echo "Message sent to Slack successfully.";
    }
} else {
    echo "Error: Phone parameter not set.";
}
?>
