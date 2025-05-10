<?php

namespace App\Enums;

enum FreteStatus: string
{
    case EM_TRANSITO = 'Em trânsito';
    case SAIU_ENTREGA = 'Saiu para entrega';
    case ENTREGUE = 'Entregue';

    public function pegarCorEtiqueta(): string
    {
        return match ($this) {
            self::EM_TRANSITO => 'bg-yellow-100 text-yellow-800',
            self::SAIU_ENTREGA => 'bg-blue-100 text-blue-800',
            self::ENTREGUE => 'bg-green-100 text-green-800',
        };
    }

    public static function fromName(string $name): ?self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }

        return null;
    }
}