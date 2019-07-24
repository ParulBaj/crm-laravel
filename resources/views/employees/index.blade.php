@extends('layouts.master')

@section('content')
    <h1>Employee List</h1>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('employees.create') }}">Add new employee</a>
        </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default table-responsive">
                <table class="table table-condensed">
                    <tr>
                        <th class="text-center">{{ trans('No.') }}</th>
                        <th>{{ trans('First Name') }}</th>
                        <th>{{ trans('Company') }}</th>
                        <th>{{ trans('Email') }}</th>
                        <th>{{ trans('Phone') }}</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>
                                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>



@endsection