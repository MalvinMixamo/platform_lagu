<?php

namespace App;

enum Role: string
{
    case GUEST = 'guest';
    case USER = 'user';
    case ARTIS = 'artis';
    case ADMIN = 'admin';
}
