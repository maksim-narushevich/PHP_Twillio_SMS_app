<?php

use Twilio\Rest\Client;

require '../includes/header.php';


if (isset($_POST['submit'])) {


    if (isset($_POST['number']) && !empty($_POST['number']) && isset($_POST['message']) && !empty($_POST['message'])) {

        try {
            $client = new Client($config['account_sid'], $config['auth_token']);
            $client->account->messages->create('+' . $_POST['number'], ['from' => $config['phone_number'], 'body' => $_POST['message']]);
            //-- Register message details in DB
            $blnQuery = $con->query("INSERT INTO messages(to_number,from_number,message) VALUES('" . $_POST['number'] . "','" . $config['phone_number'] . "','" . $_POST['message'] . "')");
            if ($blnQuery) {
                echo "<h3 class='text-center bg-success'>Message has been sent</h3>";
            } else {
                echo "<h3 class='text-center bg-danger'>Message has been NOT sent</h3>";
            }
        }
            //catch exception
        catch(Exception $e) {
            echo 'Message: ' .$e->getMessage();
        }


    } else {
        echo "<h3 class='text-center bg-danger'>Number and message fields can't be empty</h3>";
    }


}


?>


<div class="col-sm-6 col-sm-offset-3">


    <form role="form" method="post">
        <div class="form-group">
            <label for="email">Phone Number</label>
            <input name="number" type="tel" class="form-control" id="email" required placeholder="Enter number (Example: 375334445566)">
        </div>
        <div class="form-group">
            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Enter your message"></textarea>
        </div>

        <input name="submit" type="submit" class="btn btn-primary btn-block" value="Send Message">
    </form>


</div>


<?php require '../includes/footer.php' ?>
