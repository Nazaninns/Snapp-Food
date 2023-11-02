<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Food Card</title>
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
            background-color: #3498db;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="header">
    <a style="margin-top: 20px" href="{{back()->getTargetUrl()}}">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 1024 1024">
            <path fill="white" d="M224 480h640a32 32 0 1 1 0 64H224a32 32 0 0 1 0-64z"/>
            <path fill="white"
                  d="m237.248 512l265.408 265.344a32 32 0 0 1-45.312 45.312l-288-288a32 32 0 0 1 0-45.312l288-288a32 32 0 1 1 45.312 45.312L237.248 512z"/>
        </svg>
    </a>
    <h1>Edit Food Card</h1>
    <div></div>
</div>
<div class="container">
    <!-- Food Card Creation Form -->
    <form action="{{route('food.update',$food)}}" method="post" class="food-form" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <label for="foodName">Food Name</label>
        <input type="text" id="foodName" name="name" value="{{$food->name}}" >
        @error('name')
        {{$message}}
        @enderror
        <label for="foodDescription">Food Ingredients</label>
        <input id="foodDescription" name="ingredients" value="{{$food->ingredients}}" >
        @error('ingredients')
        {{$message}}
        @enderror
        <label for="foodImage">Food Image </label>
        <input type="file" id="foodImage" name="image" value="{{$food->image}}" >
        @error('image')
        {{$message}}
        @enderror
        <label for="foodPrice">Food Price</label>
        <input type="text" id="foodPrice" name="price" value="{{$food->price}}" >
        @error('price')
        {{$message}}
        @enderror
        <label for="foodPrice">Food category id</label>
        <select id="foodPrice" name="food_category_id"  >
            @foreach($foodCategories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
        @error('food_category_id')
        {{$message}}
        @enderror
        <button style="margin-top: 10px" type="submit">Save</button>
    </form>
</div>
</body>
</html>



