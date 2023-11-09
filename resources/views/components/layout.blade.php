<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Short Note</title>
    <link rel="icon" type="image/x-icon" href="/images/M A D.png">
    <!-- Bootstrap Css link-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
</head>

<body>
    <x-navbar />
    @if(session()->has('success'))
    <!-- <div class="alert alert-success" role="alert">
        {{session('success')}}
    </div> -->
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{$slot}}
    <!-- Bootstrap Js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Fontawesome Js -->
    <script src="https://kit.fontawesome.com/6c05f0a96c.js" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
</body>

</html>