<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" novalidate>
    <!-- Input email -->
    <div class="mb-3">
        <label for="email">* Email:</label>
        <input name="email" type="email" value="<?= $email ?? '' ?>" required class="form-control" id="email">
        <p class="error"><?= $error['email'] ?? '' ?></p>
    </div>

    <!-- Input lastname -->
    <div class="mb-3">
        <label for="lastname">* Lastname:</label>
        <input name="lastname" type="text" value="<?= $lastname ?? '' ?>" required pattern="<?= REGEX_NAME ?>" class="form-control" id="lastname">
        <p class="error"><?= $error['lastname'] ?? '' ?></p>
    </div>

    <!-- Input date of birth -->
    <div class="mb-3">
        <label for="date">* Date Of Birth:</label>
        <input name="date" type="date" value="<?= $date ?? '' ?>" required pattern="<?= REGEX_DOB ?>" class="form-control" id="date" min="1900-01-01" max="2009-12-31">
        <p class="error"><?= $error['date'] ?? '' ?></p>
    </div>

    <!-- Select country of birth -->
    <div class="col-md-6 mb-3">
        <label for="country">* Country Of Birth:</label>
        <select class="col-md-8" name='country'>
            required
            <option>--Choose your country--</option>
            <?php
            foreach ($countries as $key => $country) { // Boucle pour les pays
                $key = $key + 1; // Pour mettre le premier pays à 1
                echo "<option> $country </option>";
            };
            ?>
        </select>
        <p class="error"><?= $error['country'] ?? '' ?></p>
    </div>

    <!-- Select zip code -->
    <div class="mb-3">
        <label for="zipCode">Zip Code:</label>
        <input name="zipCode" type="text" value="<?= $zipCode ?? '' ?>" pattern="<?= REGEX_ZIPCODE ?>" class="form-control" id="zipCode">
        <p class="error"><?= $error['zipCode'] ?? '' ?></p>
    </div>

    <!-- Select diploma -->
    <div class="mb-3">
        <label for="diploma">* Diploma:</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="diploma" class="form-check-input" type="radio" required id="noDegree" value="1">
        <label class="form-check-label-radio" for="diploma">No Degree</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="diploma" class="form-check-input" type="radio" required id="degree" value="2">
        <label class="form-check-label-radio" for="inlineRadio">Degree</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="diploma" class="form-check-input" type="radio" required id="degree+2" value="3">
        <label class="form-check-label-radio" for="diploma">2-year uni Degree</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="diploma" class="form-check-input" type="radio" required id="bachelor" value="4">
        <label class="form-check-label-radio" for="diploma">Bachelor's Degree</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="diploma" class="form-check-input" type="radio" required id="master" value="5">
        <label class="form-check-label-radio" for="diploma">Master's Degree (or more)</label>
    </div>
    <p class="error"><?= $error['diploma'] ?? '' ?></p>

    <!-- Select profil picture -->
    <div class="mb-3">
        <label for="filePicture">Please submit a profil picture:</label>
    </div>
    <div class="mb-3">
        <input name="filePicture" type="file" accept="image/jpeg" class="form-control" id="Jpeg">
    </div>
    <p class="error"><?= $error['filePicture'] ?? '' ?></p>


    <!-- Select LinkedIn URL -->
    <div class="mb-3">
        <label for="url">Enter your LinkedIn URL:</label>
        <input name="url" type="url" value="<?= $url ?? '' ?>" pattern="<?= REGEX_URL ?>" class="form-control" id="url">
        <p class="error"><?= $error['url'] ?? '' ?></p>
    </div>

    <!-- Select programming language -->
    <div class="mb-3">
        <label for="programming">What programming language do you know ?</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="programming" class="form-check-input" type="checkbox" id="html_css" value="1">
        <label class="form-check-label-check" for="inlineCheckbox">HTML/CSS</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="programming" class="form-check-input" type="checkbox" id="php" value="2">
        <label class="form-check-label-check" for="inlineCheckbox">PHP</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="programming" class="form-check-input" type="checkbox" id="js" value="3">
        <label class="form-check-label-check" for="inlineCheckbox">Javascript</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="programming" class="form-check-input" type="checkbox" id="python" value="4">
        <label class="form-check-label-check" for="inlineCheckbox">Python</label>
    </div>
    <div class="form-check form-check-inline">
        <input name="programming" class="form-check-input" type="checkbox" id="autres" value="5">
        <label class="form-check-label-check" for="inlineCheckbox">Others</label>
    </div>
    <p class="error"><?= $error['programming'] ?? '' ?></p>

    <!-- Select message -->
    <div class="mb-3">
        <label for="message" class="form-label">Did you already have experience with programming and/or IT before completing this form ?</label>
        <textarea name="message" class="form-control" id="message" rows="4"></textarea>
    </div>

    <div class="mb-3 text-center">
        <input type="submit" value="Submit" class="btn btn-lg" id="validForm">
    </div>

</form>