@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ trans('Employee Detail') }}</h3></div>
                <table class="table table-condensed">
                    <tbody>
                    <tr>
                        <td class="col-xs-4">{{ trans('Employee Name') }}</td>
                        <td>{{ $employee->first_name}} {{ $employee->last_name}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('Employee Email') }}</td>
                        <td>{{ $employee->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('Company') }}</td>
                        <td>{{ $employee->company->name}}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('Employee Phone') }}</td>
                        <td>{{ $employee->phone }}</td>
                    </tr>
                    </tbody>
                </table>
                <div class="panel-footer">
                    <a class="btn btn-warning"  href="{{ route('employees.edit', $employee->id) }}"> Edit</a>
                    {{ link_to_route('employees.index', trans('Back'), [], ['class' => 'btn btn-default']) }}
                </div>
            </div>
        </div>
    </div>
@endsection