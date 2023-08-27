{{ Form::open(array('route' => 'post.new')) }}
<div class="mx-3 mb-5">
    <h4 class="text-dark">New Post</h4>
    <textarea required rows="4" cols="90" name="body" style="border: none; background-color: aliceblue" class="my-2 p-3"></textarea>
    <br>
    <button type="submit" class="btn">Post</button>

</div>
{{ Form::close() }}
