# PHP_Twillio_SMS_app
Basic PHP Twillio application for sending emails to phone numbers and send/verify codes

###### This application is an example with following functionality:

> - Send SMS to registered numbers
> - Send authorization codes to registered numbers
> - Validation of authorization codes that were sent to registered numbers


#### Installation

1. Install this code on your local system
     
    1. Fork this repository (click 'Fork' button in top right corner)
    2. Clone the forked repository on your local file system
    
        ```
        cd /path/to/install/location
        
        git clone https://github.com/Maksim1990/PHP_Twillio_SMS_app.git
        ```

2. Change directory into the local clone of the repository

    ```
    cd PHP_Twillio_SMS_app
    ```

 3. Set database connection by changing (if necessary) below credentials in `app/config.php` file: 
     ```
    defined("DB_HOST") ? null : define("DB_HOST", "localhost");
    defined("DB_USER") ? null : define("DB_USER", "root");
    defined("DB_PASS") ? null : define("DB_PASS", "");
    defined("DB_NAME") ? null : define("DB_NAME", "sms_php_DB");
    ```
    
  4. Register account on [Twilio](https://www.twilio.com) and set following details in `app/config.php` file
  
     ```
     'account_sid' => 'xxx',
    'auth_token' => 'xxx',
    'phone_number' => 'xxx',
    'code_number' => 'xxx'
    ```

 ![#f03c15](https://placehold.it/15/f03c15/000000?text=+)   **ATTENTION!**

 #####  `phone_number` is number that is Authorized in Twillio from what SMS will be sent
   
 #####  `code_number` is number that is Authorized in Twillio to what SMS will be sent
