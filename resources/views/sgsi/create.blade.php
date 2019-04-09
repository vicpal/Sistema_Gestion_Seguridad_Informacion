@extends('layouts.layout')

@section('content')

	<div><h3>Crear</h3>
		{!! Form::open(['route' => 'dominios.store']) !!}
		@include('dominios.fragment.form')

		{!! Form::close !!}
	</div>

	<div>
		@include('dominios.fragment.aside')		
	</div>

@endsection