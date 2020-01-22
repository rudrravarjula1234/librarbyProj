<!DOCTYPE html>
<html>

<head>
    <title>
    </title>
</head>

<body>
    <form method="GET" action="takebook.php">
        <div class="form-group">
            <label for="sbook">Scan Book</label>
            <input type="text" name="book" class="form-control" placeholder="Scan Book or enter Book id" id="sbook">
        </div>
        <div class="form-group">
            <label for="sid">Scan Student Id</label>
            <input type="text" name="std" class="form-control" placeholder="Scan Student Id" id="sid">
        </div>
        <input type="submit" class="btn btn-primary" name="submit">
    </form>
</body>

</html>