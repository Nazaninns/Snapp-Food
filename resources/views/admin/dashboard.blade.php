<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
        }

        .header {
            background-color: #111827;
            color: #fff;
            text-align: center;
        }

        .navbar {
            background-color: #111827;
            color: #fff;
            display: flex;
            justify-content: flex-end;
            padding: 10px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;


            justify-content: space-between;
        }

        .food-card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            width: 30%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .report-section {
            background-color: #f9f9f9;
            padding: 20px;
            margin: 20px 0;
        }

        .settings-button {
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body
    style="background-size: cover; background-image: url({{asset('download.avif')}}); background-color: rgba(255, 255, 255, 0.5);">

{{--<div class="flex      >--}}
{{--<div class=" flex flex-col  justify-center   header">--}}
{{--    <div class="flex flex-col" >My RestaurantCollection</div>--}}
{{--</div>--}}
{{--    <div class="flex  justify-end ">--}}
{{--        <!-- RestaurantCollection Settings Button -->--}}
{{--        <button class="settings-button">RestaurantCollection Settings</button>--}}
{{--        <!-- Logout Button -->--}}
{{--        <button class="logout-button">Logout</button>--}}
{{--    </div>--}}
{{--</div>--}}
<nav class="bg-gray-800 text-white p-10">
    <div class="flex justify-between items-center">
        <div class="flex ">
            <a href="{{route('logout')}}" class="text-white hover:underline mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z"/>
                </svg>
            </a>
            <a href="{{route('admin.comments.request')}}" class="mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M14.77 5.87a1 1 0 0 0 1.36-.37A1 1 0 0 1 18 6a1 1 0 0 1-1 1a1 1 0 0 0 0 2a3 3 0 1 0-2.6-4.5a1 1 0 0 0 .37 1.37Zm4.3 7.13a1 1 0 0 0-1.12.86A7 7 0 0 1 11 20H5.41l.65-.65a1 1 0 0 0 0-1.41A7 7 0 0 1 11 6a1 1 0 0 0 0-2a9 9 0 0 0-7 14.61l-1.71 1.68a1 1 0 0 0-.21 1.09A1 1 0 0 0 3 22h8a9 9 0 0 0 8.93-7.87a1 1 0 0 0-.86-1.13Zm-1.69-2.93a1 1 0 0 0-.58-.07l-.18.06l-.18.09l-.15.13a1 1 0 0 0-.21.32a.84.84 0 0 0-.08.4a1 1 0 0 0 .07.39a1 1 0 0 0 .22.32A1 1 0 0 0 17 12a1 1 0 0 0 1-1a.84.84 0 0 0-.08-.38a1.07 1.07 0 0 0-.54-.54Z"/>
                </svg>
            </a>
            <a class="mr-4" href="{{route('admin.archive')}}">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M20.535 3.464C19.07 2 16.713 2 11.999 2C7.285 2 4.93 2 3.464 3.464c-.758.758-1.123 1.754-1.3 3.192a6.5 6.5 0 0 1 1.884-1.448c.782-.398 1.619-.56 2.545-.635C7.488 4.5 8.59 4.5 9.936 4.5h4.126c1.347 0 2.448 0 3.343.073c.927.076 1.764.237 2.545.635a6.499 6.499 0 0 1 1.884 1.448c-.176-1.438-.542-2.434-1.3-3.192Z"/>
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M2 14c0-2.8 0-4.2.545-5.27A5 5 0 0 1 4.73 6.545C5.8 6 7.2 6 10 6h4c2.8 0 4.2 0 5.27.545a5 5 0 0 1 2.185 2.185C22 9.8 22 11.2 22 14c0 2.8 0 4.2-.545 5.27a5 5 0 0 1-2.185 2.185C18.2 22 16.8 22 14 22h-4c-2.8 0-4.2 0-5.27-.545a5 5 0 0 1-2.185-2.185C2 18.2 2 16.8 2 14Zm10.53 3.53a.75.75 0 0 1-1.06 0l-2.5-2.5a.75.75 0 1 1 1.06-1.06l1.22 1.22V11a.75.75 0 0 1 1.5 0v4.19l1.22-1.22a.75.75 0 1 1 1.06 1.06l-2.5 2.5Z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
            <a href="{{route('admin.banners.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                    <g fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="4">
                        <rect width="40" height="26" x="4" y="15" rx="2"/>
                        <path stroke-linecap="round" d="m24 7l-8 8h16l-8-8ZM12 24h18m-18 8h8"/>
                    </g>
                </svg>
            </a>
        </div>
        <div class="text-2xl font-semibold"> Admin panel</div> <!-- Title in the middle -->
        <div class=" flex gap-4">
            <!-- Settings button -->
            <a href="{{route('admin.restaurant_category.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M18.25 3.25a.75.75 0 0 1 .743.648L19 4v16a.75.75 0 0 1-1.493.102L17.5 20v-5h-2.25a.75.75 0 0 1-.743-.648l-.007-.102V7a3.75 3.75 0 0 1 3.75-3.75Zm-6 0a.75.75 0 0 1 .743.648L13 4v4c0 1.953-1.4 3.578-3.25 3.93V20a.75.75 0 0 1-1.493.102L8.25 20v-8.07a4.002 4.002 0 0 1-3.245-3.722L5 8V4a.75.75 0 0 1 1.493-.102L6.5 4v4c0 1.12.736 2.067 1.75 2.386V4a.75.75 0 0 1 1.493-.102L9.75 4v6.385a2.502 2.502 0 0 0 1.743-2.2L11.5 8V4a.75.75 0 0 1 .75-.75ZM17.5 13.5V4.878a2.252 2.252 0 0 0-1.494 1.95L16 7v6.5h1.5V4.878V13.5Z"/>
                </svg>
            </a>
            <a style="margin-top: 5px" href="{{route('admin.food_category.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M6.75 1A5.75 5.75 0 0 0 1 6.75v.518a2 2 0 0 0 0 3.464v1.518A2.75 2.75 0 0 0 3.75 15h8.5A2.75 2.75 0 0 0 15 12.25v-1.518a2 2 0 0 0 0-3.464V6.75A5.75 5.75 0 0 0 9.25 1h-2.5ZM14 8.5H2a.5.5 0 0 0 0 1h12a.5.5 0 0 0 0-1ZM13.5 7v-.25A4.25 4.25 0 0 0 9.25 2.5h-2.5A4.25 4.25 0 0 0 2.5 6.75V7h11ZM11 11h2.5v1.25c0 .69-.56 1.25-1.25 1.25h-8.5c-.69 0-1.25-.56-1.25-1.25V11H9l1 1l1-1Z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
            <a href="{{route('admin.discounts.index')}}" class="text-white hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M7.5 11q-1.45 0-2.475-1.025T4 7.5q0-1.45 1.025-2.475T7.5 4q1.45 0 2.475 1.025T11 7.5q0 1.45-1.025 2.475T7.5 11Zm0-2q.625 0 1.063-.438T9 7.5q0-.625-.438-1.063T7.5 6q-.625 0-1.063.438T6 7.5q0 .625.438 1.063T7.5 9Zm9 11q-1.45 0-2.475-1.025T13 16.5q0-1.45 1.025-2.475T16.5 13q1.45 0 2.475 1.025T20 16.5q0 1.45-1.025 2.475T16.5 20Zm0-2q.625 0 1.063-.438T18 16.5q0-.625-.438-1.063T16.5 15q-.625 0-1.063.438T15 16.5q0 .625.438 1.063T16.5 18ZM5.4 20L4 18.6L18.6 4L20 5.4L5.4 20Z"/>
                </svg>
            </a> <!-- Logout button -->
        </div>
    </div>
</nav>
<div class="container  ">
    <div class="flex gap-2"><p class="text-white" style="font-size: xx-large">Welcome </p>
        <p class="text-3xl mt-2 ">{{$user->name}}</p>
        <svg style="margin-top: 10px" xmlns="http://www.w3.org/2000/svg" width="34" height="34" viewBox="0 0 24 24">
            <path fill="red"
                  d="m8.962 18.91l.464-.588l-.464.589ZM12 5.5l-.54.52a.75.75 0 0 0 1.08 0L12 5.5Zm3.038 13.41l.465.59l-.465-.59Zm-8.037-2.49a.75.75 0 0 0-.954 1.16l.954-1.16Zm-4.659-3.009a.75.75 0 1 0 1.316-.72l-1.316.72Zm.408-4.274c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137h1.5ZM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043L8.497 19.5Zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.197-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842l.929 1.178ZM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713h1.5Zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16l-.929-1.178Zm-5.148 0c-.796-.627-1.605-1.226-2.425-1.901l-.954 1.158c.83.683 1.708 1.335 2.45 1.92l.93-1.177Zm-5.768-5.63a7.252 7.252 0 0 1-.908-3.555h-1.5c0 1.638.42 3.046 1.092 4.274l1.316-.72Z"/>
        </svg>
    </div>


</div>
</body>
</html>

