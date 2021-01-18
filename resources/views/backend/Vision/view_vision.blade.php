@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Vision</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Vision</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3>
                                    Vision List
                                    @if($CountVision<1)
                                    <a href="{{ route('add-vision') }}" class="btn btn-primary float-sm-right"> <i class="fa fa-plus-circle"></i> Add Vision</a>
                                    @endif
                                </h3>
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>SL.</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allData as $key => $vision)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><img src="{{(!empty($vision->image))?url('/upload/vision_image/'.$vision->image):url('/upload/no-img.png')}}" height="150px" width="300px" alt="logo"></td>
                                            <td>
                                            <textarea name="title" id="" cols="30" rows="5" class="form-control">
                                                {{$vision->title}}
                                            </textarea>
                                            </td>
                                            
                                            <td>
                                                <a title="Edit" href="{{ route('edit-vision',$vision->id) }}" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a title="Delete" id="delete" href="{{ route('delete-vision',$vision->id)}}" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
