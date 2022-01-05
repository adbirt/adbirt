@extends('partials.pagination')
@extends('layouts.no-sidebar')
@section('content')
{!! Html::style('dist/cssc/app.css') !!}
  <!-- Content -->
  <div class="layout-content" data-scrollable>
    <div class="container">

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
        <div class="fullscreen dashboard">
  <div class="container">		
    <div class="tools blocks">
			<h2>Application Tools</h2>
			<a ng-href="/#/search">
				<i class="fa fa-search"></i>
				<span>Search</span>
			</a>
			<a ui-sref="data-manager">
				<i class="fa fa-thumbs-o-up"></i>
				<span>Approval</span>
			</a>
			<a ui-sref="notam-search">
				<i class="fa fa-exclamation-triangle"></i>
				<span>NOTAM</span>
			</a>
			<a ng-href="/#/chart-manager">
				<i class="fa fa-map-o"></i>
				<span>Chart</span>
			</a>
			<a ng-href="/#/terminal-procedures">
				<i class="fa fa-plane"></i>
				<span>Procedure</span>
			</a>
			<a ng-href="/#/customer-profile">
				<i class="fa fa-user"></i>
				<span>Customer</span>
			</a>
			<a ng-href="/#/airport-surveillance">
				<i class="fa fa-binoculars"></i>
				<span>Surveilliance</span>
			</a>
			<a class="obstacle" ng-href="/#/obstacle/upload">
				<i class="fa fa-tree"></i>
				<span>Obstacle Uploader</span>
			</a>
			<a class="obstacle" ng-href="/#/obstacle/upload">
				<i class="fa fa-tree"></i>
				<span>Obstacle Uploader</span>
			</a>
			<a class="obstacle" ng-href="/#/obstacle/upload">
				<i class="fa fa-tree"></i>
				<span>Obstacle Uploader</span>
			</a>
		</div>
		
    <div class="tools large-blocks">
	<br />
	<center>
			<h2 style="padding-right:830px;">Home OS</h2>
			
			<a ng-href="/#/search">
				<i class="fa fa-search"></i>
				<div class="circle"></div>
				<span>Data Search</span>
				<p>Search all entities within the database.</p>
			</a>
			<a ui-sref="data-manager">
				<i class="fa fa-thumbs-o-up"></i>
				<div class="circle"></div>
				<span>Data Approval</span>
				<p>Manage pending updates to the database.</p>
			</a>
			<a ui-sref="notam-search">
				<i class="fa fa-exclamation-triangle"></i>
				<div class="circle"></div>
				<span>NOTAM Manager</span>
				<p>View and apply digital NOTAMs.</p>
			</a>
			<a ng-href="/#/chart-manager">
				<i class="fa fa-map-o"></i>
				<div class="circle"></div>
				<span>Chart Manager</span>
				<p>Create and manage chart exports.</p>
			</a>
			<a class="procedures" ng-href="/#/terminal-procedures">
				<i class="fa fa-plane"></i>
				<div class="circle"></div>
				<span>Terminal Procedures</span>
				<p>Create and manage procedures.</p>
			</a>
			<a ng-href="/#/customer-profile">
				<i class="fa fa-user"></i>
				<div class="circle"></div>
				<span>Customer Profiles</span>
				<p>Manage customer and aircraft profiles.</p>
			</a>
			<a ng-href="/#/airport-surveillance">
				<i class="fa fa-binoculars"></i>
				<div class="circle"></div>
				<span>Airport Surveilliance</span>
				<p>Manage airport surveilliance list.</p>
			</a>
			<a class="obstacle" ng-href="/#/obstacle/upload">
				<i class="fa fa-tree"></i>
				<div class="circle"></div>
				<span>Obstacle Uploader</span>
				<p>Use web-based upload tool for obstacles.</p>
			</a>
			</center>
		</div>
		
		 <div class="tools large-blocks">
	<br />
	<center>
			<h2 style="padding-right:760px;">Business Suite</h2>
			
			<a ng-href="/#/search">
				<i class="fa fa-search"></i>
				<div class="circle"></div>
				<span>Data Search</span>
				<p>Search all entities within the database.</p>
			</a>
			<a ui-sref="data-manager">
				<i class="fa fa-thumbs-o-up"></i>
				<div class="circle"></div>
				<span>Data Approval</span>
				<p>Manage pending updates to the database.</p>
			</a>
			<a ui-sref="notam-search">
				<i class="fa fa-exclamation-triangle"></i>
				<div class="circle"></div>
				<span>NOTAM Manager</span>
				<p>View and apply digital NOTAMs.</p>
			</a>
			<a ng-href="/#/chart-manager">
				<i class="fa fa-map-o"></i>
				<div class="circle"></div>
				<span>Chart Manager</span>
				<p>Create and manage chart exports.</p>
			</a>
			<a class="procedures" ng-href="/#/terminal-procedures">
				<i class="fa fa-plane"></i>
				<div class="circle"></div>
				<span>Terminal Procedures</span>
				<p>Create and manage procedures.</p>
			</a>
			<a ng-href="/#/customer-profile">
				<i class="fa fa-user"></i>
				<div class="circle"></div>
				<span>Customer Profiles</span>
				<p>Manage customer and aircraft profiles.</p>
			</a>
			<a ng-href="/#/airport-surveillance">
				<i class="fa fa-binoculars"></i>
				<div class="circle"></div>
				<span>Airport Surveilliance</span>
				<p>Manage airport surveilliance list.</p>
			</a>
			<a class="obstacle" ng-href="/#/obstacle/upload">
				<i class="fa fa-tree"></i>
				<div class="circle"></div>
				<span>Obstacle Uploader</span>
				<p>Use web-based upload tool for obstacles.</p>
			</a>
			</center>
		</div>
		
		
		
