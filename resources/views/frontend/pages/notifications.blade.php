@include('frontend.layouts.upper-main')
<!-- Post Area Start -->
<div class="job-listing-area pt-20 pb-20">
    <div class="container w-50">
        <div class="pb-100 pt-50">
            @foreach($notifications as $notification)
                @if($notification->type === 0)
                    <a href="{{ route('post.detail', ['id' => $notification->post_id]) }}">
                        <div class="border shadow my-4 p-4 row">
                            <div class="col-8">
                                <h4 class="mb-1">
                                    {{$notification->body}}
                                </h4>
                                <span class="text-dark font-italic">
                            {{ $notification->created_at->toDateTimeString() }}
                            </span>
                            </div>
                        </div>
                    </a>
                @elseif($notification->type === 1)
                    <a href="{{ route('job.detail', ['id' => $notification->job_id]) }}">
                        <div class="border shadow my-4 p-4 row">
                            <div class="col-8">
                                <h4 class="mb-1">
                                    {{$notification->body}}
                                </h4>
                                <span class="text-dark font-italic">
                            {{ $notification->created_at->toDateTimeString() }}
                            </span>
                            </div>
                        </div>
                    </a>

                @endif
            @endforeach
        </div>
    </div>
</div>
@include('frontend.layouts.lower-main')
