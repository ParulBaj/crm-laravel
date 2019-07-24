@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">{{ trans('Company Detail') }}</h3></div>
                @if ($company->logo && is_file(public_path('storage/'.$company->logo)))
                    <div class="panel-body">
                        {{ Html::image('storage/'.$company->logo, $company->name, ['style' => 'width:100%']) }}
                    </div>
                @endif
                <table class="table table-condensed">
                    <tbody>
                    <tr>
                        <td class="col-xs-4">{{ trans('Company Name') }}</td>
                        <td>{{ $company->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('Company Email') }}</td>
                        <td>{{ $company->email }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('Company Website') }}</td>
                        <td>{{ $company->website }}</td>
                    </tr>
                    {{--<tr>--}}
                        {{--<td>{{ trans('company.address') }}</td>--}}
                        {{--<td>{{ $company->address }}</td>--}}
                    {{--</tr>--}}
                    </tbody>
                </table>
                <div class="panel-footer">
                    <a class="btn btn-warning"  href="{{ route('companies.edit', $company->id) }}"> Edit</a>
                    {{--@can('update', $company)--}}
                        {{--{{ link_to_route('companies.edit', trans('company.edit'), [$company], ['class' => 'btn btn-warning', 'id' => 'edit-company-'.$company->id]) }}--}}
                    {{--@endcan--}}
                    {{ link_to_route('companies.index', trans('Back'), [], ['class' => 'btn btn-default']) }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(Request::has('action'))
                @include('employees.forms')
            @endif
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{--{{ Form::open(['method' => 'get','class' => 'form-inline pull-right']) }}--}}
                    {{--{!! FormField::text('q', ['value' => request('q'), 'label' => trans('employee.search'), 'class' => 'input-sm']) !!}--}}
                    {{--{{ Form::submit(trans('app.search'), ['class' => 'btn btn-sm']) }}--}}
                    {{--{{ link_to_route('companies.show', trans('app.reset'), [$company]) }}--}}
                    {{--{{ Form::close() }}--}}
                    <h3 class="panel-title" style="margin: 6px 0px;">{{ trans('Company employees') }}</h3>
                </div>
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th class="text-center">{{ trans('No') }}</th>
                        <th>{{ trans('Employee Name') }}</th>
                        <th>{{ trans('Employee Email') }}</th>
                        <th>{{ trans('Employee Phone') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $key => $employee)
                        <tr>
                            <td class="text-center">{{ $employees->firstItem() + $key }}</td>
                            <td>{{ $employee->first_name }} {{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="panel-body">{{ $employees->appends(Request::except('page'))->render() }}</div>
            </div>
        </div>
    </div>
@endsection