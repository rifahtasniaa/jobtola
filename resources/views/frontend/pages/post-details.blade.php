@include('frontend.layouts.upper-main')
<!-- Post Area Start -->
<div class="job-listing-area pt-20 pb-20">
    <div class="container">
        <div class="row">
            <div class="col-12 shadow p-4">
                <h4 class="mb-1">
                    {{$post->getOwner()->getName()}}
                </h4>
                <h6 class="font-weight-light pb-10 font-italic">
                    {{ date('d-M-Y h:i A', strtotime($post->created_at))  }}
                </h6>
                {!! $post->body !!}
            </div>
        </div>
        <div class="mt-2">
            @if(Auth::guard('customer')->check())
            <a href="{{ route('post.upvote', ['post-id' => $post->id]) }}">
                @if($post->hasUpvote())
                    <i class="fa fa-regular fa-thumbs-up" style="color: green;"></i>
                @else
                    <i class="fa fa-regular fa-thumbs-up" style="color: grey;"></i>
                @endif
            </a>
            @else
                <i class="fa fa-regular fa-thumbs-up" style="color: grey;"></i>
            @endif
            {{ $post->getUpvoteCount() }}
            &nbsp;&nbsp;
        </div>
        <div class="pb-100 pt-50">
            @if($post->getCommentCount() > 0)
                <span class="font-italic text-center d-flex justify-content-center">
                    ------ Comments ------
                </span>
                <div class=text-center">
                    @foreach($post->getComments() as $comment)
                        <div class="col-12 border shadow my-4 p-4">
                            <h4 class="mb-1">
                                {{$comment->getOwner()->getName()}}
                            </h4>
                            <h6 class="font-weight-light pb-10 font-italic">
                                {{ date('d-M-Y h:i A', strtotime($comment->created_at))  }}
                            </h6>
                            {!! $comment->body !!}
                        </div>
                    @endforeach
                </div>
            @else
                <span class="font-italic">
                    No Comments found
                </span>
            @endif
        </div>
        <div class="pb-100">
            @if(Auth::guard('customer')->check())
                @include('frontend.pages.new-comment', ['post' => $post])
            @endif
        </div>
    </div>
</div>
@include('frontend.layouts.lower-main')
