<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-update-{{$key->id}}">
	{{Form::Open(array('action'=>array('UserController@update',$key->id),'method'=>'put'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
				aria-label="Close">
                     <span aria-hidden="true"></span>
                </button>
                <h4 class="modal-title">Editar usuario</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Actualizar el usuario <span>{{$key->name}}</span> </p>


      <div class="col-xs-12 col-sm-12 col-md-4">
          <div class="form-group">
      {!!form::label('name','Nombre:')  !!}
     {!!form::text('name',$key->name,['class'=>'form-control','placeholder'=>'digite nombre'])!!}

         </div>
      </div>


     <div class="col-xs-12 col-sm-12 col-md-4">
          <div class="form-group">
      {!!form::label('segundo_nombre','Segundo Nombre:')  !!}
     {!!form::text('segundo_nombre',$key->segundo_nombre,['class'=>'form-control','placeholder'=>'digite segundo nombre'])!!}

         </div>
      </div>

       <div class="col-xs-12 col-sm-12 col-md-4">
          <div class="form-group">
      {!!form::label('email','Email:')  !!}
     {!!form::text('email',$key->email,['class'=>'form-control','placeholder'=>'digite Email'])!!}

         </div>
      </div>

       
			<div class="col-lg-3 col-sm-3 col-md-4 col-xs-12">
				<div class="form-group">
					<label>Empleado </label>
					<select name="rol_id" id="rol_id" class="form-control">
					 
				     <option value="2">Regular</option>
				     <option value="1">Admin</option>
				     <option value="3">Inactivo</option>
					 
					</select>
				</div>
			</div>




				
			</div>

			<br><br>
			<br><br>
			<br><br>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>