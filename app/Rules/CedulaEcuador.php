<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CedulaEcuador implements Rule
{


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cedula_1 = substr($value, 0, 9);
        $cedula_verificacion = (int) substr($value, -1);
        $pares_digitos = [];
        $impares_digitos = [];

        for ($i = 0; $i < strlen($cedula_1); $i++) {
            $caracter = ((int) $cedula_1[$i]);
            if ($i % 2 == 0) {
                $caracter = $caracter * 2;
                if ($caracter > 9) {
                    $caracter = $caracter - 9;
                }
                $pares_digitos[] = $caracter;
            }
            if ($i % 2 == 1) {
                $impares_digitos[] = $caracter;
            }
        }
        $suma_digitos = (array_sum($pares_digitos) + array_sum($impares_digitos));
        $verificacion = ((int) ((($suma_digitos / 10) + 1) * 10 - $suma_digitos));

        return $verificacion == $cedula_verificacion;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
