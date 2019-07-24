@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Company</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('companies.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                {{--<form role="form">--}}
                    {{--<div class="box-body">--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="name">Name</label>--}}
                            {{--<input type="name" class="form-control" id="name" placeholder="Name">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="exampleInputEmail1">Email address</label>--}}
                            {{--<input type="email" class="form-control" id="email" placeholder="Enter email">--}}
                        {{--</div>--}}
                        {{--<div class="form-group">--}}
                            {{--<label for="name">Website</label>--}}
                            {{--<input type="website" class="form-control" id="website" placeholder="Website">--}}
                        {{--</div>--}}
                        {{--<div class="box-footer">--}}
                            {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</form>--}}

                <form action="{{ route('companies.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Email:</strong>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Website:</strong>
                                <input type="text" name="website" class="form-control" placeholder="Website">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
