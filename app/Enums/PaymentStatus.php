<?php

namespace App\Enums;

enum PaymentStatus: string {
    case Pending = 'Pending';
    case Success = 'Success';
}