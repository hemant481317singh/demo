@extends('layout.dashboard')

@section('title')
	AdminLite | Slider
@stop

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL::to('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mailbox</li>
    </ol>
  </section>

  <section>

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->s
@stop