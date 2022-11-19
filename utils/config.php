<?php
define('REGEX_NAME', "^[a-zA-Zïëüÿöçâéèñôáóøšşćĕłăčőřžåķņńžůãşœæę '\-]*$");
define('REGEX_DOB', "^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})");
define('REGEX_ZIPCODE', "^[0-9]{5}");
define('REGEX_URL', "^(https:\/\/)?[a-z]{2,5}.linkedin.[a-z]{2,5}\/in\/[a-zA-Z0-9 \/-]*");

define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);

$countries = [
    'ALBANIA',
    'BULGARIA',
    'CANADA',
    'DENMARK',
    'EGYPT',
    'FRANCE',
    'GREENLAND',
    'HUNGARY',
    'ICELAND',
    'JAPAN',
    'KOREA',
    'LIECHTENSTEIN',
    'MEXICO',
    'NEW ZEALAND',
    'OMAN',
    'PERU',
    'QATAR',
    'ROMANIA',
    'SWEDEN',
    'TURKEY',
    'UNITED KINGDOM',
    'VENEZUELA',
    'MEXICO',
    'WALLIS AND FUTUNA',
    'YEMEN',
    'ZIMBABWE',
];
