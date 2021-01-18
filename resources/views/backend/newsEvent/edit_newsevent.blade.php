@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage NewsEvent</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">NewsEvent</li>
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
                                    Update NewsEvent
                                    <a href="{{ route('view-newsevent') }}" class="btn btn-primary float-sm-right"> <i class="fas fa-user"></i>Back</a>
                                </h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('update-newsevent',$editData->id) }}" method="post" id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="date">Date</label>
                                            <input type="text" name="date" id="datepicker" class="form-control" readonly placeholder="dd-mm-yyyy" value="{{$editData->date}}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="short_title">Short Title</label>
                                            <input type="text" name="short_title" class="form-control" value="{{$editData->short_title}}">
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label for="long_title">Long title</label>
                                             <textarea name="long_title" id="" cols="30" rows="5" class="form-control">
                                                 {{$editData->long_title}}
                                             </textarea>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="image">Image</label>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <img id="showImage" src="{{(!empty($editData->image))?url('/upload/newsevent_image/'.$editData->image):url('/upload/no-img.png')}}" style="height: 160px;width: 150px;border: 1px solid #000" alt="img">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Update">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


@endsection
