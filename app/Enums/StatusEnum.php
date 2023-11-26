<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusEnum extends Enum
{
    public const ON  = 'on';

    public const OFF = 'off';

    public static function name(string|null $status): string
    {
        return match($status){
            self::ON  => 'Ativo',
            self::OFF => 'Inativo',
            default   => 'Inativo'
        };
    }

    public static function nameBoolean(string|null $status): string
    {
        return match($status){
            self::ON  => 'Sim',
            self::OFF => 'Não',
            default   => 'Não'
        };
    }

    public static function color(string|null $status): string
    {
        return match($status){
            self::ON  => 'primary',
            self::OFF => 'danger',
            default   => 'danger'
        };
    }
}
