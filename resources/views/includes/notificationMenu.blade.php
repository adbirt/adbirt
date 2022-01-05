  <?php 
  use App\Profile;

  ?>

  <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
   <i class="material-icons">notifications</i>
   
   @if(Profile::noty() && \App\PendingTransfers::count() != 0)
   @if(Auth::user()->hasRole('admin')) 2
   @else 1
   @endif
   @elseif(Profile::noty() && \App\PendingTransfers::count() == 0)
   1
   @else

   @endif
 </a>
 
 <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
   
  <div class="card card-stats-primary">
    <div class="card-block">
      <center>
        <a style="color:#000000;">You have
          @if(Profile::noty() && \App\PendingTransfers::count() != 0)
          @if(Auth::user()->hasRole('admin')) 2 new notifications
          @else 1 new notification
          @endif
          @elseif(Profile::noty() && \App\PendingTransfers::count() == 0)
          1 new notification
          @else
          No new Notification
          @endif 
        </a>
      </center>
      <!-- inner menu: contains the actual data -->


      @if(Profile::noty())<a href="{{ route('edit.profile') }}">
      {{ Profile::noty() }} 
    </a>
    @else @endif
    <br />
    @if(Auth::user()->hasRole('admin'))
    @if(\App\PendingTransfers::count() != 0)
    <a style="color:#000000;" href="{!! URL::route('pending.index') !!}">
     You have a new Bank Deposit.
   </a>
   @endif
   @endif
 </div>
</div>

</div>


