<div id="results">
    <h1 class="text-center">Your Info</h1>

    <ul>
        <?php if ($email) { ?>
            <li><strong>Email: </strong><?= $email ?></li>
        <?php } ?>

        <?php if ($lastname) { ?>
            <li><strong>Name: </strong><?= $lastname ?></li>
        <?php } ?>

        <?php if ($date) { ?>
            <li><strong>Date Of Birth: </strong><?= date('d.m.Y', strtotime($date)) ?></li>
        <?php } ?>

        <?php if ($country) { ?>
            <li><strong>Country Of Birth: </strong><?= $country ?></li>
        <?php } ?>

        <?php if ($zipCode) { ?>
            <li><strong>Zip Code: </strong><?= $zipCode ?></li>
        <?php } ?>

        <?php if ($diploma) {
            switch ($diploma) {
                case 1:
                    $diplomaValue = "No Degree";
                    break;
                case 2:
                    $diplomaValue = "Degree";
                    break;
                case 3:
                    $diplomaValue = "2-year uni Degree";
                    break;
                case 4:
                    $diplomaValue = "Bachelor's Degree";
                    break;
                case 5:
                    $diplomaValue = "Master's Degree (or more)";
                    break;
                default:
                    break;
            }
        ?>
            <li><strong>Your Diploma: </strong><?= $diplomaValue ?></li>
        <?php } ?>

        <?php if (isset($fileName)) { ?>
            <li><strong>Picture: </strong>
                <img src="/public/uploads/<?= $fileName ?>" class="imgProfile">
            </li>
        <?php } ?>

        <?php if ($url) { ?>
            <li><strong>Linkedin: </strong><?= $url ?></li>
        <?php } ?>

        <?php if ($message) { ?>
            <li><strong>Expérience en programmation : </strong><?= nl2br($message) ?></li>
        <?php } ?>
    </ul>

</div>