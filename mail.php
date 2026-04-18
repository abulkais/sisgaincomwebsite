<?php


function loadEnv($path)
{
    if (!file_exists($path)) {
        die(".env not found");
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;

        if (strpos($line, '=') !== false) {
            list($name, $value) = explode('=', $line, 2);
            putenv(trim($name) . '=' . trim($value));
        }
    }
}

loadEnv(__DIR__ . '/.env'); // Load environment variables from .env file

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
// include("leadConfig.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function validate_mobile($number)
{
    if ($number != '') {

        return preg_match('/^[0-9]+$/', $number);
    }
}
function isValidEmail($email)
{
    if ($email != "") {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
date_default_timezone_set("Asia/Calcutta");

if (isset($_POST['form_submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $countrycode = $_POST['countrycode'];
    $budget = $_POST['budget'];
    $prefer = $_POST['prefer'];
    $message = $_POST['message'];
    $pagename = $_POST['comingfrom'];
    $recaptcha_response = $_POST['g-recaptcha-response'];

    if (isset($_POST['preventfromrobo']) && !empty($_POST['preventfromrobo'])) {
        echo '<script type="text/JavaScript"> 
        alert("Are you a Human or Bots ");</script>';
        echo '<script> window.location.href="404"</script>';
        die();
    }

    $isemailValid = isValidEmail($email);
    $isNumValid = validate_mobile($number);

    // Your reCAPTCHA secret key
    $secret_key = '6LeaMZspAAAAAB2q985TJujtzZeuif7SCkpAJPNZ';

    // Verify reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
    $response_data = json_decode($response);


    $ip_address = $_SERVER['REMOTE_ADDR'];
    function getBrowserInfo()
    {
        $ua = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($ua, 'Chrome') !== false) {
            $browser = 'Chrome';
        } elseif (strpos($ua, 'Firefox') !== false) {
            $browser = 'Firefox';
        } elseif (strpos($ua, 'Safari') !== false) {
            $browser = 'Safari';
        } else {
            $browser = 'Unknown';
        }

        if (strpos($ua, 'Windows') !== false) {
            $os = 'Windows';
        } elseif (strpos($ua, 'Mac') !== false) {
            $os = 'Mac';
        } elseif (strpos($ua, 'Linux') !== false) {
            $os = 'Linux';
        } else {
            $os = 'Unknown';
        }

        return "$browser on $os";
    }

    $device_info = getBrowserInfo();


    if ($response_data->success) {
        // reCAPTCHA validation passed
        if ($name != ""  && isset($isemailValid)  &&  isset($isNumValid) && $isNumValid != 0 && $budget != "" && $prefer != "") {
            $html = "Hi <br> We have received Enquiry from SISGAIN.COM for:" . $pagename . "<br> Name: " . $name . "<br> Email: " . $email . "<br> Phone Number: " . $countrycode . $number . "<br> Budget: " . $budget . "<br> Prefer: " . $prefer . "<br> Message: " . $message . "<br> IP Address: " . $ip_address . "<br> Device Info: " . $device_info . "<br> Date : " . date('D-M-Y  h-i-s A');

            //     $data_insert = "INSERT INTO enquiries(name, email, country_code, phone_number, budget, prefer, query, page_name, domain_name, ip_address, device_info) VALUES ('$name','$email','$countrycode', '$number', '$budget', '$prefer', '$message', '$pagename', 'SISGAIN.COM', '$ip_address','$device_info')";
            // $result = mysqli_query($conn, $data_insert);

        } else {
            echo '<script type="text/JavaScript"> 
            alert("Name , Email, Number, Budget and Prefer fields are mandatory" );history.back();
            </script>';
        }
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = getenv('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('MAIL_USERNAME');
            $mail->Password   = getenv('MAIL_PASSWORD');
            $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');
            $mail->Port       = getenv('MAIL_PORT');
            $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'));
            $mail->addAddress(getenv('MAIL_TO_ADDRESS'));

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Enquiry from SISGAIN.COM : ' . $pagename;
            $mail->Body    = $html;

            $mail->send();
            echo '<script> window.location.href="thankyou.php"</script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'reCAPTCHA validation failed';
    }
}


if (isset($_POST['withoutcaptchaform'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $countrycode = $_POST['countrycode'];
    $budget = $_POST['budget'];
    $prefer = $_POST['prefer'];
    $message = $_POST['message'];
    $pagename = $_POST['comingfrom'];


    $isemailValid = isValidEmail($email);
    $isNumValid = validate_mobile($number);



    $ip_address = $_SERVER['REMOTE_ADDR'];
    function getBrowserInfo()
    {
        $ua = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($ua, 'Chrome') !== false) {
            $browser = 'Chrome';
        } elseif (strpos($ua, 'Firefox') !== false) {
            $browser = 'Firefox';
        } elseif (strpos($ua, 'Safari') !== false) {
            $browser = 'Safari';
        } else {
            $browser = 'Unknown';
        }

        if (strpos($ua, 'Windows') !== false) {
            $os = 'Windows';
        } elseif (strpos($ua, 'Mac') !== false) {
            $os = 'Mac';
        } elseif (strpos($ua, 'Linux') !== false) {
            $os = 'Linux';
        } else {
            $os = 'Unknown';
        }

        return "$browser on $os";
    }

    $device_info = getBrowserInfo();


    // reCAPTCHA validation passed
    if ($name != ""  && isset($isemailValid)  &&  isset($isNumValid) && $isNumValid != 0 && $budget != "" && $prefer != "") {
        $html = "Hi <br> We have received Enquiry from SISGAIN.COM for:" . $pagename . "<br> Name: " . $name . "<br> Email: " . $email . "<br> Phone Number: " . $countrycode . $number . "<br> Budget: " . $budget . "<br> Prefer: " . $prefer . "<br> Message: " . $message . "<br> IP Address: " . $ip_address . "<br> Device Info: " . $device_info . "<br> Date : " . date('D-M-Y  h-i-s A');

        //     $data_insert = "INSERT INTO enquiries(name, email, country_code, phone_number, budget, prefer, query, page_name, domain_name, ip_address, device_info) VALUES ('$name','$email','$countrycode', '$number', '$budget', '$prefer', '$message', '$pagename', 'SISGAIN.COM', '$ip_address','$device_info')";
        // $result = mysqli_query($conn, $data_insert);

    } else {
        echo '<script type="text/JavaScript"> 
            alert("Name , Email, Number, Budget and Prefer fields are mandatory" );history.back();
            </script>';
    }
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host       = getenv('MAIL_HOST');
        $mail->SMTPAuth   = true;
        $mail->Username   = getenv('MAIL_USERNAME');
        $mail->Password   = getenv('MAIL_PASSWORD');
        $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');
        $mail->Port       = getenv('MAIL_PORT');

        $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'));
        $mail->addAddress(getenv('MAIL_TO_ADDRESS'));

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = 'Enquiry from SISGAIN.COM : ' . $pagename;
        $mail->Body    = $html;

        $mail->send();
        echo '<script> window.location.href="thankyou.php"</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['form_submit2'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $countrycode = $_POST['countrycode'];
    $companyName = $_POST['companyName'];
    $pagename = $_POST['comingfrom'];
    $recaptcha_response = $_POST['g-recaptcha-response'];

    if (isset($_POST['preventfromrobo']) && !empty($_POST['preventfromrobo'])) {
        echo '<script type="text/JavaScript"> 
        alert("Are you a Human or Bots ");</script>';
        echo '<script> window.location.href="404"</script>';
        die();
    }
    $isemailValid = isValidEmail($email);
    $isNumValid = validate_mobile($number);

    // Your reCAPTCHA secret key
    $secret_key = '6LeaMZspAAAAAB2q985TJujtzZeuif7SCkpAJPNZ';

    // Verify reCAPTCHA response
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$recaptcha_response");
    $response_data = json_decode($response);

    $ip_address = $_SERVER['REMOTE_ADDR'];
    function getBrowserInfo()
    {
        $ua = $_SERVER['HTTP_USER_AGENT'];

        if (strpos($ua, 'Chrome') !== false) {
            $browser = 'Chrome';
        } elseif (strpos($ua, 'Firefox') !== false) {
            $browser = 'Firefox';
        } elseif (strpos($ua, 'Safari') !== false) {
            $browser = 'Safari';
        } else {
            $browser = 'Unknown';
        }

        if (strpos($ua, 'Windows') !== false) {
            $os = 'Windows';
        } elseif (strpos($ua, 'Mac') !== false) {
            $os = 'Mac';
        } elseif (strpos($ua, 'Linux') !== false) {
            $os = 'Linux';
        } else {
            $os = 'Unknown';
        }

        return "$browser on $os";
    }

    $device_info = getBrowserInfo();
    if ($response_data->success) {
        // reCAPTCHA validation passed
        if ($name != ""  && isset($isemailValid)  &&  isset($isNumValid) && $isNumValid != 0 && $companyName != 0) {
            $html = "Hi <br> We have received Enquiry from SISGAIN.COM for:" . $pagename . "<br> Name: " . $name . "<br> Email: " . $email . "<br> Phone Number: " . $countrycode . $number . "<br> Company Name: " . $companyName . "<br> IP Address: " . $ip_address . "<br> Device Info: " . $device_info . "<br> Date : " . date('D-M-Y  h-i-s A');

            // $data_insert = "INSERT INTO enquiries(name, email, country_code, phone_number, prefer, query, page_name, domain_name, ip_address, device_info) VALUES ('$name','$email','$countrycode', '$number', '$companyName', '$message', '$pagename', 'SISGAIN.COM', '$ip_address','$device_info')";
            // $result = mysqli_query($conn, $data_insert);
        } else {
            echo '<script type="text/JavaScript"> 
            alert("Name , Email, Number and Company Name fields are mandatory" );history.back();
            </script>';
        }
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host       = getenv('MAIL_HOST');
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('MAIL_USERNAME');
            $mail->Password   = getenv('MAIL_PASSWORD');
            $mail->SMTPSecure = getenv('MAIL_ENCRYPTION');
            $mail->Port       = getenv('MAIL_PORT');

            $mail->setFrom(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'));
            $mail->addAddress(getenv('MAIL_TO_ADDRESS'));
            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Enquiry from SISGAIN.COM : ' . $pagename;
            $mail->Body    = $html;

            $mail->send();
            echo '<script> window.location.href="thankyou.php"</script>';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'reCAPTCHA validation failed';
    }
}
