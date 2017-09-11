@extends ('layouts.admin')

@section ('contenido')



  @if(session()->has('info'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{session('info')}}</strong> 
		</div>
    @endif

   <br> 


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="eps_table" class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>codigo</th>
					<th>nombre</th>
					<th>Segundo Nombre</th>
					<th>Email</th>
					<th>Estado</th>
                    <th>Acciones</th>
				</thead>

        @foreach($equipo as $key)      
  			<tr class="info">
		            <td>{{$key->id}}</td>
		            <td>{{$key->id}}</td>
		            <td>{{$key->id}}</td> 
					<td>{{$key->id}}</td>
					<td>{{$key->id}}</td>
					<td>
      	<a href="" data-target="#modal-update-{{$key->id}}" data-toggle="modal" ><button  class="btn-warning  glyphicon glyphicon-wrench"></button></a>
        @include('usuarios.modalEdit')      	
        <a href="" data-target="#modal-delete-{{$key->id}}" data-toggle="modal"><button class=" btn-danger glyphicon glyphicon-trash"></button></a>
					</td>
				</tr>



    @endforeach
    
  </table>

</div>



 

@endsection 