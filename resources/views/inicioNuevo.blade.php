<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Laravel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid" > 
           <h1>Estudiantes Api</h1> 
           <div class="card">
               <div class="card-header">
                   <a href="{{ route('api.guardarc') }}" class="btn btn-primary">Nuevo estudiante</a><br><br>
                 <!--   <form action="{{ route('pag.index') }}" class="form-inline">
                   <input type="search" name="cedula" placeholder="cedula" >
                    <input type="submit" name="accion" value="Buscar" >
                   </form> -->
               </div>
               <div class="card-body">
                   <table class="table table-hover">
                       <thead>
                           <tr>
                               <th>Cedula</th>
                               <th>Nombre</th>
                               <th>Apellido</th>
                               <th>Telefono</th>
                               <th>Direccion</th>
                           </tr>
                       </thead>
                       <tbody>

                          <?php foreach($data as $est){
                            
                            $cedula=$est['est_cedula'] ;
                            $nombre=$est['est_nombre'];
                            $apellido =$est['est_apellido'] ;
                            $telefono =$est['est_telefono'] ;
                            $direccion =$est['est_direccion'] ;
                            ?>
                           <tr>
                               <td><?php echo $est['est_cedula']   ?></td>
                               <td><?php echo $est['est_nombre']  ?></td>
                               <td><?php echo $est['est_apellido'] ?></td>
                               <td><?php echo $est['est_telefono'] ?></td>
                               <td><?php echo $est['est_direccion'] ?></td>
                               <td>
                                   <a href="{{ route('pag.update',[ $cedula, $nombre,$apellido,$telefono,$direccion ] ) }}" class="btn btn-warning">Editar</a>
                                   <a href="{{ route('pag.delete',  $est['est_cedula']) }}" class="btn btn-danger">Eliminar</a>
                                  <a href="{{ route('api.editarup',[  $cedula, $nombre,$apellido,$telefono,$direccion  ] ) }}" class="btn btn-warning">EditarAPI</a>
                                 <form action="{{ route('api.delete', ['est_cedula'=> $cedula ]) }}"     method="post">
                                      @csrf
                                      @method('delete')
                                     <a> <button type="submit" class="btn btn-danger">EliminarApi</button>
                                 </form>
                               </td>
                           </tr>
                           <?php
                          }
                           ?>
                       </tbody>
                   </table>
               </div>
           </div>
        </div>
       
    </body>
</html>