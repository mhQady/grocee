<?php

namespace App\Enums\Product;

use App\Enums\BaseEnum;

enum ProductStatusEnum: int
{
    use BaseEnum;
    case PUBlISHED = 1;
    case DRAFTED = 2;
}
