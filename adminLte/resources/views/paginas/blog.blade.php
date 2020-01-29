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
          <!-- Default box -->
          <div class="card">

            <div class="card-header">

              <h3 class="card-title">Title</h3>

              <div class="card-tools">

                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fas fa-times"></i></button>

              </div>

            </div>

            <div class="card-body">

                

            </div>

            <!-- /.card-body -->
            <div class="card-footer">

              Footer

            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
         

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