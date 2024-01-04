<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>larave</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container"> 
           <div class="card">
               <div class="card-header">
                   <h3>Editar EstudianteAPI</h3>
               </div>
               <div class="card-body">
                   <form action="{{ route('api.editar',  $cedula) }}" method="POST">
                          @csrf
                          @method('put')
                       <label>Cedula</label>
                       <input type="text" name="est_cedula" class="form-control" placeholder="cedula" value= <?php echo($cedula) ?>>
                       <label>Nombre</label>
                       <input type="text" name="est_nombre" class="form-control" placeholder="nombre" value= <?php echo($nombre) ?>>
                       <label>Apellido</label>
                       <input type="text" name="est_apellido" class="form-control" placeholder="apellido" value= <?php echo($apellido) ?>>
                       <label>Telefono</label>
                       <input type="text" name="est_telefono" class="form-control" placeholder="telefono" value= <?php echo($telefono) ?>>
                       <label>Direccion</label>
                       <input type="text" name="est_direccion" class="form-control" placeholder="direccion" value= <?php echo($direccion) ?>>
                       
                       <input type="submit" name="accion" value="Guardar" class="btn btn-primary mt-4" >
                   </form>
               </div>
           </div>
        </div>
    </body>
</html>