<div class="tools large-blocks">
	<br />
	<center>
			<h2 style="padding-right:860px;">Utilities</h2>
			
			<a ng-href="/#/search">
				<i class="fa fa-search"></i>
				<div class="circle"></div>
				<span>Data Search</span>
				<p>Search all entities within the database.</p>
			</a>
			<a ui-sref="data-manager">
				<i class="fa fa-thumbs-o-up"></i>
				<div class="circle"></div>
				<span>Data Approval</span>
				<p>Manage pending updates to the database.</p>
			</a>
			<a ui-sref="notam-search">
				<i class="fa fa-exclamation-triangle"></i>
				<div class="circle"></div>
				<span>NOTAM Manager</span>
				<p>View and apply digital NOTAMs.</p>
			</a>
			<a ng-href="/#/chart-manager">
				<i class="fa fa-map-o"></i>
				<div class="circle"></div>
				<span>Chart Manager</span>
				<p>Create and manage chart exports.</p>
			</a>
			<a class="procedures" ng-href="/#/terminal-procedures">
				<i class="fa fa-plane"></i>
				<div class="circle"></div>
				<span>Terminal Procedures</span>
				<p>Create and manage procedures.</p>
			</a>
			<a ng-href="/#/customer-profile">
				<i class="fa fa-user"></i>
				<div class="circle"></div>
				<span>Customer Profiles</span>
				<p>Manage customer and aircraft profiles.</p>
			</a>
			<a ng-href="/#/airport-surveillance">
				<i class="fa fa-binoculars"></i>
				<div class="circle"></div>
				<span>Airport Surveilliance</span>
				<p>Manage airport surveilliance list.</p>
			</a>
			<a class="obstacle" ng-href="/#/obstacle/upload">
				<i class="fa fa-tree"></i>
				<div class="circle"></div>
				<span>Obstacle Uploader</span>
				<p>Use web-based upload tool for obstacles.</p>
			</a>
			</center>
		</div>		
		
		
		<div class="tools large-blocks">
	<br />
	<center>
			<h2 style="padding-right:810px;">Educational</h2>
			
			<a ng-href="/#/search">
				<i class="fa fa-search"></i>
				<div class="circle"></div>
				<span>Data Search</span>
				<p>Search all entities within the database.</p>
			</a>
			<a ui-sref="data-manager">
				<i class="fa fa-thumbs-o-up"></i>
				<div class="circle"></div>
				<span>Data Approval</span>
				<p>Manage pending updates to the database.</p>
			</a>
			<a ui-sref="notam-search">
				<i class="fa fa-exclamation-triangle"></i>
				<div class="circle"></div>
				<span>NOTAM Manager</span>
				<p>View and apply digital NOTAMs.</p>
			</a>
			<a ng-href="/#/chart-manager">
				<i class="fa fa-map-o"></i>
				<div class="circle"></div>
				<span>Chart Manager</span>
				<p>Create and manage chart exports.</p>
			</a>
			<a class="procedures" ng-href="/#/terminal-procedures">
				<i class="fa fa-plane"></i>
				<div class="circle"></div>
				<span>Terminal Procedures</span>
				<p>Create and manage procedures.</p>
			</a>
			<a ng-href="/#/customer-profile">
				<i class="fa fa-user"></i>
				<div class="circle"></div>
				<span>Customer Profiles</span>
				<p>Manage customer and aircraft profiles.</p>
			</a>
			<a ng-href="/#/airport-surveillance">
				<i class="fa fa-binoculars"></i>
				<div class="circle"></div>
				<span>Airport Surveilliance</span>
				<p>Manage airport surveilliance list.</p>
			</a>
			<a class="obstacle" ng-href="/#/obstacle/upload">
				<i class="fa fa-tree"></i>
				<div class="circle"></div>
				<span>Obstacle Uploader</span>
				<p>Use web-based upload tool for obstacles.</p>
			</a>
			</center>
		</div>		
		
		
  </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      </div>

      <div class="footer">
        Copyright &copy; 2016 - <a href="https://themeforest.net/item/learnplus-learning-management-application/15287372?ref=mosaicpro">Purchase LearnPlus</a>
      </div>
    </div>