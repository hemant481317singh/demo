@extends('layout.dashboard')

@section('title')
	AdminLite | Product-create
@stop

@section('content')
  <div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product </li>
      <li class="active">Add</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">ADD Product </h3>
            <div class="row">
              <div class="col-sm-12">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                  <a href="{{ URL::route('products.index') }}" style="width:90px;" class="btn btn-block btn-primary pull-right"> < Back</a>
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
              {!! Form::open(['route' => 'products.store','method'=>'post','files' =>'true']) !!}
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('lblcategory','Category*:') !!}
                  <select name="category" id="categorylist" class="form-control">
                    <option disabled selected>Select an option</option>
                    @foreach($category as $key => $value)
                      <option value="{!! $key !!}"> {!! $value !!} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  {!! Form::label('lblproducttype','Product Type*:') !!}
                  <select name="producttype" id="producttypelist" class="form-control">
                    <option>select an option</option>
                  </select>
                </div>
                <div class="form-group">
                  {!! Form::label('lblcode','Code*:') !!}
                  {!! Form::text('code' ,e(Input::old('code'))?Input::old('code'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('lblimage','Upload Image*:') !!}
                    {!! Form::file('image') !!}
                </div>
                  {!! Form::label('lblheight','Height:') !!}
                <div class="form-group">
                  <div class="col-xs-6">
                    {!! Form::text('height' ,e(Input::old('height'))?Input::old('height'):'', ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-6">
                    {!! Form::select('height_unit',['0'=>'mm','1'=>'cm','2'=>'inch','3'=>'feet','4'=>'meter'], e(Input::old('height_unit')), ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                <br/>
                </div>
                  {!! Form::label('lblwidth','Width:') !!}
                <div class="form-group">
                  <div class="col-xs-6">
                    {!! Form::text('width' ,e(Input::old('width'))?Input::old('width'):'', ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-6">
                    {!! Form::select('width_unit',['0'=>'mm','1'=>'cm','2'=>'inch','3'=>'feet','4'=>'meter'], e(Input::old('width_unit')), ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                <br/>
                </div>
                <div class="form-group">
                  {!! Form::label('lblcolour','Colour:') !!}
                  {!! Form::text('colour' ,e(Input::old('colour'))?Input::old('colour'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblseries','Series:') !!}
                  {!! Form::text('series' ,e(Input::old('series'))?Input::old('series'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblapplication','Application:') !!}
                  {!! Form::text('application' ,e(Input::old('application'))?Input::old('application'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblfinish','Finish:') !!}
                  {!! Form::text('finish' ,e(Input::old('finish'))?Input::old('finish'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblbody','Body:') !!}
                  {!! Form::text('body' ,e(Input::old('body'))?Input::old('body'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblfrontresistant','Frontresistant:') !!}
                  {!! Form::text('frontresistant' ,e(Input::old('frontresistant'))?Input::old('frontresistant'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblpei','P.E.I Rating:') !!}
                  {!! Form::text('pei' ,e(Input::old('pei'))?Input::old('pei'):'', ['class'=>'form-control']) !!}
                </div>
              </div>
              <div class="col-xs-6">
                
                <div class="form-group">
                  {!! Form::label('lblmhos','MOHS Rating:') !!}
                  {!! Form::text('mohs' ,e(Input::old('mohs'))?Input::old('mohs'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblcof','COF Rating (wet/dry):') !!}
                  {!! Form::text('cof' ,e(Input::old('cof'))?Input::old('cof'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lbldcof','DCOF Rating:') !!}
                  {!! Form::text('dcof' ,e(Input::old('dcof'))?Input::old('dcof'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblthickness','Thickness (mm):') !!}
                  {!! Form::text('thickness' ,e(Input::old('thickness'))?Input::old('thickness'):'', ['class'=>'form-control']) !!}
                </div>
                 <div class="form-group">
                  {!! Form::label('lblprice','Price:') !!}
                  {!! Form::text('price' ,e(Input::old('price'))?Input::old('price'):'', ['class'=>'form-control']) !!}
                 </div>
                 <div class="form-group">
                  {!! Form::label('lblpricesqft','Pricesqft:') !!}
                  {!! Form::text('pricesqft' ,e(Input::old('pricesqft'))?Input::old('pricesqft'):'', ['class'=>'form-control']) !!}
                 </div>
                <div class="form-group">
                  {!! Form::label('lblconversion','Conversion:') !!}
                  {!! Form::text('conversion' ,e(Input::old('conversion'))?Input::old('conversion'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblpieces','Pieces:') !!}
                  {!! Form::text('pieces' ,e(Input::old('pieces'))?Input::old('pieces'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblweightperpiece','Weight lbs (per pieces):') !!}
                  {!! Form::text('weightperpieces',e(Input::old('weightperpieces'))?Input::old('weightperpieces'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblweightperbox','Weight lbs (per box):') !!}
                  {!! Form::text('weightperbox',e(Input::old('weightperbox'))?Input::old('weightperbox'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblboxperpallet','Box (per pallet):') !!}
                  {!! Form::text('boxperpallet' ,e(Input::old('boxperpallet'))?Input::old('boxperpallet'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblpiecesperpallet','Pieces (per pallet):') !!}
                  {!! Form::text('piecesperpallet' ,e(Input::old('piecesperpallet'))?Input::old('piecesperpallet'):'', ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblstatus', 'Status*:') !!}
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