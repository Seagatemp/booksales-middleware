<!DOCTYPE html>
<html>
<head>
    <title>Daftar Genre</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        nav a {
            margin-right: 20px;
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}">Home (Genre)</a>
        <a href="{{ url('/author') }}">Author</a>
    </nav>

    <h1>Daftar Genre</h1>
    <ul>
        @foreach($genres as $genre)
            <li>{{ $genre['id'] }} - {{ $genre['nama'] }}</li>
        @endforeach
    </ul>
</body>
</html>
