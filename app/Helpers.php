<?php

namespace App;

use App\Models\Frete;
use Illuminate\Support\Str;

class Helpers
{
    public static function geraCodigoRastreio(): string
    {
        do {
            $codigo = Str::upper(Str::random(8));

            $existe = Frete::where('codigo_rastreio', $codigo)->exists();
        } while ($existe);

        return $codigo;
    }
}