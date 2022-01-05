 <!-- User dropdown -->
 <li class="nav-item dropdown">
  <a class="nav-link active dropdown-toggle p-a-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false">
  @if(Auth::user()->profile)
    {!! Html::image(Auth::user()->profile->propic, 'User profile picture', array('class' => 'img-responsive img-circle', 'width' => '40px', 'height' => '40px' )) !!}
  @endif
    {{-- Auth::user()->name --}}
    <!-- <img src="assets/images/people/50/guy-6.jpg" alt="Avatar" class="img-circle" width="40"> -->
  </a>
  <div class="dropdown-menu dropdown-menu-right dropdown-menu-list" aria-labelledby="Preview">
    <a class="dropdown-item" style="text-transform:uppercase; font-weight:500;" href="{!!route('profile')!!}"> <span class="icon-text">{{ str_limit(Auth::user()->name, $limit = 15, $end = '') }}</span></a> 
    <a class="dropdown-item" href="{!!route('profile')!!}"><i class="material-icons md-18">person</i> <span class="icon-text">Public Profile</span></a>
    <a class="dropdown-item" href="{{ route('edit.profile') }}"><i class="material-icons md-18">edit</i> <span class="icon-text">Edit Profile</span></a>
    <a class="dropdown-item" href="{!!route('password.change')!!}"><i class="material-icons md-18">enhanced_encryption</i> <span class="icon-text">Change Password</span></a>
		<!--  <span class="sidebar-menu-label label label-default">2</span>
      <a class="dropdown-item" href="profile.html"><i class="material-icons md-18">comment</i> <span class="icon-text">Notification</span></a> -->

      <a class="dropdown-item" href="{!! route('logout') !!}"><i class="material-icons md-18">lock_open</i>Logout</a>
    </div>
  </li>
      <!-- // END User dropdown -->