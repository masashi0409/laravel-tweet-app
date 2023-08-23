<html>
<head>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>{{ $title ?? 'tweetApp' }}</title>
</head>
<body class="bg-gray-50">
  {{ $slot }}
</body>
</html>