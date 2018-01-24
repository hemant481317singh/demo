@extends('layout.dashboard')

@section('title')
	AdminLite | Product Type-create
@stop

@section('content')
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product Type <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product Type</li>
      <li class="active">Add</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">ADD Product Type</h3>
            <div class="row">
              <div class="col-sm-12">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                  <a href="{{ URL::route('producttype.index') }}" style="width:90px;" class="btn btn-block btn-primary pull-right"> < Back</a>
                </div>           
              </div>
            </div>
          </div><!-- /.box-header -->
          @if($errors->count() > 0 )
           <div class="alert alert-danger">
          {!! HTML::ul($errors->all()) !!}
          </div>
          @endif

          <div class="box-body">
            <div class="col-xs-12">
              {!! Form::open(['route' => 'producttype.store','method'=>'post','files' =>'true']) !!}
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('lblcategory','Category:') !!}
                  {!! Form::select('category',$category, e(Input::old('category')), ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lbltitle','Title:') !!}
                  {!! Form::text('title' ,e(Input::old('title'))?Input::old('title'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblcaption','Caption (Description to be displayed on image - max 500 characters):') !!}
                  {!! Form::textarea('caption' ,e(Input::old('caption'))?Input::old('caption'):'', ['class'=>'form-control']) !!}
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                    {!! Form::label('lblimage','Upload Image:') !!}
                    {!! Form::file('image') !!}
                </div>
                <div class="form-group">
                    <br/>
                </div>
                <div class="form-group">
                  {!! Form::label('lblstatus', 'status') !!}
                  {!! Form::select('status', [''=>'select an option','0'=>'Not active','1'=>'Active','-1'=>'Deleted'], e(Input::old('status'))?Input::old('status'):'', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::submit('SAVE' , ['class' => 'btn btn-block btn-success' , 'style'=>'width:120px;']) !!}
                </div>
              </div>
                {!! Form::close() !!}
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

@stop