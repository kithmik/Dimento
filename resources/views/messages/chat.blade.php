

<div style="max-height: 50vh; overflow-y: scroll;" id="chat-history-div">
    <ul class="list-unstyled chat">

    @foreach($messages as $message)


            @if($id != $message->recipient_id)
                <li class="d-flex justify-content-between mb-4">

                    <img src="{{ $user->profile_pic }}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                    <div class="chat-body white p-3 ml-2 z-depth-1" style="width: 100%;">
                        <div class="header">
                            <strong class="primary-font">{{ $user->first_name." ".$user->last_name }}</strong>
                            <small class="pull-right text-muted" title="{{ $message->getTimeAttr() }}"><i class="fa fa-clock-o"></i> {{ $message->getAgeAttr() }}</small>
                        </div>
                        <hr class="w-100">
                        <p class="mb-0">
                            {{ $message->message }}
                        </p>
                    </div>
                </li>

            @else
                <li class="d-flex justify-content-between mb-4">

                    <div class="chat-body white p-3 z-depth-1" style="width: 100%;">
                        <div class="header">
                            <strong class="primary-font">{{ auth()->user()->first_name." ".auth()->user()->last_name }}</strong>
                            <small class="pull-right text-muted" title="{{ $message->getTimeAttr() }}"><i class="fa fa-clock-o"></i> {{ $message->getAgeAttr() }}</small>
                        </div>
                        <hr class="w-100">
                        <p class="mb-0">
                            {{ $message->message }}
                        </p>
                    </div>
                    <img src="{{ auth()->user()->profile_pic }}" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                </li>
        @endif



    @endforeach
    </ul>

</div>






        {{--<li class="d-flex justify-content-between mb-4 pb-3">
            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
            <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                    <strong class="primary-font">Brad Pitt</strong>
                    <small class="pull-right text-muted"><i class="fa fa-clock-o"></i> 12 mins ago</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </li>--}}


<form action="{{ route('message.store') }}" method="POST" name="send-msg-form" id="send-msg-form">
    {{ csrf_field() }}

    <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}">

    <ul class="list-unstyled chat">
        <li class="white">
            <div class="form-group basic-textarea">
                <textarea class="form-control pl-0 my-0 md-textarea" id="message_text" name="message_text" rows="3" placeholder="Type your message here..."></textarea>
            </div>
        </li>
        <li>
            <button type="button" id="send-msg" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right">Send</button>
        </li>
    </ul>

</form>

