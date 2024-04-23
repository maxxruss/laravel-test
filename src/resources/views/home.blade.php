<!DOCTYPE html>
<html>

<body>
    <h1>Home</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</body>

</html>