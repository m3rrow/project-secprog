<?php

namespace App\Enums;

enum AccountStatus: string
{
    case Unverified  = 'unverified';
    case Pending   = 'pending';
    case Verified  = 'verified';
    case Suspended = 'suspended';
}