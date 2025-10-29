<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CpfValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Extract only numbers from the CPF
        $cpf = preg_replace('/[^0-9]/is', '', $value);
        
        // Check if all digits are identical, e.g., "111.111.111-11"
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            $fail('O :attribute é inválido.');
            return;
        }

        // Validate first digit
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                $fail('O :attribute é inválido.');
                return;
            }
        }
    }
}
