<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class StatusEnum extends Enum
{
    public const ON  = 'on';
    public const OFF = 'off';

    /**
     * @param status $status
     * @return string|null
     */
    public static function name(string|null $status): string
    {
        return match($status){
            self::ON  => 'Ativo',
            self::OFF => 'Inativo',
            default   => 'Inativo'
        };
    }

    /**
     * @param status $status
     * @return string|null
     */
    public static function nameBoolean(string|null $status): string
    {
        return match($status){
            self::ON  => 'Sim',
            self::OFF => 'Não',
            default   => 'Não'
        };
    }

    /**
     * @param status $status
     * @return string|null
     */
    public static function color(string|null $status): string
    {
        return match($status){
            self::ON  => 'primary',
            self::OFF => 'danger',
            default   => 'danger'
        };
    }
}
