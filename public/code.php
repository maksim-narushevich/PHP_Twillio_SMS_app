<?php

use Twilio\Rest\Client;

require '../includes/header.php';

try {
    $client = new Client($config['account_sid'], $config['auth_token']);


    $_SESSION['code'] = $code = uniqid();
    $con->query("INSERT INTO verifications(code) VALUES('$code')");
    try {
        $client->account->messages->create('+' . $config['code_number'], ['from' => $config['phone_number'], 'body' => $code]);
        
    } catch (Services_Twilio_RestException $e) {
        die('Sorry could not connect because it could not ' . $e->getMessage());
    }
    echo "<h3 class='text-center bg-success'>You Code has been sent</h3>";
} //catch exception
catch (Exception $e) {
    echo 'Message: ' . $e->getMessage();
}


?>


<?php require '../includes/footer.php' ?>
