@extends('layouts.default')
@section('title',ucfirst(trans('app.create'))." ".ucfirst(trans('entities.user')))

@section('content')
<div class="col-sm-12">
    <table>
    @foreach($records as $record)
        <tr>
            <th>{{ trans('m2m.billing_code_type') }}</th>
            <td>{{ $bc->billing_code_type }}</td>
        </tr>
        @if($bc->billing_code_sub_type)
            <tr>
                <th>{{ trans('m2m.billing_code_sub_type') }}</th>
                <td>{{ $bc->billing_code_sub_type }}</td>
            </tr>
        @endif
        <tr>
            <th>{{ trans('m2m.billing_code') }}</th>
            <td>{{ $bc->billing_code_text }}</td>
        </tr>

        <tr>
            <th>{{ trans('m2m.task_code') }}</th>
            <td>{{ $bc->task_code_text }}</td>
        </tr>

        <tr>
            <th>{{ trans('m2m.billing_code_quantity') }}</th>
            <td>{{ $bc->billing_code_quantity }}</td>
        </tr>
    @endforeach
    </table>
</div>
@endsection
