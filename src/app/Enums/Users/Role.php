<?php

namespace App\Enums\Users;

enum Role: string
{

    case ADMIN = 'admin';

    case USER = 'user';

    case MANAGER = 'manager';

}
