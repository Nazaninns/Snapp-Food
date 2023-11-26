<div class="category-card bg-gray-300">
    <p style="color: #3498db">new comment</p>
    <h2>{{$comment->user->name}}</h2>
    <p>comment:{{$comment->text}}</p>
    <p>score:{{$comment->score}} star</p>
    <form action="{{route('comments.delete',$comment)}}" method="post">
        @csrf
        <button type="submit">delete</button>
    </form>
    <form action="{{route('comments.accept',$comment)}}" method="post">
        @csrf
        <button type="submit">accept</button>
    </form>
</div>


