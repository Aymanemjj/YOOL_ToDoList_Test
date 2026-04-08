<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tasks manager</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-amber-100">
    <div class=" max-w-xl mx-auto mt-12 px-5">
        <nav class="bg-white shadow mb-8">
            <div class="max-w-3xl mx-auto px-4 py-4 flex justify-end">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm text-red-600 hover:underline">Logout</button>
                </form>
            </div>
        </nav>
        {{ $slot }}
    </div>
</body>

</html>
