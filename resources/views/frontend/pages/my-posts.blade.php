@include('frontend.layouts.upper-main')
<!-- Post List Area Start -->
<div class="job-listing-area pt-20 pb-20">
    <div class="container">
        <h1 class="pb-20 text-center">
            {{ Auth::guard('customer')->user()->getName() }}'s Posts
        </h1>
        @include('frontend.pages.new-post')
        <div class="row">
            <!-- Right content -->
            <div class="col-xl-9 col-lg-9 col-md-8">
                <!-- Featured_job_start -->
                <section class="featured-job-area">
                    <div class="container">
                        @foreach($posts as $post)
                            <div class="single-job-items mb-30 border">
                                <div class="job-items col-12">
                                    <div class="job-tittle job-tittle2">
                                        <h4 class="mb-1">{{$post->getOwner()->getName()}}</h4>
                                        <h6 class="font-weight-light pb-10 font-italic">{{ date('d-M-Y h:i A', strtotime($post->created_at))  }}</h6>
                                        {!! $post->body !!}
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-12 mt-5 py-2 rounded-pill">
                                        <a href="{{ route('post.detail', ['id' => $post->id]) }}">
                                            <button class="badge-pill border border-light text-dark" type="submit">
                                                <i class="fa fa-regular fa-comment"></i>&nbsp;&nbsp;
                                                Comments ({{$post->getCommentCount()}})
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center">
                            @if($posts->previousPageUrl())
                                <a href="{{ $posts->previousPageUrl() }}" class="text-dark border mx-5 px-3 py-2">
                                    Prev
                                </a>
                            @endif
                            @if($posts->nextPageUrl())
                                <a href="{{ $posts->nextPageUrl() }}" class="text-dark border mx-5 px-3 py-2">
                                    Next
                                </a>
                            @endif
                        </div>
                    </div>
                </section>
                <!-- Featured_post_end -->
            </div>
        </div>
    </div>
</div>
<!-- Post List Area End -->
@include('frontend.layouts.lower-main')
