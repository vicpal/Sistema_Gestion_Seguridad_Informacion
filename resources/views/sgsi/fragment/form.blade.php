
<div class=form-group>
	{!! Form::label('numero_dom', 'Numero del Dominio') !!}
	{!! Form::text('numero_dom', null, ['class' => 'form-control']) !!}
</div>

<div class=form-group>
	{!! Form::label('nombre_dom', 'Nombre del Dominio') !!}
	{!! Form::text('nombre_dom', null, ['class' => 'form-control']) !!}
</div>

<div class=form-group>
	{!! Form::submit('ENVIAR', ['class' => 'btn btn-primary']) !!}
</div>