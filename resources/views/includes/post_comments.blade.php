<div class="collapse" id="comments-of-{{ $object->id }}">
    <div class="card m-2">
        <div class="card-block p-0">
            <div class="list-group">
                @if(auth()->check())
                    <form action="/comment/{{ $object->id }}" method="POST" data-id="{{ $object->id }}"
                          class="p-3 commenting-form">
                        {{ csrf_field() }}
                        <div class="md-form">
                            <i class="fa fa-pencil prefix"></i>
                            {{--<div id="comment"></div>--}}
                            <textarea class="md-textarea" name="comment" id="comment" cols="30" rows="10"></textarea>
                            {{--<textarea type="text" id="comment" name="comment" class="md-textarea"></textarea>
                            <label for="comment">Write your comment</label>--}}
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-default btn-rounded waves-effect">Comment</button>
                        {{--                                        <a href="{{ route('post.show', $object->id) }}" class="btn btn-outline-primary btn-rounded waves-effect">Write with more effects</a>--}}
                    </form>
                @endif
                <div data-id="{{ $object->id }}" class="loaded-comments">
                    @if(count($object->comments) > 0)
                        @foreach($object->comments as $comment)
                            <div class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">


                                    <div class="row rendered-text">
                                        <div class="col-md-2">
                                            <a href="/user/{{ $comment->user->profile_pic }}" target="_blank">
                                                <img style="max-height: 165px; min-width: 50px;"
                                                     class=" avatar {{--user_image--}}"
                                                     data-id="{{ $comment->user->id }}"
                                                     src="{{ starts_with($comment->user->profile_pic, 'http')?$comment->user->profile_pic:(!empty($comment->user->profile_pic)?'/storage/'.$comment->user->profile_pic:($comment->user->gender == 1?'/imgs/default_img/default_profile_pic_male.jpg':'/imgs/default_img/default_profile_pic_female.jpg')) }}"
                                                     alt="{{ $comment->user->first_name." ".$comment->user->middle_name." ".$comment->user->last_name }}">
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <h5 class="mb-1">
                                                    <a href="/user/{{ $comment->user->id }}" target="_blank">
                                                        {{ $comment->user->first_name." ".$comment->user->last_name }}
                                                    </a>
                                                </h5>
                                            </div>

                                        </div>
                                        <div class="col-md-2">
                                            <small class="text-muted" data-toggle="tooltip" data-placement="top"
                                                   title="{{ $comment->getTimeAttr() }}">{{ $comment->getAgeAttr() }}</small>
                                        </div>
                                        <div class="col-md-1">
                                            @if(auth()->check() && (auth()->user()->id == $comment->user_id || auth()->user()->id == $comment->object->user_id ))
                                                <small class="text-muted">
                                                    <button type="button" class="btn-floating red  delete-comment"
                                                            onclick="event.preventDefault();
                                                                    document.getElementById('delete-comment-form-of-{{ $comment->id }}').submit();">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>

                                                    <form id="delete-comment-form-of-{{ $comment->id }}"
                                                          action="/comment/{{ $comment->id }}/delete" method="POST"
                                                          style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>

                                                </small>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <p class="mb-1">
                                    {!! $comment->comment !!}
                                </p>
                            </div>
                        @endforeach
                    @else
                        <span>
                                                No comments yet.
                                            </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>