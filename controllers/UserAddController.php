<?php

require_once(dirname(__FILE__) . '/../utils/config.php');

// Tableau d'erreur
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verification email ("VALIDE")
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    if (empty($email)) {
        $error['email'] = '! Please fill the field !';
    } else {
        $checkEmail = filter_var(
            $email,
            FILTER_VALIDATE_EMAIL,
        );
        if ($checkEmail === false) {
            $error['email'] = '! Please enter a valid email !';
        }
    }

    // Verification lastname ("VALIDE")
    $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    if (empty($lastname)) {
        $error['lastname'] = '! Please fill the field !';
    } else {
        $checkLastname = filter_var(
            $lastname,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REGEX_NAME . '/'))
        );
        if ($checkLastname === false) {
            $error['lastname'] = '! Please enter a valid name !';
        }
    }

    // verification date of birth ("VALIDE")
    $date = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_NUMBER_INT);
    if (empty($date)) {
        $error['date'] = '! Please fill the field !';
    } else {
        $checkdate = filter_var(
            $date,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REGEX_DOB . '/'))
        );
        if ($checkdate === false) {
            $error['date'] = '! Please enter a valid date !';
        }
    }

    // verification country of birth ("VALIDE")
    $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (in_array($country, $countries)) {
    } else {
        $error['country'] = '! Please choose a valid country !';
    }

    // verification zip Code ("VALIDE")
    $zipCode = filter_input(INPUT_POST, 'zipCode', FILTER_SANITIZE_NUMBER_INT);
    if (empty($zipCode)) {
        $error['zipCode'] = '';
    } else {
        $checkZipCode = filter_var(
            $zipCode,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/'))
        );
        if ($checkZipCode === false) {
            $error['zipCode'] = '! Please enter a valid Zip Code !';
        }
    }

    // verification diploma ("VALIDE")
    $diploma = intval(filter_input(INPUT_POST, 'diploma', FILTER_SANITIZE_NUMBER_INT));
    if ($diploma === 0) {
        $error['diploma'] = '! Please choose a diploma !';
    } else {
        $checkDiploma = filter_var(
            $diploma,
            FILTER_VALIDATE_INT,
            array("options" => array("min_range" => 1, "max_range" => 5)),
        );
        if ($checkDiploma === false) {
            $error['diploma'] = '! Please select a valid diploma !';
        }
    }

    // verification file ("NON VALIDE")
    if (isset($_FILES['filePicture'])) {
        $filePicture = $_FILES['filePicture'];
        if (!empty($filePicture['tmp_name'])) {
            if ($filePicture['error'] > 0) {
                $error["filePicture"] = "erreur lors du transfert du fichier";
            } else {
                if (!in_array($filePicture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                    $error["filePicture"] = "Le format du fichier n'est pas accepté";
                } else {
                    $extension = pathinfo($filePicture['name'], PATHINFO_EXTENSION);
                    $from = $filePicture['tmp_name'];
                    $fileName = uniqid('img_') . '.' . $extension;
                    $to = dirname(__FILE__) . '/../public/uploads/' . $fileName;
                    move_uploaded_file($from, $to);
                }
            }
        }
    }


    // verification URL ("VALIDE")
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_URL);
    if (empty($url)) {
        $error['url'] = '';
    } else {
        $checkUrl = filter_var(
            $url,
            FILTER_VALIDATE_REGEXP,
            array("options" => array("regexp" => '/' . REGEX_URL . '/'))
        );
        if ($checkUrl === false) {
            $error['url'] = '! Please enter a valid URL !';
        }
    }

    // verification programming ("VALIDE")
    $programming = intval(filter_input(INPUT_POST, 'programming', FILTER_SANITIZE_NUMBER_INT));
    if ($programming === 0) {
        $error['programming'] = '';
    } else {
        $checkProgramming = filter_var(
            $programming,
            FILTER_VALIDATE_INT,
            array("options" => array("min_range" => 1, "max_range" => 5)),
        );
        if ($checkProgramming === false) {
            $error['programming'] = '! Please select a valid programming language !';
        }
    }

    // verification message ("VALIDE")
    $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
}

include(dirname(__FILE__) . '/../views/templates/header.php');

if ($_SERVER["REQUEST_METHOD"] != "POST" || !empty($error)) {
    include(dirname(__FILE__) . '/../views/userAdd.php');
} else {
    include(dirname(__FILE__) . '/../views/userResult.php');
}

include(dirname(__FILE__) . '/../views/templates/footer.php');
