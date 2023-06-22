@extends('layouts.app')
@section('content')
    <meta name="_token" content="{{ csrf_token() }}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ URL::asset('js/angular/chat/chat_controller.js') }}" type="text/javascript"></script>

    
    <div ng-app="PracticalTaskApp" ng-controller="chatController">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Contacts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr ng-repeat="user in all_user">
                                <td>

                                    <a ng-click="featchSelectedUserDetails(user.id)"><%user.name%></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-9">
                    <div class="card">
                        <div class="card-header">
                            <h5><%selected_user.name%></h4>
                        </div>
                        <div class="card-body" >
                            <p ng-repeat="message in thread.messages"
                                ng-class="{'text-right':message.sender_id == auth_id}">
                                <span class="badge badge-rounded"
                                    ng-class="{'bg-primary':message.sender_id == auth_id ,'bg-success':message.sender_id != auth_id}">
                                    <%message.messages_text%>
                                </span>
                            </p>
                            
                            <h4 class="text-center" ng-show="selected_user.length == 0">Please select at least 1 user</h4>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex">
                                <input class="form-control" type="text" name="message" ng-model="text"
                                    placeholder="Enter your message">
                                <button type="submit" class="btn btn-primary" ng-click="sendSmsToUser(text)">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- @extends('layouts.app')

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    const pusher = new Pusher('cccf9fb48a7b06d530c8', {
        cluster: 'ap2',
        encrypted: true,
        useTLS: true,
    });

    const channel = pusher.subscribe('chat-app');

    channel.bind('new-message', function(data) {
        console.log(data.message);
       
    });
</script>

    <div class="container">
        <div class="row">
            <div class="col-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Contacts</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_users as $user)
                            <tr>
                                <td
                                    class="@if (!empty($selected_user)) @if ($selected_user['id'] == $user['id'])
                                bg-success @endif @endif">
                                    <a class="text-dark text-decoration-none
                                    @if (!empty($selected_user)) @if ($selected_user['id'] == $user['id'])
                                            text-white @endif 
                                    @endif"
                                        href="{{ route('chats.show', $user['id']) }}">{{ $user['name'] }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-9">
                <div class="card">
                    @if (!empty($selected_user))
                        <div class="card-header">
                            {{ $selected_user['name'] }}
                        </div>
                        <div class="card-body">
                            @if ($thread != null)
                                @foreach ($thread->messages as $message)
                                    <p class="@if (Auth::id() == $message->sender_id) text-right
                                        
                                    @endif">
                                        <span class="badge @if (Auth::id() == $message->sender_id) text-right
                                            badge-success
                                            @else
                                            badge-primary
                                            @endif ">
                                            {{$message->messages_text}}
                                        </span>
                                    </p>
                                    
                                    
                                @endforeach
                            @endif
                        </div>
                        <div class="card-footer">
                            <form method="POST" action="{{ route('chats.save') }}">
                                @csrf
                                <input  type="hidden" name="user_id" value="{{ $selected_user['id'] }}">
                                <div class="d-flex">
                                    <input class="form-control" type="text" name="message" placeholder="Enter your message">
                                    <button type="submit" class="btn btn-primary ">Send</button>
                                  </div>
                            </form>
                        </div>
                    @else
                        <div class="card-body">
                            <h4>Select at least one user</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection --}}
