<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
    <link href="{{ asset('app.css') }}" rel="stylesheet">
</head>
<body>
<form method="POST" action="{{ route('crop') }}" enctype="multipart/form-data">
    <h2>Crop & Upload</h2>
    @csrf
    <label class="file-upload" for="image">Upload afbeelding</label>
    <input type="file" required id="image" name="image">
    <label for="width" class="crop-size">Crop-width
        <input type="text" required id="width" name="width">
    </label>
    <label for="height" class="crop-size">Crop-height
        <input type="text" required id="height" name="height">
    </label>
    <input type="submit" value="croppen">
</form>
</body>
</html>
