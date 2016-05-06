@extends('layouts.admin_fluid')

@section('title', 'Dashboard')

@section('dashboard-active', 'active')

@push('styles')

@endpush

@section('main')
<div class="container">
  @if (session('status'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('status') }}
    </div>
@endif
  <div class="row">
    <div class="col-md-8">
      <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title"><i class="fa fa-wrench"></i> Manage</div>
            </div>
            <div class="panel-body">
              <p class="lead">
                Manage Slides
              </p>
              <div class="well">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Client Name</th>
                      <th>Description</th>
                      <th>Custom Text 1</th>
                      <th>Custom Text 2</th>
                      <th>Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ( $images as $img )
                      <tr>
                        <td><img src="/{{$img->file_path}}" style="width:100px;"></td>
                        <td>{{$img->client_name}}</td>
                        <td>{{$img->description}}</td>
                        <td>{{$img->text1}}</td>
                        <td>{{$img->text2}}</td>
                        <td>{{$img->date}}</td>
                        <td><a href="{{route('delete_image', ['id' => $img->id])}}" class="btn btn-danger delete_image" onclick="return confirm('Are you sure to delete?')">Delete</a></td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>
    </div>
    <div class="col-md-4 col-md-push-1">
      <div class="row">
        <div class="panel panel-info">
            <div class="panel-heading">
              <div class="panel-title"><i class="fa fa-plus"></i> New</div>
            </div>
            <div class="panel-body">
              <p class="lead">
                Add new slide
              </p>
              <div class="well">
                <form method="post" action="{{route('create_image')}}" role="form" class="" id="create_carousel" enctype="multipart/form-data">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label>Select Image</label>
                    <input type="file" name="carousel_image" required="true">
                    <span class="text-danger" data-error-msg-for="carousel_image"></span>
                  </div>
                  <div class="form-group">
                    <label>Client Name</label>
                    <input type="text" placeholder="Client Name" name="client_name" required="true" class="form-control">
                    <span class="text-danger" data-error-msg-for="client_name"></span>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea placeholder="Description" name="description" required="true" class="form-control"></textarea>
                    <span class="text-danger" data-error-msg-for="description"></span>
                  </div>
                  <div class="form-group">
                    <label>Custom Text 1</label>
                    <input type="text" placeholder="Custom Text 1" name="custom_text_1" required="true" class="form-control">
                    <span class="text-danger" data-error-msg-for="custom_text_1"></span>
                  </div>
                  <div class="form-group">
                    <label>Custom Text 2</label>
                    <input type="text" placeholder="Custom Text 2" name="custom_text_2" required="true" class="form-control">
                    <span class="text-danger" data-error-msg-for="custom_text_2"></span>
                  </div>
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="text" id="datepicker" placeholder="Start Date" name="start_date" required="true" class="form-control">
                    <span class="text-danger" data-error-msg-for="start_date"></span>
                  </div>
                    <input type="submit" class="btn btn-primary" value="Start">
                </form>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
@stop


@push('scripts')
<script>
  $(document).ready(function() {
    $("#datepicker").datepicker({'format':'yyyy-mm-dd'});
  });
</script>
@endpush
