@php
    $color=($comment->score>=3) ?'#fa983a': '#EA2027';
        $starSvg='<span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill='.$color. ' fill-opacity="0" stroke="'.$color.' " stroke-dasharray="32" stroke-dashoffset="32" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3L9.65 8.76L3.44 9.22L8.2 13.24L6.71 19.28L12 16M12 3L14.35 8.76L20.56 9.22L15.8 13.24L17.29 19.28L12 16"><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.5s" values="32;0"/><animate fill="freeze" attributeName="fill-opacity" begin="0.5s" dur="0.5s" values="0;1"/></path></svg>
                </span>';
@endphp
<div class="category-card bg-gray-300">
    <p class="  text-lg text-blue-800">New Comment</p>
    <h2>Customer Name : <span class="text-indigo-700">{{$comment->user->name}}</span></h2>
    <p>Comment : <span class="text-indigo-700">{{$comment->text}}</span></p>
    <p class="flex gap-2"> Score :
        {!!str_repeat($starSvg,$comment->score)!!}

    </p>
    <p >Comment at : <span class="text-indigo-700">{{$comment->created_at}}</span></p>
    <div class="flex gap-16 ms-5 ">
        <form action="{{route('comments.delete',$comment)}}" method="post">
            @csrf
            <button class="btn-gradd bg-gray-700 m-5  p-3 hover:bg-blue-900 text-lg text-gray-300" type="submit">
                delete
            </button>
        </form>
        <form action="{{route('comments.accept',$comment)}}" method="post">
            @csrf
            <button class="btn-gradd bg-gray-700 m-5  p-3 hover:bg-blue-900 text-lg text-gray-300" type="submit">
                accept
            </button>
        </form>
    </div>
</div>


