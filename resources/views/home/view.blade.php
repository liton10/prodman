@extends('layouts.default')
@section('title',ucfirst(trans('app.create'))." ".ucfirst(trans('entities.user')))

@section('content')
@include('layouts.messages')
@include('layouts.menu')
    <div class="form-group">
        <table class="table">
            <tr>
                <td width="40%" align="right"><label>Image</label></td>
                <td width="30"><img src="{{ asset('/'.$product->file_path) }}" width="300px;"></td>
            </tr>
            <tr>
                <td width="40%" align="right"><label>Name</label></td>
                <td width="30"><td width="30">{{ $product->name }}</td></td>
                <td width="30%" align="left"></td>
            </tr>
            <tr>
                <td width="40%" align="right"><label>Description</label><td width="30">{{ $product->description }}</td>
                <td width="30%" align="left"></td>
            </tr>
            <tr>
                <td width="40%" align="right"><label>Price ($)</label><span style="color: red">*</span></td>
                <td width="30">{{ $product->price }}</td>
                <td width="30%" align="left"></td>
            </tr>
    </div>
</form>
@endsection
