<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CarStatus extends Enum
{
    const Free = 0;
    const OnRent = 1;
    const Remont = 2;
}
