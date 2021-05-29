<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <style>
        #first {
            border-style: solid;
            margin: 0 auto;
            width: 700px;
        }
    </style>
</head>

<body>
    <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as  $error) : ?>
                <p><?= $error ?></p>
            <?php endforeach ?>
        </div>
    <?php endif ?>
    <div id="first">
        <form action="/register" method="post">
            <?= csrf_field() ?>
            <!-- usernams -->
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">First and last name</span>
                </div>
                <input type="text" aria-label="First name" class="form-control" name="username" required>
                <!-- <input type="text" aria-label="Last name" class="form-control" > -->
            </div>
            <br>
            <!-- email -->
            <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="addon-wrapping">E-Mail</span>
                </div>
                <input type="text" class="form-control" aria-label="Username" aria-describedby="addon-wrapping" name="email">
            </div>
            <br>
            <!-- password -->
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">password</span>
                </div>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="password">
            </div>
            <br>

            <!-- matchpassword -->
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">mch-password</span>
                </div>
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="matchpassword">
            </div>
            <br>
            <!-- address -->
            <div class="input-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">address</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="address">
            </div>
            <!-- phone -->
            <br>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">phone</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="phone">
            </div>
            <!-- idcard -->
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">IDcard</span>
                </div>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="IDcard">
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-success">Success</button>
    </div>
    </form>
</body>

</html>