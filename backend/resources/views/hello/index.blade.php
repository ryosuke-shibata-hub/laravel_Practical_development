<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
<style>
th { background-color:red; padding:10px; }
td { background-color:#eee; padding:10px; }
</style>

<body>
    <h1>Hello/Index</h1>
    <p>{{ $msg }}</p>
    <ul>
        @foreach($data as $data)
            <li>{!! $data !!}</li>
        @endforeach
    </ul>
</body>
</html>
