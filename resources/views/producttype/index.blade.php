@extends('layout.dashboard')

@section('title')
  AdminLite | Product Type
@stop

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Product Type
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{URL::route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Product Type</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Table</h3>
            <div class="row">
              <br/>
              <div class="col-sm-12">
                <div class="col-sm-6">
                  <a class="btn btn-success btn-sm" href="{{ URL::route('producttype.create') }}">Add Product Type</a>
                </div>
                <div class="col-sm-6">
                </div>           
              </div>
            </div>
          </div><!-- /.box-header -->
          @if($errors->count() > 0 )
           <div class="alert alert-danger">
          {!! HTML::ul($errors->all()) !!}
          </div>
          @endif
          @if(Session::has('flash_message'))
            <div class="alert alert-success">
            {{ Session::get('flash_message') }}
            </div>
          @endif
          <div class="box-body">
            <div class="dataTables_wrapper form-inline dt-bootstrap" id="example1_wrapper">
              <div class="row">
                <div class="col-sm-6">
                  <!-- content above record box -->
                </div>            
              </div>
            </div>
            <div class="row">
            <div class="col-sm-12">
            <table aria-describedby="example1_info" role="grid" id="example1" class="table table-bordered table-striped dataTable">
              <thead>
                <tr role="row">
                <th  style="width:  4%;" rowspan="1"  tabindex="0" >Sr. No.</th>
                <th  style="width: 15%;" rowspan="1"  tabindex="0">Title</th>
                <th  style="width: 30%;" rowspan="1"  tabindex="0">Caption</th>
                <th  style="width: 15%;" rowspan="1"  tabindex="0">Image</th>
                <th  style="width:  8%;" rowspan="1"  tabindex="0">Category</th>
                <th  style="width:  8%;" rowspan="1"  tabindex="0">Status</th>
                <th  style="width: 20%;" rowspan="1"  tabindex="0">Edit/Delete</th></tr>
              </thead>
              <tbody>
              <?php $count = 1; ?>
                @foreach($producttype as $key => $value)
                  @if($count%2 ==0)
                  <tr class="even" role="row">
                  @else
                  <tr class="odd" role="row">
                  @endif
                    <td class="sorting_1">{!! $count !!}</td>
                    <td>{!! $value->title !!}</td>
                    <td>{!! $value->description!!}</td>
                    <td align="center"><img src="{!! $value->image !!}" height="50" width="100"></td>
                    <td>{!! $value->category->title !!}</td>
                    @if($value->status == 0)
                      <td align="center">Not Active</td>
                    @elseif($value->status == 1)
                      <td align="center">Active</td>
                    @else
                      <td align="center">Deleted</td>
                    @endif
                    <td>
                      <!-- Delete Button -->
                      {!! Form::open(array('url' => 'producttype/' . $value->id, 'class' => 'pull-right')) !!}
                      {!! Form::hidden('_method', 'DELETE') !!}
                      {!! Form::submit('Delete', array('class' => 'btn btn-warning')) !!}
                      {!! Form::close() !!}
                      <!-- edit this role (uses the edit method found at GET /roles/{id}/edit -->
                      <!-- edit button -->
                      <a class="btn btn-small btn-info" href="{{ URL::to('producttype/' . $value->id . '/edit') }}">Edit</a>            
                    </td>
                  </tr>
                  {{--*/ $count++ /*--}}
                @endforeach
              </tbody>
            </table>
            </div><!-- row -->
            </div><!-- col-12 -->
            <div class="row">
              <div class="col-sm-5">
                <div aria-live="polite" role="status" id="example1_info" class="dataTables_info"> </div>
              </div>
              <div class="container-fluid" align="right">
                <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                  <ul class="pagination">
                    {!! $producttype->render()!!}
                  </ul>
                </div>
              </div>
            </div>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@stop