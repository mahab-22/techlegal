<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">На главную</a>
        </li>
    </ul>
    <form action="/getGledgeMovableProperty" method="post" enctype="application/x-www-form-urlencoded">
        <div class="mb-3">
            <label for="LastName" class="form-label">Фамилия</label>
            <input type="text" class="form-control" name="LastName" id="LastName" value="Мерзличенко">
        </div>
        <div class="mb-3">
            <label for="FirstName" class="form-label">Имя</label>
            <input type="text" class="form-control" name="FirstName"  value="Светлана">
        </div>
        <div class="mb-3 ">
            <label for="MiddleName" class="form-label">Отчество</label>
            <input type="text" class="form-control" name="MiddleName"  value="Владимировна">
        </div>
        <button type="submit" class="btn btn-primary">Получить</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
