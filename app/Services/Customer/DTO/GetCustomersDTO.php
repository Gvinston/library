<?php

namespace App\Services\Customer\DTO;


use Illuminate\Http\Request;
use Spatie\DataTransferObject\DataTransferObject;

class GetCustomersDTO extends DataTransferObject
{
    public ?array $customer_ids;
    public ?array $years;
    public ?string $author;

    public static function fromRequest(Request $request)
    {
        return new static(
            [
                'customer_ids' => array_diff(explode(',', $request->get('customer_ids')), ['']),
                'years' => array_diff(explode(',', $request->get('year')), ['']),
                'author' => $request->get('author'),
            ]
        );
    }
}
