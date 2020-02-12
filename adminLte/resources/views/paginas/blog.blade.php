@extends('plantilla')

@section('content')

<div class="content-wrapper" style="min-height: 247px;">

  <section class="content-header">

    <div class="container-fluid">

      <div class="row mb-2">

        <div class="col-sm-6">

          <h1>Blog</h1>

        </div>

        <div class="col-sm-6">

          <ol class="breadcrumb float-sm-right">

            <li class="breadcrumb-item"><a href="{{url('/')}}">Inicio</a></li>

            <li class="breadcrumb-item active">Blog</li>

          </ol>

        </div>

      </div>

    </div><!-- /.container-fluid -->

  </section>

  <!-- Main content -->
  <section class="content">

    <div class="container-fluid">

      <div class="row">

        <div class="col-12">
         @foreach ($blog as $element)
                   
         @endforeach 
        <form action="{{url('/')}}/blog/{{$element->id}}" method="POST">
          
          @method('PUT')<!--para actulaizar datos se usa el metodo PUT-->

          @csrf <!--generea un input oculo con un token de segurodda para evitrra pueden modificar la url-->
          <!-- Default box -->
          <div class="card">

            <div class="card-header">

              <button type="submit" class="btn btn-primary float-right">Guardar Cambios</button>

            </div>

            <div class="card-body">

                

                <div class="row">
                  <div class="col-lg-6">
                    <div class="card">  
                      <div class="card-body">
                        

                        <div class="input-group md-3">
                          <div class="input-group-append">
                            <span class="input-group-text">Dominios</span>
                          </div>
                          <input type="text" name="dominio" id="dominio" class="form-control" value="{{$element['dominio']}}" required>

                        </div><br>
                        <div class="input-group md-3">
                          <div class="input-group-append">
                            <span class="input-group-text">Servidor</span>
                          </div>
                          <input type="text" name="servidor" id="servidor" class="form-control" value="{{$element['servidor']}}" required>

                        </div><br>
                        <div class="input-group md-3">
                          <div class="input-group-append">
                            <span class="input-group-text">Titulo</span>
                          </div>
                          <input type="text" name="titulo" id="titulo" class="form-control" value="{{$element['titulo']}}" required>

                        </div><br>
                        <div class="input-group md-3">
                          <div class="input-group-append">
                            <span class="input-group-text">Descripcion</span>
                          </div>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="3" required class="form-control">{{$element['descripcion']}}</textarea>
                        </div>

                      <hr class="pb-2">
                      <label>KeyWords</label>
                      <div class="form-group mb-3">

                        @php
                          
                          $tags=json_decode($element->palabras_claves,true);
                          $palabras_claves="";
                          foreach ($tags as $key => $value) {
                            $palabras_claves.=$value.",";
                          }
                          
                        @endphp

                        <input type="text" name="keyword" id="keyword" class="form-control" data-role="tagsinput" required value="{{$palabras_claves}}">

                        <hr class="pb-2">
                        <label>Redes Sociales</label>
                        <div class="row">
                            <div class="col-4">
                              <div class="input-group md-3">
                                <div class="input-group-append">
                                <span class="input-group-text">Icono</span>
                              </div>

                              <select name="icono_red" id="icono_red" class="form-control">
                                 <option value="fab fa-facebook-f, #1475E0">Facebook</option>
                                 <option value="fab fa-instagram, #B18768">Instagram</option>
                                 <option value="fab fa-twitter, #00A6FF">twitter</option>
                                 <option value="fab fa-youtube, #F95F62">youtube</option>
                                 <option value="fab fa-snapchat-ghost, #FF9052">snapchat</option>
                              </select>
                              </div>
                              

                            </div>
                            <div class="col-5">
                              <div class="input-group md-3">
                                <div class="input-group-append">
                                  <span class="input-group-text">Url</span>
                                </div>
                              <input type="text" name="url_red" id="url_red" class="form-control" value="{{$element['url']}}">

                              </div>

                            </div>
                            <div class="col-3">
                              <button type="button" class="btn btn-primary w-100 agregarRed">Agregar</button>

                            </div>

                        </div>
                        <hr class="pb-2">
                        <div class="row listadoRed" >
                          
                        @php
                          echo "<input type='hidden' name='redes_sociales' value='".$element->redes_sociales."' id='listaRed'>";
                          $redes=json_decode($element->redes_sociales,true);
                          foreach ($redes as $key => $value) {
                            echo '<div class="col-lg-12">
                                    <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text text-white" style="background:'.$value["background"].'">
                                              <i class="'.$value["icono"].'"></i>
                                        </div>

                                      </div>
                                      <input type="text" class="form-control" value="'.$value["url"].'">
                                      <div class="input-group-prepend">
                                        <div class="input-group-text" style="cursor:pointer">
                                              <span class="bg-danger px-2 rounded-circle eliminarRed" red="'.$value['icono'].'" url="'.$value['url'].'">&times;</span>
                                        </div>

                                      </div>
                                    </div>
                                  </div>' ;
                          }
                          
                           

                          
                            
                        @endphp  
                          

                        </div>
                      </div>



                    </div>
                      

                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="card">  
                      <div class="card-body">
                           <div class="row">
                             <div class="col-lg-12">
                               <div class="form-group my-2 text-center">
                                 <div class="btn btn-default btn-file my-3">
                                  <i class="fas fa-paperclip"></i>Adjuntar imagen de Logo
                                  <input type="file" name="logo" id="logo">
                                 </div>
                                 <br>
                                <img src="{{url('/')}}/{{$element->logo}}" class="img-fluid py-2 btn-secondary previsualizarImg_logo">
                                <p class="help-block small mt-3">Dimensiones : 700px * 200px | Peso Maximo 1mb | Formato JPG o PNG</p>
                              
                               </div>
                               <hr class="pb-2">
                               <div class="form-group my-2 text-center">
                                <div class="btn btn-default btn-file my-3">
                                 <i class="fas fa-paperclip"></i>Adjuntar imagen de Portada
                                 <input type="file" name="portada" id="portada">
                                </div>
                                <br>
                               <img src="{{url('/')}}/{{$element->portada}}" class="img-fluid py-2 btn-secondary previsualizarImg_portada">
                               <p class="help-block small mt-3">Dimensiones : 700px * 420px | Peso Maximo 1mb | Formato JPG o PNG</p>

                              </div>

                              <hr class="pb-2">
                               <div class="form-group my-2 text-center">
                                <div class="btn btn-default btn-file my-3">
                                 <i class="fas fa-paperclip"></i>Adjuntar imagen de icono
                                 <input type="file" name="icono" id="icono">
                                </div>
                                <br>
                               <img src="{{url('/')}}/{{$element->icono}}" class="img-fluid py-2 rounded-circle previsualizarImg_icono">
                               <p class="help-block small mt-3">Dimensiones : 150px * 150px | Peso Maximo 1mb | Formato JPG o PNG</p>

                              </div>

                             </div>

                           </div>
                      </div>

                    </div>
                     

                  </div>
                  <div class="col-lg-6">
                    <div class="card">  
                      <div class="card-body">
                        <label>Sobre mi<span class="small">(intro)</span></label>
                      <textarea class="form-control summernote" name="sobre_mi" id="sobre_mi" cols="30" rows="10">{{$element->sobre_mi}}</textarea>
                      </div>
                    </div>
                  </div> 
                  <div class="col-lg-6"> 
                    <div class="card">  
                      <div class="card-body">
                      <label>Sobre mi<span class="small">(intro)</span></label>
                      <textarea class="form-control summernote" name="sobre_mi_completo" id="sobre_mi_completo" cols="30" rows="10">{{$element->sobre_mi_completo}}</textarea>
                      </div>
                    </div> 
                  </div>  

                </div>

            </div>

            <!-- /.card-body -->
            <div class="card-footer">

              <button type="submit" class="btn btn-primary float-right">Guardar Cambios</button>

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </form>

        </div>

      </div>

    </div>

  </section>
  <!-- /.content -->
</div>

@if (Session::has("no-validacion"))

<script>
  
   notie.alert({

    type: 2,
    text: '¡Hay campos no válidos en el formulario!',
    time: 7

  })

</script>

@endif

@if (Session::has("no-validacion-imagen"))

<script>
  
   notie.alert({

    type: 2,
    text: '¡Alguna de las imágenes no tiene el formato correcto!',
    time: 7

  })

</script>

@endif

@if (Session::has("error"))

<script>
  
   notie.alert({

    type: 3,
    text: '¡Error en el gestor de blog!',
    time: 7

  })

</script>

@endif

@if (Session::has("ok-editar"))

<script>
  
   notie.alert({

    type: 1,
    text: '¡El blog ha sido actualizado correctamente!',
    time: 7

  })

</script>

@endif

@endsection