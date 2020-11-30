<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP Test</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
<div class="wrapper">
    <main class="main-content">
        <div class="my-profile">
            <h2 class="heading">Мой профиль</h2>
            <div class="profile">
                <div class="avatar">
                    @if(empty($user->avatar))
                        <img src="/img/profile/image.jpg" alt="Аватар" class="avatar__pic">
                    @else
                        <img src="/img/profile/{{$user->avatar}}" alt="Аватар" class="avatar__pic">
                    @endif
                </div>
                <div class="information">
                    <div class="nickname">{{$user->nickname}}</div>
                    <div class="user-name">
                        <span class="name">{{$user->name}}</span>
                        <span class="surname">{{$user->surname}}</span>
                    </div>
                    <a href='tel:{{$user->phone}}' class="phone">{{$user->phone}}</a>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>
