<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ConsumirController;
use  Illuminate\Support\Facades\Http;
use App\Rules\CedulaEcuador;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ConsumirController extends Controller
{
    public function index(){
        $response = Http::get('http://localhost/QUINTOSOA/models/select.php');
        $data = $response->json();
        return view('inicio',compact('data'));
    }

    public function search(Request $request){
        if($request->cedula===null){
            $response = Http::asForm()->post('http://localhost/QUINTOSOA/models/buscar.php',
        [
           'busqueda'  =>  '',
        ]);
        }else{
        $response = Http::asForm()->post('http://localhost/QUINTOSOA/models/buscar.php',
        [
           'busqueda'  =>  $request->cedula,
        ]);}

        $data = $response->json();
        return view('inicio',compact('data'));
    
    }

    public function create(){  // Paso 2 creo el retorno a la vista paso 3 creo la vista guardar.blade.php  csrf asegura que funcione el envio de los datos , y pa mostrar
        return view('guardar');
    }


    public function store(Request $request)
    {
        $telefono = $request->telefono;   
        $cedula = $request->cedula;
        $verificacion = $this->verificarCedulaEcuador($cedula);
        $errores = $this->verificarCamposVacios($request);
        Session::flash('form_data', $request->all());

        $error_message = '';
        if ($this->verificarCedula($cedula)) {
            $error_message .= 'La cédula ya existe en la base de datos. ';
        }

        if (!$verificacion) {
            $error_message .= 'Cédula inválida. ';
        }
        if (!is_numeric($cedula) || strlen((string) $cedula) != 10) {
            $error_message .= 'La Cedula debe tener 10 digitos. ';
        }
        if (!is_numeric($telefono) || strlen((string) $telefono) != 10) {
            $error_message .= 'El teléfono debe ser un número de 10 dígitos. ';
        }
        if (count($errores) > 0) {
            $error_message .= 'Los siguientes campos están vacíos: ' . implode(', ', $errores);
        }

        if (!empty($error_message)) {
            Session::flash('error', $error_message);
            return redirect()->back()->withInput(old());
        }

$response = Http::asForm()->post('http://localhost/QUINTOSOA/models/guardar.php', [
    'est_cedula'  =>  $request->cedula,
    'est_nombre' => $request->nombre,
    'est_apellido' => $request->apellido,
    'est_telefono' => $request->telefono,
    'est_direccion' => $request->direccion,
]);

if ($response->successful()) {
    Session::flash('success', 'Sus datos se han Ingresado Correctamente');
    return redirect()->route('pag.index');
} else {
    Session::flash('error', 'Ocurrió un error al guardar los datos');
    return redirect()->back()->withInput();
}
    }
    
    public function verificarCedula($cedula)
    {
        $response = Http::get('http://localhost/QUINTOSOA/models/verificar.php?est_cedula=' . $cedula);
        if ($response->successful()) {
            $result = json_decode($response->body(), true);
            if ($result === "Cedula existe") {
                return true;
            }
        }
        return false;
    }

        public function verificarCamposVacios($request)
        {
            $errores = [];
            if (!$request->cedula) {
                $errores[] = 'Cédula';
            }
            if (!$request->nombre) {
                $errores[] = 'Nombre';
            }
            if (!$request->apellido) {
                $errores[] = 'Apellido';
            }
            if (!$request->telefono) {
                $errores[] = 'Teléfono';
            }
            if (!$request->direccion) {
                $errores[] = 'Dirección';
            }
            return $errores;
        }
    
private function verificarCedulaEcuador($value)
{
    $suma = 0;
    $ced = strval($value);
    for ($i = 0; $i < strlen($ced) - 1; $i++) {
        $x = intval($ced[$i]);
        if ($i % 2 == 0) {
            $x = $x * 2;
            if ($x > 9) {
                $x = $x - 9;
            }
        }
        $suma += $x;
    }
    if ($suma % 10 != 0) {
        $result = 10 - ($suma % 10);
        if (intval($ced[-1]) == $result) {
            return true;
        } else {
            return false;
        }
    } else {
        return true;
    }
}

    public function delete($cedula){
        $response = Http::asForm()->post('http://localhost/QUINTOSOA/models/eliminar.php',
        [
           'est_cedula'  =>  $cedula,
       ]);
       if ($response->successful()) {
        Session::flash('success', 'Se Elimino el dato de manera correcta');
        return redirect()->route('pag.index');
    }
    }

    public function createup($cedula,$nombre,$apellido,$telefono,$direccion){
        
        return view('editar',compact('cedula','nombre','apellido','telefono','direccion'));
    }

    public function update(Request $request) {
        try {
            Session::flash('form_data', $request->all());
            $telefono = $request->telefono;
            $errores = $this->verificarCamposVacios($request);
            $error_message = '';
            if (count($errores) > 0) {
                $error_message .= 'Los siguientes campos están vacíos: ' . implode(', ', $errores);
            }
            if (!is_numeric($telefono) || strlen((string) $telefono) != 10) {
                $error_message .= ', El teléfono debe ser un número de 10 dígitos. ';
            }
            if (!empty($error_message)) {
                Session::flash('error', $error_message);
                return redirect()->back()->withInput(['telefono' => $telefono]);
            }
            $response = Http::asForm()->post('http://localhost/QUINTOSOA/models/editar.php',
             [
                'est_cedula'  =>  $request->cedula,
                'est_nombre' => $request->nombre,
                'est_apellido' => $request->apellido,
                'est_telefono' => $request->telefono,
                'est_direccion' => $request->direccion,
            ]);
            if ($response->successful()) {
                Session::flash('success', 'Se Edito los datos de manera Correcta');
                return redirect()->route('pag.index');
            }
        } catch (\Exception $e) {
            // Escribir el error en un archivo de registro
            Log::error($e->getMessage());
    
            // Mostrar un mensaje de error al usuario
            Session::flash('error', 'Se produjo un error al editar los datos. Por favor, intente nuevamente.');
            return redirect()->back()->withInput(old());
        }
    }
}
