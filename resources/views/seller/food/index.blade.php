<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
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
    <h1 class="text-3xl mt-5">Foods </h1>
    <a style="margin-top: 14px" href="{{route('food.create')}}">
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
</div>
<div class="container w-full flex justify-between ">

    <form action="">
        <select style="display: inline" name="sort" id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected disabled>Sort by name</option>
            <option value="asc">ascending</option>
            <option value="desc">descending</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <form action="">
        <select style="display: inline" name="filter" id="countries"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="" selected disabled>Filter by category</option>
            @foreach($foodCategories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <button type="submit">Submit</button>
    </form>
    {{--    <form action="">--}}
    {{--        <select name="sort">--}}
    {{--            <option value="" selected disabled>Sort by name</option>--}}
    {{--            <option value="asc">ascending</option>--}}
    {{--            <option value="desc">descending</option>--}}
    {{--        </select>--}}
    {{--        <button type="submit">Submit</button>--}}
    {{--    </form>--}}
    {{--    <form action="">--}}
    {{--        <select name="filter">--}}
    {{--            <option value="" selected disabled>Filter by category</option>--}}
    {{--            @foreach($foodCategories as $category)--}}
    {{--                <option value="{{$category->id}}">{{$category->name}}</option>--}}
    {{--            @endforeach--}}
    {{--        </select>--}}
    {{--        <button type="submit">Submit</button>--}}
    {{--    </form>--}}

</div>
<div class="container">
    <!-- Restaurant Categories -->
    @foreach($foods as $food)
        <div class="category-card">
            <div class="flex justify-between">
                <h2>{{$food->name}}</h2>
                <div class="flex">
                    <a href="{{route('party',$food)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                            <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                               stroke-width="2">
                                <path d="m9 15l6-6"/>
                                <circle cx="9.5" cy="9.5" r=".5" fill="currentColor"/>
                                <circle cx="14.5" cy="14.5" r=".5" fill="currentColor"/>
                                <path
                                    d="M5 7.2A2.2 2.2 0 0 1 7.2 5h1a2.2 2.2 0 0 0 1.55-.64l.7-.7a2.2 2.2 0 0 1 3.12 0l.7.7a2.2 2.2 0 0 0 1.55.64h1a2.2 2.2 0 0 1 2.2 2.2v1a2.2 2.2 0 0 0 .64 1.55l.7.7a2.2 2.2 0 0 1 0 3.12l-.7.7a2.2 2.2 0 0 0-.64 1.55v1a2.2 2.2 0 0 1-2.2 2.2h-1a2.2 2.2 0 0 0-1.55.64l-.7.7a2.2 2.2 0 0 1-3.12 0l-.7-.7a2.2 2.2 0 0 0-1.55-.64h-1a2.2 2.2 0 0 1-2.2-2.2v-1a2.2 2.2 0 0 0-.64-1.55l-.7-.7a2.2 2.2 0 0 1 0-3.12l.7-.7A2.2 2.2 0 0 0 5 8.2v-1"/>
                            </g>
                        </svg>
                    </a>
                    <a href="{{route('party.index',$food)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M12 9a3 3 0 0 0-3 3a3 3 0 0 0 3 3a3 3 0 0 0 3-3a3 3 0 0 0-3-3m0 8a5 5 0 0 1-5-5a5 5 0 0 1 5-5a5 5 0 0 1 5 5a5 5 0 0 1-5 5m0-12.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5Z"/>
                        </svg>
                    </a>
                </div>
            </div>
            <p>{{$food->ingredients}}</p>
            <p>{{$food->price}}</p>
            <img style="width: 10rem" src="{{asset('storage/'.$food->image)}}">
            <a href="{{route('food.show',$food)}}">Show</a>
            <a href="{{route('food.edit',$food)}}">
                edit
            </a>
            <form action="{{route('food.destroy',$food)}}" method="post">
                @csrf
                @method('DELETE')
                <button>delete</button>
            </form>
            {{-- @php $partyRout = ('is_party')? 'food.party.submit':'food.party.destroy'; @endphp --}}
            {{-- @php $iconCollor = ('is_party')? 'red':'gray'; @endphp --}}
            {{-- <form action="{{rout($partyRout,$food)}}" method="post">
                <button type='submit'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><g fill="none" stroke="{{$iconCollor}}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="m9 15l6-6"/><circle cx="9.5" cy="9.5" r=".5" fill="{{$iconCollor}}"/><circle cx="14.5" cy="14.5" r=".5" fill="red"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0-18 0"/></g></svg>
                </button>
            </form> --}}
        </div>

    @endforeach

</div>
<div class="container">

    <div style="width: 23rem">{{$foods->links()}}</div>
</div>
</body>
</html>
