<?php

namespace App;


enum InvoiceStatus: string
{
    case UNPAID = 'unpaid';
    case PAID = 'paid';
    case CANCELLED = 'cancelled';

    /**
     * Get all status options as an array.
     */
    public static function options(): array
    {
        return [
            self::UNPAID->value => 'Unpaid',
            self::PAID->value => 'Paid',
            self::CANCELLED->value => 'Cancelled',
        ];
    }

}



