@extends('layouts.main')

@section('content')
<div style="border-bottom: 1px solid gray;"></div>
<div>
	<h3><?php echo $staticpage->title;?></h3>
</div>
<div>
	<?php echo $staticpage->long_description;?>
</div>
@endsection
