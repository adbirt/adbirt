<?php 
    use App\Model\NotificationAlertModel;


    $Notify = NotificationAlertModel::where('status','Unseen')
                                        ->where('Notify_Receivers_Id',Auth::user()->id)
                                        ->orderBy('id','desc')
                                        ->get();

    $NotifyCnt = count(NotificationAlertModel::where('status','Unseen')
                                                    ->where('Notify_Receivers_Id',Auth::user()->id)
                                                    ->orderBy('id','desc')
                                                    ->get());

?>
<style type="text/css">
.notifheading{font-size: 11px;line-height: 20px!important;}
.notifycard{}
</style>
<div class="dropdown">
    
        <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
            <i class="fa fa-flag-o"></i>   
            @if($NotifyCnt >= 1 )
                  {{ $NotifyCnt }}
            @endif
        </a>
    
    <div class="dropdown-menu dropdown-menu-right dropdown-menu-list notificationfirst" aria-labelledby="Preview"> 
        <div class="card card-stats-primary" >
            <div class="card-block">
                <ul class="list-unstyled notificationclass" >
                    @if(!empty($Notify))
                        @foreach ($Notify as  $value) 
                            <a style="color:#000000;" Onclick=ChngStatus({{ $value->id }});>
                                <li class="notifheading"><i class="fa fa-envelope fa-fw"></i> {{ $value->heading }}</li>
                            </a>
                        @endforeach
                    @else
                        <a style="color:#000000;" Onclick=ChngStatus({{ $value->id }});>
                            <li class="notifheading text-center nonotification">
                                <span>No New Notification</span>
                            </li>
                        </a>
                    @endif
                </ul>
                <br />
                <a  Onclick="ChngeAll('Chnge');" class="alertnotify ">
                    <center><strong>See More Notifications
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i></strong></center>
                </a>
            </div>
        </div>

    </div>
</div>
<script type="text/javascript">
var baseUrl = "{{ url('/')}}"
function ChngStatus(id){
    $.ajax({
        url: baseUrl+'/notify/ChngeStatus',
        type: 'POST',
        data: {id: id},
    })
    .done(function() {
        window.location.href = "{{ url('/notify/view-notifications') }}";
    })          
};    
function ChngeAll(status){
    $.ajax({
        url: baseUrl+'/notify/ChngeStatus',
        type: 'POST',
        data: {id: status},
    })
    .done(function() {
        window.location.href = "{{ url('/notify/view-notifications') }}";
    })          
};                                                                                                       
</script>
