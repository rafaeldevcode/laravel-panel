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
    public const DRAFT = 0;
    public const PENDING = 1;
    public const PUBLISHED = 2;

    /**
     * @since 1.0.0
     *
     * @return string
     */
    public static function name(int $value): string
    {
        return match($value){
            self::DRAFT => 'Rascunho',
            self::PENDING => 'Pendente',
            self::PUBLISHED => 'Publicado',
        };
    }

    /**
     * @since 1.0.0
     *
     * @return string
     */
    public static function color(int $value): string
    {
        return match($value){
            self::DRAFT => 'secondary',
            self::PENDING => 'primary',
            self::PUBLISHED => 'success',
        };
    }

    /**
     * @since 1.0.0
     *
     * @return array
     */
    public static function asSelectArray(): array
    {
        return [
            self::DRAFT => 'Rascunho',
            self::PENDING => 'Pendente',
            self::PUBLISHED => 'Publicado',
        ];
    }
}
