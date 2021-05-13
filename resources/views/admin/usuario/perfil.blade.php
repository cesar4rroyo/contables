<!-- Content Header (Page header) -->
<div class="container" id="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-bold">Cambio de contraseña</div>
                
                <div class="card-body">
                      <div class="row mt-2" >
						<div class="col-md-12">
						  <div class="card">
							<div class="card-header">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="info-box">
                                            <span class="info-box-icon bg-yellow"><i class="fa fa-user-alt"></i></span>
                                            <div class="info-box-content">
                                                <span class="info-box-number"> <i class="fas fa-at"></i> {{$modelo->login}}</span>
                                                <span class="info-box-number"> <i class="fas fa-user-circle"></i> {{($modelo->personal) ? ($modelo->personal->apellidopaterno . ' ' . $modelo->personal->apellidomaterno . ' ' . $modelo->personal->nombres) : '-'}}</span>
                                                <span class="info-box-number"> <i class="fas fa-suitcase"></i> {{$modelo->personal->cargo->descripcion}}</span>
                                                <span class="info-box-number"> <i class="fas fa-file-alt"></i> {{$modelo->personal->area->descripcion}}</span>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6-col-md-6 col-sm-6">
                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger">
                                            <p>{{ $message }}</p>
                                        </div>
                                        @endif
                                        <form method="POST" action="{{route('usuario.cambiarpassword', $modelo->id)}}">                                          
                                            @csrf
                                            <div class="form-group">
                                                {!! Form::label('password', 'Contraseña Nueva:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    {!! Form::password('password', array('class' => 'form-control x-s', 'id' => 'password', 'placeholder' => 'Ingrese la contraseña', 'required'=>'true')) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                {!! Form::label('password2', 'Confirmar contraseña:', array('class' => 'col-lg-12 col-md-12 col-sm-12 control-label')) !!}
                                                <div class="col-lg-12 col-md-12 col-sm-12">
                                                    {!! Form::password('password2', array('class' => 'form-control x-s', 'id' => 'password2', 'placeholder' => 'Confirme la contraseña', 'required'=>'true')) !!}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                                    <a class="btn btn-primary" href="{{route('dashboard')}}">
                                                        Regresar
                                                    </a>
                                                        <button type="submit" class="btn btn-success">Actualizar contraseña</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div> 
                                </div>                               
							</div>							
							<!-- /.card-body -->
						  </div>
						  <!-- /.card -->
						</div>
					  </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--  --}}