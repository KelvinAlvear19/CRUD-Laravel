<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>larave</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
       
        <div class="container"> 
            <header>
                <img src="{{ asset('/images/header.png') }}" alt="Header Image" style="width:100%;height:160px;" >
              </header>
           <div class="card">
               <div class="card-header">
                   <h3>Agregar Estudiante</h3>
               </div>
               @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                @endif
                @if(Session::has('error_cedula'))
                    <div class="alert alert-danger">
                        {{Session::get('error_cedula')}}
                    </div>
                @endif
                @if(Session::has('error_vacios'))
                    <div class="alert alert-danger">
                        {{Session::get('error_vacios')}}
                    </div>
                @endif
                    
                   <form action="{{ route('pag.store') }}" method="POST">
                    @csrf 
                       <label>Cedula</label>
                       <input type="number" class="form-control" placeholder="Cedula" name="cedula" value="{{ old('cedula') ?? (Session::has('form_data') ? Session::get('form_data')['cedula'] : '') }}">

                       <label>Nombre</label>
                       <input type="text" class="form-control" placeholder="Nombre" name="nombre" value="{{ old('nombre') ?? (Session::has('form_data') ? Session::get('form_data')['nombre'] : '') }}">
                       <label>Apellido</label>
                       <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="{{ old('apellido') ?? (Session::has('form_data') ? Session::get('form_data')['apellido'] : '') }}">
                       <label>Telefono</label>
                       <input type="number" class="form-control" placeholder="Telefono" name="telefono" value="{{ old('telefono') ?? (Session::has('form_data') ? Session::get('form_data')['telefono'] : '') }}">
                       <label>Direccion</label>
                       <input type="text" class="form-control" placeholder="Direccion" name="direccion" value="{{ old('direccion') ?? (Session::has('form_data') ? Session::get('form_data')['direccion'] : '') }}">
                       
                       <input type="submit" name="accion" value="Guardar" class="btn btn-primary mt-4" >
                   </form>
               </div>
           </div>
        </div>
    </body>
</html>