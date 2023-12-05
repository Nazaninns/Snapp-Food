<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Restaurant Categories</title>
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
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .category-card, .food-card {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            width: 30%;
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
    <h1>Restaurant Categories</h1>
    <a style="margin-top: 14px" href="{{route('admin.restaurant_category.create')}}">
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


<div class="container">
    <!-- RestaurantCollection Categories -->
    @foreach($restaurantCategories as  $category)
        <div class="category-card bg-gray-50">
            <h2>{{$category->name}}</h2>
            <img style="width: 10rem" src="{{asset('storage/'.$category->image)}}">
            <br>
            <div class="flex gap-2.5">
            <a  class="btn-grad border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 mt-2
               transition duration-500 ease select-none hover:bg-gray-500 focus:outline-none
               focus:shadow-outline"
                href="{{route('admin.restaurant_category.show',['restaurant_category'=>$category])}}">Show</a>
            <a  class="btn-grad border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 mt-2
               transition duration-500 ease select-none hover:bg-gray-500 focus:outline-none
               focus:shadow-outline"
                href="{{route('admin.restaurant_category.edit',['restaurant_category'=>$category])}}">edit</a>
            <form
                  action="{{route('admin.restaurant_category.destroy',['restaurant_category'=>$category])}}"
                  method="post">
                @csrf
                @method('DELETE')
                <button  class="btn-grad border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 mt-2
               transition duration-500 ease select-none hover:bg-gray-500 focus:outline-none
               focus:shadow-outline" type="submit">delete</button>
            </form>
            </div>
        </div>

    @endforeach

</div>
<x-paginate />
<div class="container w-2/12 mx-auto">
    {{$restaurantCategories->links()}}
</div>
</body>
</html>
