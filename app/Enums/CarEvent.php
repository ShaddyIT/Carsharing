<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class CarEvent extends Enum
{
    const Motion = 0;
    const StopMotion = 1;
    const TakingOnALease = 2;
    const LeasingOut = 3;
    const Status = 4;
}

