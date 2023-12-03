
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Home</title>
</head>
<body style="background-image: url({{asset('delicious-pizza-indoors.jpg')}}) ;background-size: cover">
<div class="  "   >
    <!-- Navigation Bar -->
    <nav class=" ">
        <div class="max-w-7xl mx-auto px-4 py-2 flex justify-between items-center">
            <div class="text-white dark:text-gray-300 text-2xl font-semibold">Snapp Food</div>
            <div class="space-x-4">
                <a class="px-4 py-2 text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50" href="{{route('register')}}">
                    Register
                </a>
                <a class="px-4 py-2 text-white transition-colors duration-200 transform bg-blue-600 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50" href="{{route('login')}}">
                    Login
                </a>
            </div>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="  max-w-7xl mx-auto py-16 px-4">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-700 dark:text-white">Welcome dear Seller</h1>
            <p class="mt-3 text-gray-500 dark:text-gray-300">The best platform for  selling food.</p>
        </div>
    </div>

    <!-- Image Section -->
    <div class="text-center">
{{--        <img src="../delicious-pizza-indoors.jpg"  alt="Food Image" class="max-w-full mt-8" />--}}
    </div>
</div>

</body>
</html>

