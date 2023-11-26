<div class="category-card bg-gray-300">
    <p style="color: #3498db">no reply</p>
    <h2>{{$comment->user->name}}</h2>
    <p>comment:{{$comment->text}}</p>
    <p>score:{{$comment->score}} star</p>
    <form action="" method="post">
        @csrf
        <input type="text" name="text" placeholder="text">
        <input type="number" name="comment_id" value="{{$comment->id}}" hidden="hidden">
        <button type="submit">submit</button>
    </form>
</div>

