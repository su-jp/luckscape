<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuckScape - 오늘의 운세</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <header class="text-center py-3 bg-success text-white">
        <h3 class="mb-0">🍀 Luckscape 🍀</h3>
    </header>
    <div class="container text-center mt-3">
        <?php if($error = session()->getFlashdata('error')): ?>
        <div class="alert alert-danger fade-message"><?= esc($error) ?></div>
        <?php endif; ?>