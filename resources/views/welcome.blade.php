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
@if (auth()->check())
<div class="welcome">
    <div class="welcome__content">
            telegram_id: {{ Auth::user()->telegram_id }}
    </div>
</div>
@endif
</body>
</html>
