@extends('layouts.default')
@section('title',ucfirst(trans('app.create'))." ".ucfirst(trans('entities.user')))

@section('content')
@include('layouts.messages')
@include('layouts.menu')

<form method="post" action="{{ URL::to('add') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <table class="table">
            <tr>
                <td width="40%" align="right"><label>Select image for product (jpg, jpeg, png, gif)<span style="color: red">*</span></label></td>
                <td width="30"><input type="file" name="select_file" required="required"/></td>
            </tr>
            <tr>
                <td width="40%" align="right"><label>Name</label><span style="color: red">*</span></td>
                <td width="30"><input type="input" name="name" required="required" /></td>
                <td width="30%" align="left"></td>
            </tr>
            <tr>
                <td width="40%" align="right"><label>Description</label><span style="color: red">*</span></td>
                <td width="30"><input type="textarea" name="description" required="required" /></td>
                <td width="30%" align="left"></td>
            </tr>
            <tr>
                <td width="40%" align="right"><label>Price ($)</label><span style="color: red">*</span></td>
                <td width="30"><input type="number" name="price" required="required" /></td>
                <td width="30%" align="left"></td>
            </tr>
            <tr>
                <td width="40%" align="right"></td>
                <td width="30"></td>
                <td width="30%" align="left"><input type="submit" name="submit" class="btn btn-primary" value="Add Product"></td>
            </tr>
        </table>
    </div>
</form>
@endsection
