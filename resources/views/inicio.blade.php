<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Laravel</title>
        
       
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}">
        <script src="{{ asset('/bootstrap/js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('/bootstrap/js/bootstrap.min.js') }}"></script>
        

        

    </head>
    <body>
        <header>
            <img src="{{ asset('/images/header.png') }}" alt="Header Image" style="width:100%;height:160px;" >
          </header>
        <div class="container">

            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
             @endif
           <h1>Estudiantes</h1> 
           <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
            <a href="{{ route('pag.guardar') }}" class="btn btn-outline-success">Nuevo estudiante</a>
            <form action="{{ route('pag.search') }}" class="form-inline my-3 my-lg-0" id="searchForm">
              <input type="search" id="cedula" name="cedula" placeholder="cedula" class="form-control mr-sm-2">
              <input type="submit" name="accion" value="Buscar" class="btn btn-outline-success my-2 my-sm-0">
            </form>
          </nav>
          
              
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
                            $cedula = $est['est_cedula'] ;
                            $nombre =$est['est_nombre'] ;
                            $apellido =$est['est_apellido'] ;
                            $telefono =$est['est_telefono'] ;
                            $direccion =$est['est_direccion'] ;
                            ?>

                           <tr>
                               <td><?php echo $est['est_cedula'] ?></td>
                               <td><?php echo $est['est_nombre'] ?></td>
                               <td><?php echo $est['est_apellido'] ?></td>
                               <td><?php echo $est['est_telefono'] ?></td>
                               <td><?php echo $est['est_direccion'] ?></td>
                               <td>
                                   <a href="{{ route('pag.update', [$cedula,$nombre,$apellido,$telefono,$direccion]) }}" class="btn btn-warning">Editar</a>
                                   <a href="#" class="btn btn-danger" onclick="if(confirm('¿Está seguro de que desea eliminar este estudiante?')){window.location.href='{{ route('pag.delete', $est['est_cedula']) }}'}">Eliminar</a>
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