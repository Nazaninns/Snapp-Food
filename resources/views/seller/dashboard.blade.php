<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Restaurant</title>
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


        .btn-grad {
            background-image: linear-gradient(to right, #6190E8 0%, #A7BFE8 51%, #6190E8 100%);
            margin: 10px;
            padding: 5px 5px;
            text-align: center;
            font-size: medium;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
        }

        .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }

        .btn-gradd {
            background-image: linear-gradient(to right, #FBD3E9 0%, #BB377D 51%, #FBD3E9 100%);
            margin: 10px;
            padding: 5px 5px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
            display: block;
        }

        .btn-gradd:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }


    </style>
</head>
<body class=""
      style="background-size: cover; background-image: url({{asset('holiday2.webp')}}); background-color: rgba(255, 255, 255, 0.5);
">
{{--<div class="flex  >--}}
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
            <a href="{{route('seller.setting')}}" class="text-white hover:underline mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                    <path fill="currentColor"
                          d="M11.078 0c.294 0 .557.183.656.457l.706 1.957c.253.063.47.126.654.192c.201.072.46.181.78.33l1.644-.87a.702.702 0 0 1 .832.131l1.446 1.495c.192.199.246.49.138.744l-.771 1.807c.128.235.23.436.308.604c.084.183.188.435.312.76l1.797.77c.27.115.437.385.419.674l-.132 2.075a.69.69 0 0 1-.46.605l-1.702.605c-.049.235-.1.436-.154.606a8.79 8.79 0 0 1-.298.774l.855 1.89a.683.683 0 0 1-.168.793l-1.626 1.452a.703.703 0 0 1-.796.096l-1.676-.888a7.23 7.23 0 0 1-.81.367l-.732.274l-.65 1.8a.696.696 0 0 1-.64.457L9.11 20a.697.697 0 0 1-.669-.447l-.766-2.027a14.625 14.625 0 0 1-.776-.29a9.987 9.987 0 0 1-.618-.293l-1.9.812a.702.702 0 0 1-.755-.133L2.22 16.303a.683.683 0 0 1-.155-.783l.817-1.78a9.517 9.517 0 0 1-.302-.644a14.395 14.395 0 0 1-.3-.811L.49 11.74a.69.69 0 0 1-.49-.683l.07-1.921a.688.688 0 0 1 .392-.594L2.34 7.64c.087-.319.163-.567.23-.748a8.99 8.99 0 0 1 .314-.712L2.07 4.46a.683.683 0 0 1 .15-.79l1.404-1.326a.702.702 0 0 1 .75-.138l1.898.784c.21-.14.4-.253.572-.344c.205-.109.479-.223.824-.346l.66-1.841A.696.696 0 0 1 8.984 0h2.094Zm-.49 1.377H9.475L8.87 3.071a.693.693 0 0 1-.434.423c-.436.145-.751.27-.935.367c-.195.103-.444.26-.74.47a.703.703 0 0 1-.673.074l-1.83-.755l-.713.674l.743 1.57a.68.68 0 0 1-.006.597c-.2.401-.335.697-.403.879a10.31 10.31 0 0 0-.27.922a.69.69 0 0 1-.37.45l-1.79.859l-.036.98l1.62.492c.215.065.385.23.456.442c.16.48.288.834.38 1.056a10 10 0 0 0 .404.827a.68.68 0 0 1 .019.606l-.751 1.638l.711.668l1.782-.762a.703.703 0 0 1 .603.024c.365.192.637.325.809.398c.175.073.51.195.996.361a.693.693 0 0 1 .424.41l.708 1.871l.926-.02l.597-1.654a.692.692 0 0 1 .409-.413l1.037-.388c.262-.097.58-.25.951-.46a.703.703 0 0 1 .674-.008l1.577.835l.887-.791L15.856 14a.681.681 0 0 1-.001-.56c.182-.407.305-.714.367-.91c.061-.192.124-.469.185-.825a.69.69 0 0 1 .451-.533l1.648-.585l.072-1.14l-1.62-.694a.692.692 0 0 1-.377-.394a15.337 15.337 0 0 0-.378-.944a11.01 11.01 0 0 0-.42-.794a.682.682 0 0 1-.035-.606l.725-1.7l-.764-.79l-1.488.788a.703.703 0 0 1-.633.013a11.296 11.296 0 0 0-.968-.426a7.185 7.185 0 0 0-.857-.23a.694.694 0 0 1-.508-.441l-.668-1.853Zm-.564 4.264c2.435 0 4.41 1.953 4.41 4.361c0 2.408-1.975 4.36-4.41 4.36c-2.436 0-4.41-1.952-4.41-4.36c0-2.408 1.974-4.36 4.41-4.36Zm0 1.378c-1.667 0-3.018 1.335-3.018 2.983c0 1.648 1.351 2.984 3.018 2.984c1.666 0 3.017-1.336 3.017-2.984s-1.35-2.983-3.017-2.983Z"/>
                </svg>
            </a>
            <a class="mr-4" href="{{route('archive')}}">

                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M20.535 3.464C19.07 2 16.713 2 11.999 2C7.285 2 4.93 2 3.464 3.464c-.758.758-1.123 1.754-1.3 3.192a6.5 6.5 0 0 1 1.884-1.448c.782-.398 1.619-.56 2.545-.635C7.488 4.5 8.59 4.5 9.936 4.5h4.126c1.347 0 2.448 0 3.343.073c.927.076 1.764.237 2.545.635a6.499 6.499 0 0 1 1.884 1.448c-.176-1.438-.542-2.434-1.3-3.192Z"/>
                    <path fill="currentColor" fill-rule="evenodd"
                          d="M2 14c0-2.8 0-4.2.545-5.27A5 5 0 0 1 4.73 6.545C5.8 6 7.2 6 10 6h4c2.8 0 4.2 0 5.27.545a5 5 0 0 1 2.185 2.185C22 9.8 22 11.2 22 14c0 2.8 0 4.2-.545 5.27a5 5 0 0 1-2.185 2.185C18.2 22 16.8 22 14 22h-4c-2.8 0-4.2 0-5.27-.545a5 5 0 0 1-2.185-2.185C2 18.2 2 16.8 2 14Zm10.53 3.53a.75.75 0 0 1-1.06 0l-2.5-2.5a.75.75 0 1 1 1.06-1.06l1.22 1.22V11a.75.75 0 0 1 1.5 0v4.19l1.22-1.22a.75.75 0 1 1 1.06 1.06l-2.5 2.5Z"
                          clip-rule="evenodd"/>
                </svg>
            </a>
            <a class="mr-4" href="{{route('comments.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 512 512">
                    <path fill="currentColor"
                          d="M123.6 391.3c12.9-9.4 29.6-11.8 44.6-6.4c26.5 9.6 56.2 15.1 87.8 15.1c124.7 0 208-80.5 208-160S380.7 80 256 80S48 160.5 48 240c0 32 12.4 62.8 35.7 89.2c8.6 9.7 12.8 22.5 11.8 35.5c-1.4 18.1-5.7 34.7-11.3 49.4c17-7.9 31.1-16.7 39.4-22.7zM21.2 431.9c1.8-2.7 3.5-5.4 5.1-8.1c10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240C0 125.1 114.6 32 256 32s256 93.1 256 208s-114.6 208-256 208c-37.1 0-72.3-6.4-104.1-17.9c-11.9 8.7-31.3 20.6-54.3 30.6c-15.1 6.6-32.3 12.6-50.1 16.1c-.8.2-1.6.3-2.4.5c-4.4.8-8.7 1.5-13.2 1.9c-.2 0-.5.1-.7.1c-5.1.5-10.2.8-15.3.8c-6.5 0-12.3-3.9-14.8-9.9S0 457.4 4.5 452.8c4.1-4.2 7.8-8.7 11.3-13.5c1.7-2.3 3.3-4.6 4.8-6.9c.1-.2.2-.3.3-.5z"/>
                </svg>
            </a>
            <a href="{{route('seller.date')}}">date</a>
        </div>
        <div class="text-2xl font-semibold"> {{$user->restaurant->name }} resturant</div> <!-- Title in the middle -->
        <div class=" flex gap-4">
            <!-- Settings button -->
            <a href="{{route('food.index')}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                    <path fill="currentColor"
                          d="M7.5 9.002a.747.747 0 1 0 0-1.495a.747.747 0 0 0 0 1.495Zm3.723 1.253a.747.747 0 1 1-1.495 0a.747.747 0 0 1 1.495 0Zm-3.719 3.253a.751.751 0 1 0 0-1.502a.751.751 0 0 0 0 1.502ZM4 3.956c0-1.095.895-2.022 2.03-1.952c4.447.274 8.347 1.77 11.402 4.687c.867.827.696 2.178-.203 2.868a302.914 302.914 0 0 1-4.225 3.203v1.74c0 .717-.555 1.5-1.5 1.5a1.57 1.57 0 0 1-.498-.08v.083c0 .713-.556 1.491-1.503 1.491c-.754 0-1.251-.496-1.426-1.05c-.548.41-1.147.856-1.682 1.254c-.99.737-2.395.03-2.395-1.2V3.956Zm7.005 10.546c0 .259.195.5.499.5c.305 0 .5-.243.5-.5v-1.994a.5.5 0 0 1 .206-.404c.78-.566 2.108-1.575 3.284-2.474C12.801 7.067 9.026 5.546 5 5.514v10.985a.5.5 0 0 0 .798.4c.786-.586 1.713-1.276 2.409-1.798a.5.5 0 0 1 .8.4v.504c0 .247.19.492.496.492a.49.49 0 0 0 .502-.492v-1.503a.5.5 0 0 1 1 0Zm5.614-5.735c.465-.357.5-.993.122-1.354c-2.857-2.727-6.52-4.15-10.772-4.412C5.45 2.969 5 3.395 5 3.956v.558c4.327.033 8.402 1.687 11.297 4.5l.322-.247Z"/>
                </svg>
            </a>
            {{--            <a href="{{route('seller.profile')}}">--}}
            {{--                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">--}}
            {{--                    <g fill="none" stroke="currentColor" stroke-width="1.5">--}}
            {{--                        <path stroke-linejoin="round"--}}
            {{--                              d="M4 18a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2Z"/>--}}
            {{--                        <circle cx="12" cy="7" r="3"/>--}}
            {{--                    </g>--}}
            {{--                </svg>--}}
            {{--            </a>--}}
            <a href="{{route('logout')}}" class="text-white hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M5 21q-.825 0-1.413-.588T3 19V5q0-.825.588-1.413T5 3h7v2H5v14h7v2H5Zm11-4l-1.375-1.45l2.55-2.55H9v-2h8.175l-2.55-2.55L16 7l5 5l-5 5Z"/>
                </svg>
            </a> <!-- Logout button -->
        </div>
    </div>
</nav>

<div class="container ">

    <!-- component -->
    <form class="flex gap-3">
        @csrf
        <select name="situation" class="bg-gray-800 rounded-xl text-lg ms-2 text-white h-14 mt-5 p-2">
            <option value="" disabled selected>Order by</option>
            <option value="pending">Pending</option>
            <option value="making">Making</option>
            <option value="send">Send</option>
            <option value="">All</option>
        </select>
        <button type="submit" name="submit" class="bg-gray-800 w-1/12 h-14 mt-5 text-white rounded-xl text-xl">submit
        </button>
    </form>
    <script src="//unpkg.com/alpinejs" defer></script>
</div>


<div class="container  ">
    <!-- Food Cards -->
    <div class="flex gap-2 flex-wrap">
        @foreach($orders as $order)
            <div class="food-card bg-gray-300 ">

                <h1 class="text-3xl">order {{$order->id}}</h1>
                <p>{{$order->user->name}}</p>

                @foreach($order->food as $food)
                    <div class="flex gap-2">
                        <h2>{{$food->name}}</h2>
                        <p class="text-indigo-600">{{$food->price}}</p>
                        <p>count:</p>
                        <p class="text-indigo-600">{{$food->pivot->count}}</p>
                    </div>
                @endforeach
                <p>total price: <span class="text-indigo-600">{{($order->total_price - $order->discount)}}</span> $</p>

                <form action="{{route('change.situation',$order)}}" method="post">
                    @csrf
                    @method('PATCH')
                    @php $situation=$order->situation @endphp
                    <x-dynamic-component :component="$situation"/>
                    {{--                    @if($order->situation==='pending')--}}
                    {{--                        <x-pending/>--}}
                    {{--                    @elseif($order->situation==='making')--}}
                    {{--                        <x-making/>--}}
                    {{--                    @elseif($order->situation==='send')--}}
                    {{--                        <x-send/>--}}
                    {{--                    @endif--}}
                </form>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
