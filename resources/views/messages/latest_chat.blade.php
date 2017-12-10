@foreach($messages as $message)


    @if($id != $message->recipient_id)
        <li class="d-flex justify-content-between mb-4">

            <img src="{{ $user->profile_pic }}" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
            <div class="chat-body white p-3 ml-2 z-depth-1" style="width: 100%;">
                <div class="header">
                    <strong class="primary-font">{{ $user->first_name." ".$user->last_name }}</strong>
                    <small class="pull-right text-muted" title="{{ $message->getTimeAttr() }}"><i class="fa fa-clock-o"></i> {{ $message->getAgeAttr() }}</small>
                </div>
                @if($message->image != null )
                    <hr class="w-100">
                    <a href="{{ $message->image }}" target="_blank">
                        @if(in_array(pathinfo($message->image, PATHINFO_EXTENSION), ['jpg', 'png']))
                            <img src="{{ $message->image }}" alt="" style="max-width: 200px;">
                        @else
                            {{ pathinfo($message->image, PATHINFO_BASENAME) }}
                        @endif
                    </a>
                @endif
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
                @if($message->image != null )
                    <hr class="w-100">
                    <a href="{{ $message->image }}" target="_blank">
                        @if(in_array(pathinfo($message->image, PATHINFO_EXTENSION), ['jpg', 'png']))
                            <img src="{{ $message->image }}" alt="" style="max-width: 200px;">
                        @else
                            {{ pathinfo($message->image, PATHINFO_BASENAME) }}
                        @endif
                    </a>
                @endif
                <hr class="w-100">
                <p class="mb-0">
                    {{ $message->message }}
                </p>
            </div>
            <img src="{{ auth()->user()->profile_pic }}" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
        </li>
    @endif



@endforeach