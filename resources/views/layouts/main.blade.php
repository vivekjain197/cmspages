<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>
<body>
	<div>
		<ul style="float: left;">
			@foreach($dropdownpages as $dropdownpage)
				<ul>
					@if(count($dropdownpage->subpages))
						<li class="menu-item-has-children all-demos"><a itemprop="url" href="{{ $dropdownpage->slug }}" title="">{{$dropdownpage->title}}</a>
							@include('layouts.sub_pages',['subages' => $dropdownpage->subpages,'parent' => $dropdownpage->slug])
						</li>
					@else
						<li><a href="{{ $dropdownpage->slug }}">{{$dropdownpage->title}}</a></li>
					@endif
				</ul>
			@endforeach
		</ul>
	</div>
	<div style="clear: both;"></div>
@yield('content')

</body>