@extends ('layouts.admin')

@section ('contenido')


  <div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
		<h3>Carga masiva de Usuarios <a href="{{Route('usuarios.create')}}"><button class="btn btn-success glyphicon glyphicon-plus "></button></a></h3>
	</div>
  <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
	<h3>Crear Usuario<a href="#myModal" role="button"  data-toggle="modal"> <button  class="btn-warning  lyphicon glyphicon-plus"></button></a></h3>
	</div>  

<!--Comienso modal-->    
 <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Crear Nuevo usuario</h3>
      </div>

      <div class="modal-body">
          {!!Form::open(['url'=>'crear','method'=>'POS','class'=>'form-horizontal col-sm-12'])!!}
            {{Form::token()}}

          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
          <label>Nombres</label>
          <input class="form-control required" placeholder="nombre" data-placement="top" data-trigger="manual" type="text" name="name">
          
             @if ($errors->has('name'))
                     <span class="help-block">
                   <strong>{{ $errors->first('name') }}</strong>
                   </span>
                @endif	

          </div>

          <div class="form-group{{ $errors->has('segundo_nombre') ? ' has-error' : '' }} ">
          <label>Apellidos</label>
          <input class="form-control" placeholder="digite el apellido" data-placement="top" data-trigger="manual" type="text" name="segundo_nombre" ></input>
           
            @if ($errors->has('segundo_nombre'))
                     <span class="help-block">
                   <strong>{{ $errors->first('segundo_nombre') }}</strong>
                   </span>
                @endif

          </div>

          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
          <label>E-Mail</label>
          <input class="form-control email" placeholder="Email" data-placement="top" data-trigger="manual"  type="email" name="email" >

           @if ($errors->has('email'))
                     <span class="help-block">
                   <strong>{{ $errors->first('email') }}</strong>
                   </span>
                @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label>Contrasena</label>
          <input class="form-control email" placeholder="contrasena"   type="password" name="password">
         
          @if ($errors->has('password'))
                     <span class="help-block">
                   <strong>{{ $errors->first('password') }}</strong>
                   </span>
                @endif

          </div>

          <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
          <label>Confirmar contrasena</label>
          <input class="form-control email" placeholder="contrasena"   type="password" name="password_confirmation">
          
          @if ($errors->has('password_confirmation'))
                     <span class="help-block">
                   <strong>{{ $errors->first('password_confirmation') }}</strong>
                   </span>
                @endif

          </div>

     


          <div class="form-group"><label>Rol</label>
          	<label>Empleado </label>
					<select name="rol_id" id="rol_id" class="form-control">
					 
				     <option value="2">Regular</option>
				     <option value="1">Admin</option>
				     <option value="3">Inactivo</option>
					 
					</select>
          </div>

          <div class="form-group"><button type="submit" class="btn btn-success pull-right">guardar</button> <p class="help-block pull-left text-danger hide" id="form-error"></p></div>
        {!!Form::close()!!}
      </div>
      <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">cancelar</button>
      </div>
    </div>
  </div>
</div>


<!--fin modal-->
</div>
<hr>


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

        @foreach($user as $key)      
  			<tr class="info">
		            <td>{{$key->id}}</td>
		            <td>{{$key->name}}</td>
		            <td>{{$key->segundo_nombre}}</td> 
					<td>{{$key->email}}</td>
					<td>{{$key->Rol->nombre_rol}}</td>
					<td>
      	<a href="" data-target="#modal-update-{{$key->id}}" data-toggle="modal" ><button  class="btn-warning  glyphicon glyphicon-wrench"></button></a>
        @include('usuarios.modalEdit')      	
        <a href="" data-target="#modal-delete-{{$key->id}}" data-toggle="modal"><button class=" btn-danger glyphicon glyphicon-trash"></button></a>
					</td>
				</tr>
@include('usuarios.modal')

    @endforeach
    
  </table>

</div>







@endsection