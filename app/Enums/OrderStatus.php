<?php

namespace App\Enums;

enum OrderStatus: string {
    case PENDING = 'Pending';
    case REJECTED = 'Rejected';
    case APPROVED = 'Approved';
    case ON_PROCESS = 'On Process';
    case COMPLETED = 'Completed';
}
