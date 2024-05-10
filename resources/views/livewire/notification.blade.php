<div class="col-12 p-0">
    <div class="bg-primary py-2">
        <p class="text-center m-0">
            <span style="cursor:pointer;" class="position-relative" id="allNotification">Notifications({{$notificationcount}})
                <div id="showNotifications" style="">
                    <ul>
                        @foreach ($notifications as $n)
                            <li><b>{{$n->subject}}</b><br>{{$n->content}}</li>
                        @endforeach
                    </ul>
                </div>
            </span>
        </p>
        
    </div>
    
</div>