<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <img src="{{ asset('Mykisah.jpg') }}" class="login-image">

</head>
<body>



<<form method="POST" action="/login">
@csrf
<input name="email">
<input name="password" type="password">
<button>Login</button>
</form>

@if(session('error'))
<p>{{ session('error') }}</p>
@endif
