@extends('layouts.master')

@section('content')
    <h1>Company List</h1>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('companies.create') }}"> Add new Company</a>
        </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default table-responsive">
                {{--<div class="panel-heading">--}}
                    {{--{{ Form::open(['method' => 'get','class' => 'form-inline']) }}--}}
                    {{--{!! FormField::text('q', ['value' => request('q'), 'label' => trans('company.search'), 'class' => 'input-sm']) !!}--}}
                    {{--{{ Form::submit(trans('company.search'), ['class' => 'btn btn-sm']) }}--}}
                    {{--{{ link_to_route('companies.index', trans('app.reset')) }}--}}
                    {{--{{ Form::close() }}--}}
                {{--</div>--}}
                <table class="table table-condensed">
                    <tr>
                        <th class="text-center">{{ trans('No.') }}</th>
                        <th>{{ trans('Name') }}</th>
                        <th>{{ trans('Email') }}</th>
                        <th>{{ trans('Website') }}</th>
                        <th width="280px">Action</th>
                    </tr>
                    @foreach ($companies as $comp)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $comp->name }}</td>
                            <td>{{ $comp->email }}</td>
                            <td>{{ $comp->website }}</td>
                            <td>
                                <form action="{{ route('companies.destroy',$comp->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('companies.show',$comp->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('companies.edit',$comp->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>



@endsection