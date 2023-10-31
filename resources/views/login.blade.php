<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('login.submit')}}" method="post">
    @csrf
    <input type="text" placeholder="email" name="email">
    @error('email')
    {{$message}}
    @enderror
    <input type="text" placeholder="password" name="password">
    @error('password')
    {{$message}}
    @enderror
    <button type="submit">login</button>
</form>
</body>
</html>

