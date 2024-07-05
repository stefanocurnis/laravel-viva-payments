<?php

namespace Sebdesign\VivaPayments\Responses;

use Spatie\LaravelData\Data;

class WebhookVerificationKey extends Data
{
    public function __construct(public readonly string $Key) {}
}
