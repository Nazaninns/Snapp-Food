<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title></title>
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

        .food-form {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .food-form label {
            display: block;
            margin-top: 10px;
        }

        .food-form input, .food-form textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
        }

        .food-form button {
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body style="background-size: cover; background-image: url({{asset('discounts.jpg')}}); background-color: rgba(255, 255, 255, 0.5);">
<nav class="header">
    <a style="margin-top: 20px" href="{{back()->getTargetUrl()}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 1024 1024">
            <path fill="white" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/>
            <path fill="white"
                  d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/>
        </svg>
    </a>
    <h1>Food Party Cards</h1>
    <div></div>
</nav>
<div class="container">
    @foreach($parties as $foodParty)
        <div class="category-card bg-gray-100 p-4 rounded-xl">
            <div class="">
                <p>{{$foodParty->food->name}}</p>
                <p>percent:</p>
                <p>{{$foodParty->percent}}</p>
            </div>
            <p>
            <p>count:</p>{{$foodParty->count}}</p>
            <div class="flex gap-2.5">
                <a class=" border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 mt-2
                        transition duration-500 ease select-none hover:bg-gray-500 focus:outline-none
                        focus:shadow-outline"
                   href="{{route('party.edit',$foodParty)}}">
                    edit
                </a>
                <form action="{{route('party.delete',$foodParty)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class=" border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 mt-2
                        transition duration-500 ease select-none hover:bg-gray-500 focus:outline-none
                        focus:shadow-outline"
                            type="submit">delete
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>


