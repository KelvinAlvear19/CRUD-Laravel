<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>larave</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <img src="{{ asset('/images/header.png') }}" alt="Header Image" style="width:100%;height:160px;" >
          </header>
        <div class="container"> 
            @if (session('errores'))
            <div class="alert alert-danger">
            {{ session('errores') }}
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
           <div class="card">
               <div class="card-header">
                   <h3>Editar Estudiante</h3>
               </div>
               <div class="card-body">
                   <form action="{{route('pag.updateService')}}" method="POST">
                    @csrf
                       <label>Cedula</label>
                       <input type="number" name="cedula" class="form-control" placeholder="cedula" value= <?php echo($cedula) ?> readonly>
                       <label>Nombre</label>
                       <input type="text" name="nombre" class="form-control" placeholder="nombre"  value= <?php echo($nombre) ?>>
                       <label>Apellido</label>
                       <input type="text" name="apellido" class="form-control" placeholder="apellido" value= <?php echo($apellido) ?>>
                       <label>Telefono</label>
                       <input type="number" name="telefono" class="form-control"  placeholder="telefono" value= <?php echo($telefono) ?>>
                       <label>Direccion</label>
                       <input type="text" name="direccion" class="form-control" placeholder="direccion"  value= <?php echo($direccion) ?>>
                       
                       <input type="submit" name="accion" value="Guardar" class="btn btn-primary mt-4" value= <?php echo($cedula) ?>>
                   </form>
               </div>
           </div>
        </div>
    </body>
</html>