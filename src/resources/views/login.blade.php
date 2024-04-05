<!DOCTYPE html>
<html>

<body>
    <h1>login</h1>
    <form method="POST" action="/profile">
        @csrf

        <!-- Эквивалентно ... -->
        <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> -->
        <input name="login" />
        <button type="submit">отправить</>
    </form>
</body>

</html>