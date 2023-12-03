<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 Error</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>

.page-not-found {
    background-color: #00030C;
    height: 100vh;
}
.page-not-found h2 {
    font-size: 130px;
    color: #e91e63;
}
.page-not-found h3 {
    font-size: 42px;
}
.page-not-found .bg-light {
    width: 50%;
    padding: 50px;
    text-align: center;
    border-radius: 5px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

@media (max-width:  767px) {
    .page-not-found h2 {
        font-size: 100px;
    }
    .page-not-found h3 {
        font-size: 28px;
    }
    .page-not-found .bg-light {
        width: 100%;
    }
}

    </style>
</head>
<!-- 404 - Retroflix -->
<body class="bg-light">
    <!-- Not Found Page HTML -->
<div class="page-not-found pt-5">
    <div class="bg-light shadow">
        <h2>4<i class="bi bi-bug"></i>4</h2>
        <h3 class="mt-4">Opps! essa página não existe.</h3>
        <div class="mt-5">
            <button type="button" class="btn m-2 m-md-0 btn-primary" onclick="location.href='/'"><i class="bi bi-house-door-fill"></i> Voltar para HOME</button>
        </div>
    </div>
</div>
</body>
</html>