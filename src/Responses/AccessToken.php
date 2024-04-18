<?php

namespace Sebdesign\VivaPayments\Responses;

use Spatie\LaravelData\Data;

class AccessToken extends Data
{
    public function __construct(
        public readonly string $access_token,
        public readonly int $expires_in,
        public readonly string $token_type,
        public readonly string $scope,
    ) {
    }
}
