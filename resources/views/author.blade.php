<!DOCTYPE html>
<html>
<head>
    <title>Daftar Author</title>
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
        <a href="{{ url('/') }}">Genre</a>
        <a href="{{ url('/author') }}">Home (Author)</a>
    </nav>

    <h1>Daftar Author</h1>
    <ul>
        @foreach($authors as $author)
            <li>{{ $author['id'] }} - {{ $author['nama'] }}</li>
        @endforeach
    </ul>
</body>
</html>
