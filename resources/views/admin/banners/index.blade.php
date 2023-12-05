<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>archive</title>
    @vite('resources/css/app.css')
    <script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
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
            margin: auto;
            padding: 20px;
        }






        .category-card, .food-card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin: 10rem;
            padding: 20px;
            width: 30%;
            height: 39rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-grad {
            background-image: linear-gradient(to right, #4b6cb7 0%, #182848  51%, #4b6cb7  100%);
            margin: 10px;
            padding: 10px 10px;
            font-size: 13px;
            text-align: center;
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
    <h1 class="text-3xl mt-4">Banners</h1>
    <a style="margin-top: 14px" href="{{route('admin.banners.create')}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">
            <mask id="ipSAdd0">
                <g fill="none" stroke-linejoin="round" stroke-width="4">
                    <rect width="36" height="36" x="6" y="6" fill="#fff" stroke="#fff" rx="3"/>
                    <path stroke="#000" stroke-linecap="round" d="M24 16v16m-8-8h16"/>
                </g>
            </mask>
            <path fill="white" d="M0 0h48v48H0z" mask="url(#ipSAdd0)"/>
        </svg>
    </a>
</nav>
<div class="flex flex-wrap ">
@foreach($banners as $banner)
<div class=" container mt-5  flex  category-card bg-gray-300">
    <div class="flex flex-col">
        <div class="text-2xl text-blue-800 font-medium">{{$banner->message}}</div>
        <img style="width: 33rem ; height: 30rem; " src="{{asset('storage/'.$banner->image)}}">
        <form action="{{route('admin.banners.destroy',$banner)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn-grad" type="submit">delete</button>
        </form>
    </div>

</div>
@endforeach
    </div>
<x-banner_paginate />
<div class="container w-2/12 mx-auto">
    {{$banners->links()}}
</div>
</body>
</html>


