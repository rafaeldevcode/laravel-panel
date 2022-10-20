<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class UserStatus extends Enum
{
    public const on  = 'on';
    public const off = 'off';

    /**
     * @param status $status
     * @return string|null
     */
    public static function getMessage(string|null $status): string
    {
        return match($status){
            self::on  => 'Ativo',
            self::off => 'Inativo',
            default   => 'Inativo'
        };
    }

    /**
     * @param status $status
     * @return string|null
     */
    public static function getColor(string|null $status): string
    {
        return match($status){
            self::on  => 'primary',
            self::off => 'danger',
            default   => 'danger'
        };
    }
}
