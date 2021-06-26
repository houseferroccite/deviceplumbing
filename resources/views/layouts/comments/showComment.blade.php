<br>
<div class="d-flex justify-content-center row">
    <div class="col-md-12">
        <div class="bg-white comment-section">
            <div class="d-flex flex-row user p-2"><img class="rounded-circle"
                                                       src="{{ Storage::url($comment->user->image) }}" height="60px">
                <div class="d-flex flex-column ml-2"><span class="name font-weight-bold">{{$comment->user->name}}</span><span>{{$comment->created_at->format('d M Y H:i')}}</span>
                </div>
            </div>
            <div class="mt-2 p-2">
                <p class="comment-content">{{$comment->comment}}</p>
            </div>
        </div>
    </div>
</div>
