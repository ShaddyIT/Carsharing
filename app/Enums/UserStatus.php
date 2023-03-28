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
    const Active = 0;
    const Deleted = 1;
    const Blocked = 2;
    const DocumentNotAutorize = 3;
}
