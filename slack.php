<?php
if (isset($_GET['phone'])) {
  //get data from form
  $name = $_GET['name'];
  $phone = $_GET['phone'];
  $bhk_label = $_GET['bhk_label'];
  $re_from = $_GET['re_from'];
  $re_to = $_GET['re_to'];
  $source = "shiftingway";

  // Mail Code
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  $to = "ybhardwajboy@gmail.com";
  $subject = "Mail From website";
  $message = "Name = " . $name . "\r\nphone = " . $phone . "\r\nbhk_label =" . $bhk_label . "\r\nre_from =" . $re_from . "\r\nre_to =" . $re_to;

  $headers = 'From: contact@thepackersmoversdelhi.com'       . "\r\n" .
               'Reply-To: contact@thepackersmoversdelhi.com' . "\r\n" .
               'X-Mailer: PHP/' . phpversion();

  if(mail($to,$subject,$message, $headers)) {
      //  header("Location:https://quick.asknavigator.com/survey.php");
      echo "works 1";
  } else {
      echo "The email message was not sent 1.";
  }
}


header("Location: https://packers-movers.xyz/?q=".$pageid);

$url = "https://hooks.slack.com/services/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"; // Replace with your own webhook URL
$data = array(
    "text" => "*New message from* ".$name. "\n".
              "Phone number: ".$phone. "\n".
              "What moving: " .$bhk_label. "\n".
              "Relocation from: " .$re_from. "\n".
              "Relocation to: ".$re_to
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
    echo "The message was not sent to Slack.";
} else {
    echo "The message has been sent to Slack.";
};

 header("Location: https://packers-movers.xyz/?q".$pageid);


?>

