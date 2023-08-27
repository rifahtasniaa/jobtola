{{ Form::open(array('route' => 'comment.new')) }}
<div class="mx-3 mb-5">
    <h4 class="text-dark">New Comment</h4>
    <textarea required rows="4" cols="90" name="body" style="border: none; background-color: aliceblue" class="my-2 p-3"></textarea>
    <br>
    <input type="hidden" name="post-id" value="{{ $post->id }}">
    <button type="submit" class="btn">Comment</button>
</div>
{{ Form::close() }}
