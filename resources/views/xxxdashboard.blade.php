@extends('layouts.dashlay')
    @section('content')
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Roboto Web Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">	
	
  {!! Html::style('dist/cssc/style.css') !!}	

  <!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container-fluid">

      <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      <div class="card card-stats-primary">
        <div class="card-block">
          <div class="media">
            <div class="media-left media-middle">
              <i class="material-icons text-muted-light">credit_card</i>
            </div>
            <div class="media-body media-middle">
              Your subscription ends on
              <strong>25 February 2015</strong>
            </div>
            <div class="media-right">
              <a class="btn btn-success btn-rounded" href="pay.html">Upgrade</a>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header bg-white">
              <div class="media">
                <div class="media-body">
                  <h4 class="card-title">Courses</h4>
                  <p class="card-subtitle">Your recent courses</p>
                </div>
                <div class="media-right media-middle">
                  <a class="btn btn-white" href="#"> View All</a>
                </div>
              </div>
            </div>
            <ul class="list-group list-group-fit m-b-0">
              <li class="list-group-item">
                <div class="media">
                  <div class="media-body media-middle">
                    <a href="take-course.html">Basics of HTML</a>
                  </div>
                  <div class="media-right media-middle">
                    <div class="center">
                      <span class="label label-pill label-primary m-b-05">25%</span>
                      <progress class="progress progress-primary m-b-0" value="25" max="100" style="width:100px">25%</progress>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="media">
                  <div class="media-body media-middle">
                    <a href="take-course.html">Angular in Steps</a>
                  </div>
                  <div class="media-right media-middle">
                    <div class="center">
                      <span class="label label-pill label-success m-b-05">100%</span>
                      <progress class="progress progress-success m-b-0" value="100" max="100" style="width:100px">100%</progress>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="media">
                  <div class="media-body media-middle">
                    <a href="take-course.html">Bootstrap Foundations</a>
                  </div>
                  <div class="media-right media-middle">
                    <div class="center">
                      <span class="label label-pill label-warning m-b-05">80%</span>
                      <progress class="progress progress-warning m-b-0" value="80" max="100" style="width:100px">80%</progress>
                    </div>
                  </div>

                </div>
              </li>
            </ul>
          </div>
          <div class="card">
            <div class="card-header bg-white">
              <div class="media">
                <div class="media-body">
                  <h4 class="card-title">Quizzes</h4>
                  <p class="card-subtitle">Your Performance</p>
                </div>
                <div class="media-right media-middle">
                  <a class="btn btn-white" href="#"> View All</a>
                </div>
              </div>
            </div>
            <ul class="list-group list-group-fit m-b-0">
              <li class="list-group-item">
                <div class="media">
                  <div class="media-body media-middle">
                    <div>
                      <a href="take-quiz.html">Title of quiz goes here?</a>
                    </div>
                    <small class="text-light">Course: <a href="view-course.html">Basics of HTML</a></small>
                  </div>
                  <div class="media-right center">
                    <h4 class=" m-b-0">5.8</h4>
                    <span class="text-muted-light">Good</span>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="media">
                  <div class="media-body media-middle">
                    <div>
                      <a href="take-quiz.html">Directives &amp; Routing</a>
                    </div>
                    <small class="text-light">Course: <a href="view-course.html">Angular in Steps</a></small>
                  </div>
                  <div class="media-right center">
                    <h4 class=" m-b-0 text-success">9.8</h4>
                    <span class="text-muted-light">Great</span>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="media">
                  <div class="media-body media-middle">
                    <div> <a href="take-quiz.html">Responsive &amp; Retina</a> </div>
                    <small class="text-light">Course: <a href="view-course.html">Bootstrap Foundations</a></small>
                  </div>
                  <div class="media-right center">
                    <h4 class=" m-b-0 text-danger">2.8</h4>
                    <span class="text-muted-light">Failed</span>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-5">
          <div class="card">
            <div class="card-header bg-white">
              <h4 class="card-title">Rewards</h4>
              <p class="card-subtitle">Your latest achievements</p>
            </div>
            <div class="card-block center">
              <div class="btn btn-primary btn-circle"><i class="material-icons">thumb_up</i></div>
              <div class="btn btn-danger btn-circle"><i class="material-icons">grade</i></div>
              <div class="btn btn-success btn-circle"><i class="material-icons">bubble_chart</i></div>
              <div class="btn btn-warning btn-circle"><i class="material-icons">keyboard_voice</i></div>
              <div class="btn btn-info btn-circle"><i class="material-icons">event_available</i></div>
            </div>
          </div>
          <div class="card">
            <div class="card-header bg-white">
              <div class="media">
                <div class="media-body media-middle">
                  <h4 class="card-title">Forum Activity</h4>
                  <p class="card-subtitle">Latest forum topics &amp; comments</p>
                </div>
                <div class="media-right media-middle">
                  <a class="btn btn-white" href="forum.html"> <i class="material-icons">keyboard_arrow_right</i></a>
                </div>
              </div>
            </div>
            <ul class="list-group list-group-fit">
              <li class="list-group-item">
                <div class="media m-b-0">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img src="assets/images/people/110/guy-9.jpg" alt="Guy" width="40" class="img-circle">
                    </a>
                  </div>
                  <div class="media-body media-middle">
                    <p class="m-b-0">
                      <a href="forum-thread.html">Can someone help me with the basic Setup?</a>
                      <br>
                    </p>
                    <p class="m-b-0">
                      <small>by: <a href="#">Adrian D.</a></small>
                    </p>
                    <small class="text-muted-light">5 min ago</small>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="media m-b-0">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img src="assets/images/people/110/guy-5.jpg" alt="Guy" width="40" class="img-circle">
                    </a>
                  </div>
                  <div class="media-body media-middle">
                    <p class="m-b-0">
                      <a href="forum-thread.html">Great work Guys. How do I create a Sidebar?</a>
                      <br>
                    </p>
                    <p class="m-b-0">
                      <small>by: <a href="#">Andrew B.</a></small>
                    </p>
                    <small class="text-muted-light">1 day ago</small>
                  </div>
                </div>
              </li>
              <li class="list-group-item">
                <div class="media m-b-0">
                  <div class="media-left media-middle">
                    <a href="#">
                      <img src="assets/images/people/110/woman-5.jpg" alt="Guy" width="40" class="img-circle">
                    </a>
                  </div>
                  <div class="media-body media-middle">
                    <p class="m-b-0">
                      <a href="forum-thread.html">Looking for the Best</a>
                      <br>
                    </p>
                    <p class="m-b-0">
                      <small>by: <a href="#">Michelle S.</a></small>
                    </p>
                    <small class="text-muted-light">2 days ago</small>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
	  </div>
	  </div>
	  </div>
	  </div>

    </div>
  </div>
  
     <!-- jQuery -->
	{!! Html::script('dist/vendor/jquery.min.js') !!}

  <!-- Bootstrap -->
  {!! Html::script('dist/vendor/tether.min.js') !!}
  {!! Html::script('dist/vendor/bootstrap.min.js') !!}


  <!-- AdminPlus -->
  {!! Html::script('dist/vendor/adminplus.js') !!}

  <!-- App JS -->
   {!! Html::script('dist/js/main.min.js') !!}