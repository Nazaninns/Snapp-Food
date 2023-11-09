<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Food Card</title>
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
<body  style="background: #4b6cb7;  /* fallback for old browsers */
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
    <h1>Create Food Card</h1>
    <div></div>
</nav>
<div class="container ">
    <!-- Food Card Creation Form -->

    <form action="{{route('food.store')}}" method="post" class="food-form bg-gray-100" enctype="multipart/form-data">
        @csrf
        <label for="foodName">Food Name</label>
        <input type="text" id="foodName" name="name" placeholder="Enter food name">
        <div class="text-red-600">
        @error('name')
        {{$message}}
        @enderror
        </div>
        <label for="foodDescription">Food Ingredients</label>
        <input id="foodDescription" name="ingredients" placeholder="Enter food ingredients">
        <div class="text-red-600">
        @error('ingredients')
        {{$message}}
        @enderror
        </div>
        <label for="foodImage">Food Image </label>
        <input type="file" id="foodImage" name="image" placeholder="Enter Food image ">
        <div class="text-red-600">
        @error('image')
        {{$message}}
        @enderror
        </div>
        <label for="foodPrice">Food Price</label>
        <input type="text" id="foodPrice" name="price" placeholder="Enter food price">
        <div class="text-red-600">
        @error('price')
        {{$message}}
        @enderror
        </div>
        <label for="foodPrice">Food category id</label>
        <select id="foodPrice" name="food_category_id">
            @foreach($foodCategories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
        <div class="text-red-600">
        @error('food_category_id')
        {{$message}}
        @enderror
        </div>
        <button class="btn-grad border border-gray-700 bg-gray-700 text-white rounded-md px-4 py-2 mt-2
                        transition duration-500 ease select-none hover:bg-gray-500 focus:outline-none
                        focus:shadow-outline"
            style="margin-top: 10px" type="submit">Create Food Card</button>
    </form>
</div>
</body>
</html>


