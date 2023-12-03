<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>order Detail</title>
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
            display: flex;
            justify-content: space-between;
            text-align: center;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .food-card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


    </style>
</head>
<body style="background: #4b6cb7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #182848, #4b6cb7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #182848, #4b6cb7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

">
<nav class="header">
    <a style="margin-top: 20px" href="{{back()->getTargetUrl()}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 1024 1024">
            <path fill="white" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/>
            <path fill="white"
                  d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/>
        </svg>
    </a>
    <h1 class="text-3xl mt-2">Order Detail</h1>
    <div></div>
</nav>
<div class="container">
    <!-- Food Details Card -->
    <div class="food-card w-7/12 mx-auto bg-gray-100 " >
        <h2 class="text-lg">customer name: <span class="text-blue-700 ">  {{$order->user->name}} </span></h2>
        @foreach($order->food as $food)
            <p>food: <span class="text-blue-700 " >{{$food->name}}</span></p>
            <p>count: <span class="text-blue-700" >{{$food->pivot->count}}</span></p>
            <p>price: <span class="text-blue-700" >{{$food->price}}</span></p>
            <p>food party: <span class="text-blue-700" >{{(int)$food->foodParty?->percent}}</span> %</p>
        @endforeach
        <p>total price: <span class="text-blue-700" >{{$order->total_price}}</span> $</p>
        <p>total price after food party | discount: <span class="text-blue-700" >{{$order->total_price - $order->discount}}</span> $</p>


    </div>

</div>
</body>
</html>



