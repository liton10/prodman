@extends('layouts.default')
@section('title',ucfirst(trans('app.create'))." ".ucfirst(trans('entities.user')))

@section('content')
@include('layouts.messages')
@include('layouts.menu')
<script type="text/javascript">
$(document).ready(function(){

    $('.deleteProduct').on('click', function() {
        var params = { id:this.id};
        var confirmation = confirm("Are you sure you want to delete the product?");
        if (confirmation) {
            $('#response').html("<b>Deleting record...</b>");

            $.ajax({
                type: 'GET',
                url: '/delete/'+this.id
            })
            .done(function(data){
                if (data.status == 200) {
                    alert('Product deleted successfully!');
                    window.location.reload();
                } else {
                    alert('Failed deleting product!');
                }          
                                
            })
            .fail(function() {
                // just in case posting your form failed
                alert( "Deleteting failed." );
                 
            });
     
            // to prevent refreshing the whole page page
            return false;
        }

    });
});


</script>
<div id='response'></div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Picture</th>
      <th scope="col">
        @sortablelink('name')
      </th>
      <th scope="col">
        @sortablelink('price')

      </th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    
    @foreach($products as $product)
        <tr>
            <th><a href="{{ URL::to('view') }}/{{ $product->id }}"><img src="{{ asset('/'.$product->file_path) }}" height="60px;"></a></th>
            <td><a href="{{ URL::to('view') }}/{{ $product->id }}"> {{ $product->name }} </a></td>
            <td>{{ $product->price }}</td>
            <td><a href="{{ URL::to('edit') }}/{{ $product->id }}"><button type="button" class="editProduct">Edit</button></a> | <button type="button" id="{{ $product->id }}" class="deleteProduct">Delete</button>

            </td>
        </tr>
    @endforeach
    
  </tbody>
</table>
{{ $products->appends(request()->except('page'))->links() }}
@endsection
