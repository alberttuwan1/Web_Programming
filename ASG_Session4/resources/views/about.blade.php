<?php
$data = [
    ['2502001353 - Albert Gabriel Tuwan', 'albert.tuwan@binus.ac.id'],
    ['2502003775 - Erin Kumala Aliwarga', 'erin.aliwarga@binus.ac.id'],
    ['2502003895 - Glory Daniella', 'glory.daniella@binus.ac.id'],
    ['2501985451 - Jason Adriel', 'jason.adriel@binus.ac.id'],
    ['2301923615 - Muhammad Fatih Ilman Syah', 'muhammad.fatih@binus.ac.id'],
    ['2501972625 - Shelly Alfianda', 'shelly.alfianda@binus.ac.id'],
];

$urls = [
    'albert.jpg',
    'erin.jpg',
    'glory.jpg',
    'jason.jpg',
    'fatih.jpg',
    'shelly.jpg'
];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"">
</head>
<body>
    <h1>(i) {{ $heading }} Page:</h1>

    <div class = "data">
        <br>
        <i>Names:</i>
        @foreach ($data as $person)
            <h3>{{ $person[0] }}</h3>
        @endforeach
        <br>
        <i>Emails:</i>
        @foreach ($data as $person)
            <h4>{{ $person[1] }}</h4>
        @endforeach
    </div>

    <div class = "images">
        <i>Photos:</i>
        <br>
        @foreach ($urls as $url)
            <img src=" {{ asset('images/' . $url) }} " alt="">
        @endforeach
    </div>
    
    </body>

</html>