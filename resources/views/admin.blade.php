@extends('layouts.app')

<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('css/addRecord.css') }}">
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>



@section('content')
<figure class="snip0048 blue" style="float: left">
    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/pr-sample3.jpg" alt="sample1"/>
	<figcaption>
		<h2>Add Record</h2>
		<h5>here you can add new day's records</h5>
	</figcaption>
	<div class="icons">
		<a href="{{url('/addRecord')}}"><div style="width: 130px; height:60px; background-color:#A9A9A9; border-radius:10px; padding-top:10px">Add</div></a>
		
	</div>
</figure>
@if($caseTest)
	<figure class="snip0048 red hover">
		<img style="height: 600px" src="{{"images/img2.jpg"}}" alt="sample2"/>
		<figcaption>
			<h2><span style="font-size: 0.9em">Update record</span></h2>
			<h5>here u can update a day's record</h5>
		</figcaption>
		<div class="icons">
			<a href="{{url('/updateRecord')}}"><div style="width: 130px; height:60px; background-color:#A9A9A9; border-radius:10px; padding-top:10px">Update</div></a>
		</div>
	</figure>
@endif


<script>
/* Demo purposes only */	
$("figure").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);
</script>

@endsection