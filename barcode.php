<!DOCTYPE html>
<html>

<head>
    <title>
    </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#myForm input').keydown(function(e) {
                if (e.keyCode == 13) {

                    if ($(':input:eq(' + ($(':input').index(this) + 1) + ')').attr('type') == 'submit') { // check for submit button and submit form on enter press
                        return true;
                    }

                    $(':input:eq(' + ($(':input').index(this) + 1) + ')').focus();

                    return false;
                }

            });
        });
    </script>
</head>

<body>
    <form method="GET" action="takebook.php" id="myForm">
        <div class="form-group">
            <label for="sbook">Scan Book</label>
            <input type="text" name="book" class="form-control" placeholder="Scan Book or Enter Book ID" id="sbook">
        </div>
        <div class="form-group">
            <label for="sid">Scan People ID</label>
            <input type="text" name="std" class="form-control" placeholder="Scan People ID" id="sid">
        </div>
        <input type="submit" class="btn btn-primary" name="submit">
    </form>
</body>

</html>