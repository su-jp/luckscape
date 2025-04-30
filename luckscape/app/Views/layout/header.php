<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuckScape - 오늘의 운세</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
            href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap"
            rel="stylesheet"
    />
    <link
            href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@300;400;500;700&display=swap"
            rel="stylesheet"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css"
    />
    <link href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Noto Sans KR', sans-serif;
            background-image: url('/images/background.jpg');
            background-size: contain;
            background-position: top center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-color: #350863;
        }
        .date-picker::-webkit-calendar-picker-indicator {
            filter: invert(1);
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: transparent;
            color: transparent;
            cursor: pointer;
        }
        input[type=date]::-webkit-inner-spin-button,
        input[type=date]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        input[type=date] {
            -webkit-appearance: none;
        }
        .max-width {
            max-width: 480px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>
<body class="text-gray-900 min-h-screen">
<!-- Header -->
<header
        class="fixed w-full top-0 z-10 bg-primary/90 backdrop-blur-md shadow-md"
>
    <div class="flex items-center justify-between px-4 py-3">
        <div class="w-8 h-8 flex items-center justify-center">
<!--            <i class="ri-menu-line ri-lg text-white"></i>-->
        </div>
        <a class="font-['Pacifico'] text-2xl text-white" href="/">LuckScape</a>
        <div class="w-8 h-8 flex items-center justify-center">
<!--            <i class="ri-user-line ri-lg text-white"></i>-->
        </div>
    </div>
</header>
<!-- Main Content -->
<main class="pt-16 pb-20 px-4 max-width">