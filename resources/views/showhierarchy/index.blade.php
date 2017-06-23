@extends('partials.master')

@section('content')


  @for($i=0; $i < count($teamManagerDetails[0]);$i++)
  <div class="card">
	  <div class="card-block">
		  <ul>
		  		<li> Manager Id : {{$teamManagerDetails[0][$i]['id']}} &nbsp; Manager Name : {{$teamManagerDetails[0][$i]['name']}} &nbsp; Total Employees : {{$totalCount[$i]}} </li>
		   </ul>
	  </div>
  </div>
  @endfor
@endsection

