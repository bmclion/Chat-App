

app.controller('chatController',function ($scope,$http)
{
    $scope.all_user = {};
    $scope.selected_user = [];
    $scope.thread = {};
    $scope.auth_id = null;
  

    $scope.pusherListen = function()
    {

        var pusher = new Pusher('cccf9fb48a7b06d530c8', {
            cluster: 'ap2'
        });

        var channel = pusher.subscribe('chat-channel');
        channel.bind('my-chat-event', function(data) {
            let chats = data.chats;
            if(chats.sender_id != $scope.auth_id)
            {
                $scope.featchSelectedUserDetails(chats.sender_id);
            }
            // alert(JSON.stringify(data));
        });
    }

    $scope.init = function ()
    {
      
        $http.get(url + 'api/chat/get_all_details')
            .then(function (response)
            {
                $scope.all_user = response.data.all_user;
                $scope.auth_id = response.data.auth_id;
                $scope.text = '';
                $scope.pusherListen();
            })
            .catch(function ()
            {
            });
    };
    $scope.featchSelectedUserDetails = function(selected_user_id)
    {
        $http.post(url + 'api/chat/fetch_selected_user_details',{
            id:selected_user_id
        }).then(function (response)
        {
            $scope.selected_user = response.data.selected_user;
            $scope.thread = response.data.thread;
            $scope.text = '';
        })
        .catch(function ()
        {
        })
    };
    $scope.sendSmsToUser = function(text)
    {
        $http.post(url + 'api/chat/send_text',{
            reciver_id:$scope.selected_user.id,
            thread_id:$scope.thread == null ? null : $scope.thread.id,
            text:text
        }).then(function (response)
        {
            $scope.selected_user = response.data.selected_user;
            $scope.thread = response.data.thread;
            $scope.text = '';
        })
        .catch(function ()
        {
        })
    }
    $scope.init();
});