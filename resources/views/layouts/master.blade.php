<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8" />
    <title>Scrabble Word Score Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<body class="container-fluid">
    <h1>Scrabble Word Score Calculator</h1>

    <form method="GET" action="/">

        <div class="row">
            <span class="help-block col-xs-12">Fields marked with * are required.</span>
        </div>

        <div class="row">
            Letters go here!
        </div>

        <div class="row">
            <div class="checkbox form-group col-xs-12">
                <label for="bingo">
                    <input type="checkbox" name="bingo" value="bingo" id="bingo" <?php if($bingo) echo "CHECKED"?> />This word used all seven tiles.
                </label>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-1">
                <input type="submit" value="Submit" class="btn btn-primary" />
            </div>
            <div class="form-group col-xs-1">
                <button type="reset" value="Reset Form" class="btn btn-default">Reset Form</button>
            </div>
        </div>
    </form>

    <div>
        Something with results goes down here!
    </div>

</body>

</html>
