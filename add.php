<?php
require('db.inc.php');

$name = "";
$description = "";
$hint = "";
$level = 1;
$latitude = 0;
$longitude = 0;

if (isset($_POST['formSubmit'])) {

    $name = $_POST['inputName'];

    $description = $_POST['inputDescription'];

    $hint = $_POST['inputHint'];

    $level = $_POST['inputLevel'];

    $latitude = $_POST['inputLatitude'];

    $longitude = $_POST['inputLongitude'];

    $success = insertGeocache(
        $name,
        $description,
        $hint,
        $level,
        $latitude,
        $longitude
    );
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Geocaches ADD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <main>
            <h2>Add new geocache</h2>
            <hr />

            <div class="alert alert-danger" role="alert">
                <ul>
                    <li>Error message 1</li>
                    <li>Error message 2</li>
                    <li>...</li>
                </ul>
            </div>

            <form method="post" action="add.php">

                <div class="form-group mt-3">
                    <label for="inputName" class="col-sm-2 col-form-label">Name: *</label>
                    <div>
                        <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Name">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Description:</label>
                    <div>
                        <textarea name="inputDescription" id="inputDescription" style="width: 100%"></textarea>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputHint" class="col-sm-2 col-form-label">Hint:</label>
                    <div>
                        <input type="text" class="form-control" id="inputHint" name="inputHint" placeholder="Hint">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputLevel" class="col-sm-2 col-form-label">Level: *</label>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inputLevel" id="inputLevel1" value="1" checked>
                            <label class="form-check-label" for="inputLevel1">
                                Easy
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inputLevel" id="inputLevel2" value="4">
                            <label class="form-check-label" for="inputLevel2">
                                Medium
                            </label>
                        </div>
                        <div class="form-check disabled">
                            <input class="form-check-input" type="radio" name="inputLevel" id="inputLevel3" value="2">
                            <label class="form-check-label" for="inputLevel3">
                                Hard
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="inputLevel" id="inputLevel2" value="3">
                            <label class="form-check-label" for="inputLevel2">
                                Impossible
                            </label>
                        </div>
                    </div>

                </div>

                <div class="form-group mt-3">
                    <label for="inputLatitude" class="col-sm-2 col-form-label">latitude: *</label>
                    <div>
                        <input type="text" class="form-control" id="inputLatitude" name="inputLatitude" placeholder="Latitude">
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="inputLongitude" class="col-sm-2 col-form-label">Longitude: *</label>
                    <div>
                        <input type="text" class="form-control" id="inputLongitude" name="inputLongitude" placeholder="Longitude">
                    </div>
                </div>

                <div class="form-group mt-5">
                    <div>
                        <button type="submit" class="btn btn-primary" name="formSubmit" style="width: 100%">Save</button>
                    </div>
                </div>
            </form>

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>