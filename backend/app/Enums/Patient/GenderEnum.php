<?php

namespace App\Enums\Patient;

/**
 * Enum - Gernero do paciente
 */
enum GenderEnum: string
{
    case MALE = 'male';
    case FEMALE = 'female';
    
    /**
     * @return array
     */
    public static function labels(): array
    {
        return [
            self::MALE->value => self::getLabel(self::MALE),
            self::FEMALE->value => self::getLabel(self::FEMALE),
        ];
    }

    /**
     * @param  GenderEnum    $gender
     * @return string
     */
    public static function getLabel(self $gender): string
    {
        return match ($gender) {
            self::MALE => 'Masculino',
            self::FEMALE => 'Feminino',
        };
    }
}
