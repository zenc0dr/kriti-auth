<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Pro.Kriti</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/kriti-mp.css') }}">
    <link rel="icon" type="image/svg" href="/images/kriti-icon.svg">
    <script src="{{ mix('js/kriti-mp.js') }}" defer></script>
</head>
<body>
<div id="kriti-app"></div>
<div class="welcome">
    <div class="welcome__content">
        @if (auth()->check())
            telegram_id: <pre>{{ Auth::user()->telegram_id }}</pre>
        @endif
    </div>
</div>
</body>
</html>
