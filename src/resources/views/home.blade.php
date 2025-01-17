<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>main</title>
</head>

<body>
    <!-- Проверка на существование и перебор массива пользователей -->
    @if(is_array($names) && count($names) > 0)
    @foreach($names as $user)
    <p>ID: {{ $user['id'] }}, Name: {{ $user['name'] }}</p>
    @if ($loop->first)
    This is the first iteration of the parent loop.
    @endif
    @endforeach
    @else
    <p>No users found.</p>
    @endif


</body>

</html>