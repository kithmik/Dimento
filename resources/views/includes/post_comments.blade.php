<div class="collapse" id="comments-of-{{ $object->id }}">
    <div class="card m-2">
        <div class="card-block p-0">
            <div class="list-group">
                @if(auth()->check())
                    <form action="/comment/{{ $object->id }}" method="POST" data-id="{{ $object->id }}"
                          class="p-3 commenting-form">
                        {{ csrf_field() }}
                        <div class="md-form">
                            <div class="row">
                                <div class="col-md-9">
                                    <input type="text" name="comment" id="comment" placeholder="Enter Your Comment">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-md btn-outline-elegant waves-effect">Comment
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                @endif
                <div data-id="{{ $object->id }}" class="loaded-comments">
                    @if(count($object->comments) > 0)
                        @foreach($object->comments as $comment)
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <a href="/user/{{ $comment->user->id }}" target="_blank">
                                                    <img style="max-height: 40px; min-width: 50px;"
                                                         class="rounded-circle avatar"
                                                         data-id="{{ $comment->user->id }}"
                                                         src="{{ starts_with($comment->user->profile_pic, 'http')?$comment->user->profile_pic:(!empty($comment->user->profile_pic)?'/storage/'.$comment->user->profile_pic:($comment->user->gender == 1?'/imgs/default_img/default_profile_pic_male.jpg':'/imgs/default_img/default_profile_pic_female.jpg')) }}"
                                                         alt="{{ $comment->user->first_name." ".$comment->user->middle_name." ".$comment->user->last_name }}">
                                                </a>
                                                <a href="/user/{{ $comment->user->id }}" target="_blank">
                                                    {{ $comment->user->first_name." ".$comment->user->last_name }}
                                                </a>
                                                <small class="text-muted" data-toggle="tooltip" data-placement="top"
                                                       title="{{ $comment->getTimeAttr() }}">{{ $comment->getAgeAttr() }}</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <span style="margin: 15px;"><b>{!! $comment->comment !!}</b></span>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="row">
                                            @if(auth()->check() && (auth()->user()->id == $comment->user_id || auth()->user()->id == $comment->object->user_id || auth()->user()->type == 4 ))
                                                <small class="text-muted">
                                                    <button type="button" class="btn btn-md btn-outline-elegant waves-effect"
                                                            onclick="event.preventDefault();
                                                                    document.getElementById('delete-comment-form-of-{{ $comment->id }}').submit();">
                                                        <i class="fa fa-trash fa-1x" style="color: red" aria-hidden="true"></i>
                                                    </button>
                                                    <form id="delete-comment-form-of-{{ $comment->id }}"
                                                          action="{{ route('comment.destroy', $comment->id) }}" method="POST"
                                                          style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>

                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <span>No comments yet</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>