<?php $__env->startSection('content'); ?>
    <meta name="_token" content="<?php echo e(csrf_token()); ?>">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?php echo e(URL::asset('js/angular/chat/chat_controller.js')); ?>" type="text/javascript"></script>

    
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
<?php $__env->stopSection(); ?>





<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/my_chat_app/resources/views/chats/chat.blade.php ENDPATH**/ ?>