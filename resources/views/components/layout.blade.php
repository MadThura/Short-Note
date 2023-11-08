<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Note Book</title>
    <!-- Bootstrap Css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
</head>

<body>
    <x-navbar />
    {{$slot}}
    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fontawesome Js -->
    <script src="https://kit.fontawesome.com/6c05f0a96c.js" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>

</html>