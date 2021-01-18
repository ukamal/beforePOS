@extends('backend.layouts.master')
@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage Footer</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Footer</li>
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
                                    Update Footer
                                    <a href="{{ route('view-footer') }}" class="btn btn-primary float-sm-right"> <i class="fas fa-user"></i>Back</a>
                                </h3>
                            </div>
                            <div class="card-body">
           <form action="{{ route('update-footer',$editData->id) }}" method="post" id="myForm">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" value="{{$editData->address}}">
        </div>
        <div class="form-group col-md-6">
            <label for="mobile">Mobile</label>
            <input type="text" name="mobile" class="form-control" value="{{$editData->mobile}}">
        </div>
        <div class="form-group col-md-6">
            <label for="email">Email</label>
            <input type="text" name="email" class="form-control" value="{{$editData->email}}">
        </div>
        <div class="form-group col-md-6">
            <label for="facebook">Facebook</label>
            <input type="text" name="facebook" class="form-control" value="{{$editData->facebook}}">
        </div>
        <div class="form-group col-md-6">
            <label for="twitter">Twitter</label>
            <input type="text" name="twitter" class="form-control" value="{{$editData->twitter}}">
        </div>
        <div class="form-group col-md-6">
            <label for="youtube">Youtube</label>
            <input type="text" name="youtube" class="form-control" value="{{$editData->youtube}}">
        </div>
        <div class="form-group col-md-6">
            <label for="linkedin">Linkedin</label>
            <input type="text" name="linkedin" class="form-control" value="{{$editData->linkedin}}">
        </div>
        <div class="form-group col-md-12">
            <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit">
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
