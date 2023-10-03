<?php
$data = [
    ['2502001353', 'Albert Gabriel Tuwan', 'albert.tuwan@binus.ac.id', 'albert.jpg'],
    ['2502003775', 'Erin Kumala Aliwarga', 'erin.aliwarga@binus.ac.id', 'erin.jpg'],
    ['2502003895', 'Glory Daniella', 'glory.daniella@binus.ac.id', 'glory.jpg'],
    ['2501985451', 'Jason Adriel', 'jason.adriel@binus.ac.id', 'jason.jpg'],
    ['2301923615', 'Muhammad Fatih Ilman Syah', 'muhammad.fatih@binus.ac.id', 'fatih.jpg'],
    ['2501972625', 'Shelly Alfianda', 'shelly.alfianda@binus.ac.id', 'shelly.jpg'],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <h1>{{ $heading }} &nbsp; (ﾉ◕ヮ◕)ﾉ*:･ﾟ✧</h1>
    <div class="main-container">
        <div class="img-container">
            @foreach ($data as $person)
            <div class="img-card">
                <img src="{{ asset('images/' . $person[3]) }}" alt="">
                <div class="img-details">
                    <h4><i>{{ $person[0] }}</i></h4>
                    <h4><strong>{{ $person[1] }}</strong></h4>
                </div>
            </div>
            @endforeach
        </div>
        <div class="logo-container">
            <img src="{{ asset('images/logo-binus.svg') }}" alt="">
        </div>
    </div>

</body>

</html>