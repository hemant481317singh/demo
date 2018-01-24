@extends('layout.dashboard')

@section('title')
  AdminLite | Product - Edit
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
      <li class="active">Product</li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Edit Product</h3>
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
              {!! Form::model($products,['route' => ['products.update', $products->id], 'method' => 'PUT','files' =>'true']) !!}
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('lblcategory','Category*:') !!}
                  {!! Form::select('category',$category, e(Input::old('category')?Input::old('category'):$products->category_id), ['id'=>'categorylist','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblproducttype','Product Type*:') !!}
                  {!! Form::select('producttype',$producttype, $products->producttype_id,['id'=>'producttypelist','class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblcode','Code*:') !!}
                  {!! Form::text('code' ,$products->code, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('lblimage','Upload Image*:') !!}
                    {!! Form::file('image') !!}
                </div>
                <div class="form-group">
                    <img src="{!!URL::asset($products->image)!!}" height="125" width="300">
                </div>
                  {!! Form::label('lblheight','Height:') !!}
                <div class="form-group">
                  <div class="col-xs-6">
                    {!! Form::text('height' ,$products->height, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-6">
                    {!! Form::select('height_unit',['0'=>'mm','1'=>'cm','2'=>'inch','3'=>'feet','4'=>'meter'], $products->height_unit, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                <br/>
                </div>
                  {!! Form::label('lblwidth','Width:') !!}
                <div class="form-group">
                  <div class="col-xs-6">
                    {!! Form::text('width' ,$products->width, ['class'=>'form-control']) !!}
                    </div>
                    <div class="col-xs-6">
                    {!! Form::select('width_unit',['0'=>'mm','1'=>'cm','2'=>'inch','3'=>'feet','4'=>'meter'], $products->width_unit, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="form-group">
                <br/>
                </div>
                <div class="form-group">
                  {!! Form::label('lblcolour','Colour:') !!}
                  {!! Form::text('colour' ,$products->colour, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblseries','Series:') !!}
                  {!! Form::text('series' ,$products->series, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblapplication','Application:') !!}
                  {!! Form::text('application' ,$products->application, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblfinish','Finish:') !!}
                  {!! Form::text('finish' ,$products->finish, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblbody','Body:') !!}
                  {!! Form::text('body' ,$products->body, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblfrontresistant','Frontresistant:') !!}
                  {!! Form::text('frontresistant' ,$products->frontresistant, ['class'=>'form-control']) !!}
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  {!! Form::label('lblpei','P.E.I Rating:') !!}
                  {!! Form::text('pei' ,$products->pei, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblmhos','MOHS Rating:') !!}
                  {!! Form::text('mohs' ,$products->mhos, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblcof','COF Rating (wet/dry):') !!}
                  {!! Form::text('cof' ,$products->cof, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lbldcof','DCOF Rating:') !!}
                  {!! Form::text('dcof' ,$products->dcof, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblthickness','Thickness (mm):') !!}
                  {!! Form::text('thickness' ,$products->thickness, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblprice','Price:') !!}
                  {!! Form::text('price' ,$products->price, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblpricesqft','Pricesqft:') !!}
                  {!! Form::text('pricesqft' ,$products->pricesqft, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblconversion','Conversion:') !!}
                  {!! Form::text('conversion' ,$products->conversion, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblpieces','Pieces:') !!}
                  {!! Form::text('pieces' ,$products->pieces, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblweightperpiece','Weight lbs (per pieces):') !!}
                  {!! Form::text('weightperpieces',$products->weight_piece, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblweightperbox','Weight lbs (per box):') !!}
                  {!! Form::text('weightperbox' ,$products->weight_box, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblboxperpallet','Box (per pallet):') !!}
                  {!! Form::text('boxperpallet' ,$products->box_pallet, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblpiecesperpallet','Pieces (per pallet):') !!}
                  {!! Form::text('piecesperpallet' ,$products->pieces_pallet, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('lblstatus', 'status') !!}
                  {!! Form::select('status', array('0' => 'Not active', '1' => 'Active', '-1' => 'Deleted'),$products->status, array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                  {!! Form::submit('MODIFY' , ['class' => 'btn btn-block btn-success' , 'style'=>'width:120px;']) !!}
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