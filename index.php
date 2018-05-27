<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <nav class="navbar navbar-expand-sm navbar-light">
        <a class="navbar-brand" href="/">SHORTM - COP4466</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="/records" class="nav-link">Records</a>
                </li>

            </ul>

        </div>
    </nav>
</div>
<form action="/shorten" method="post">
    <div class="container">

        <div class="row d-flex">

            <div class="input-group col-md-4">
                <input type="url" class="form-control input-lg" placeholder="Please enter the URL." autofocus required>
            </div>

        </div>

    </div>
</form>
</body>
</html>

<?php

?>
