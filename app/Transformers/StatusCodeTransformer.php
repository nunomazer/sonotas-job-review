<?php


namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class StatusCodeTransformer extends TransformerAbstract
{

    const STATUS_200_OK = 200;
    const STATUS_201_CREATED = 201;
    const STATUS_400_BAD_REQUEST = 400;
    const STATUS_401_UNAUTHORIZED = 401;
    const STATUS_403_FORBIDDEN = 403;
    const STATUS_404_NOT_FOUND = 404;
    const STATUS_500_INTERNAL_SERVER_ERROR = 500;

    const STATUS_CODES = [
        self::STATUS_200_OK => 'OK',
        self::STATUS_201_CREATED => 'Created',
        self::STATUS_400_BAD_REQUEST => 'Bad Request',
        self::STATUS_401_UNAUTHORIZED => 'Unauthorized',
        self::STATUS_403_FORBIDDEN => 'Forbidden',
        self::STATUS_404_NOT_FOUND => 'Not Found',
        self::STATUS_500_INTERNAL_SERVER_ERROR => 'Internal Server Error',
    ];

    protected $defaultIncludes = [
    ];

    protected $availableIncludes = [
    ];

    public function transform($status)
    {
        $statusCode = $status;
        $customMessage = null;

        if (is_array($status)) {
            $statusCode = $status['code'];
            $customMessage = $status['message'];
        }

        if (key_exists($statusCode, self::STATUS_CODES)){
            $message = $customMessage ?? self::STATUS_CODES[$statusCode];
        } else {
            $message = 'Error Status Code not found';
        }

        return [
            'message' => $message,
        ];
    }

}
