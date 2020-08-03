@extends('myprofile')
@section('title')
My Dashboard
@stop
@section('contents')
@auth
<div class="alert alert-primary">
<h3>Your Referral link is</h3><br>  
<span> {{ url('/') . '/?ref=' . Auth::user()->id }} </span>
 </div>
@endauth
		<refaral></refaral>
@endsection