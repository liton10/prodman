<div style="text-align: center;">
	<ul>
	@if(!Request::is('add'))
		<li><a href="{{ URL::to('add') }}">Add product</a></li>
	@endif

	@if(!Request::is('/'))
		<li><a href="/"> View products</a></li>
	@endif
	</ul>
</div>
