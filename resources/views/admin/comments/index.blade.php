
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Comments</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        .category-card, .food-card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin: 3rem;
            width: 26%;
            padding: 20px;

            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-grad {
            background-image: linear-gradient(to right, #4b6cb7 0%, #182848  51%, #4b6cb7  100%);
            margin: 10px;
            padding: 10px 10px;
            text-align: center;
            text-transform: uppercase;
            transition: 0.5s;
            background-size: 200% auto;
            color: white;
            box-shadow: 0 0 20px #eee;
            border-radius: 10px;
        }

        .btn-grad:hover {
            background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
        }


        .btn-gradd {
            background-image: linear-gradient(to right, #232526 0%, #414345  51%, #232526  100%);
            margin: 10px;
            padding: 10px 10px;
            font-size: 12px;
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
<body
    style="background: #4b6cb7;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #182848, #4b6cb7);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #182848, #4b6cb7); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

"

>
<nav class="header">
    <a style="margin-top: 20px" href="{{back()->getTargetUrl()}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 1024 1024">
            <path fill="white" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/>
            <path fill="white"
                  d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/>
        </svg>
    </a>
    <h1 class="text-3xl mt-5">Comments </h1>
    <div></div>
</nav>
<div class=" mx-auto  flex flex-wrap w-9/12 justify-between ">
@foreach($comments as $comment)
    <div class="container category-card bg-gray-50   ">
    <div class="">
            <h1>Restaurant Name : <span class="text-indigo-700" >{{$comment->order->restaurant->name}}</span></h1>
            <div>Text : <span class="text-indigo-700">{{$comment->text}}</span></div>
        <p >Requested at : <span class="text-indigo-700">{{$comment->updated_at}}</span></p>
        <div class="flex justify-between m-2">
            <form action="{{route('admin.comments.accept',$comment)}}" method="post">
                @csrf
                <button class="btn-gradd bg-gray-700 m-5  p-3 hover:bg-blue-900 text-lg text-gray-300" type="submit">accept</button>
            </form>
            <form action="{{route('admin.comments.reject',$comment)}}" method="post">
                @csrf
                <button class="btn-gradd bg-gray-700 m-5  p-3 hover:bg-blue-900 text-lg text-gray-300" type="submit">reject</button>
            </form>
        </div>
    </div>

    </div>
@endforeach
</div>
<x-paginate />
<div class="container w-2/12 mx-auto">
    {{$comments->links()}}
</div>
</body>
</html>


