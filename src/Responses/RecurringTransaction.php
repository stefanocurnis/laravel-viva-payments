<?php

namespace Sebdesign\VivaPayments\Responses;

use Sebdesign\VivaPayments\Enums\TransactionStatus;
use Sebdesign\VivaPayments\Enums\TransactionType;
use Spatie\LaravelData\Data;

class RecurringTransaction extends Data
{
    public function __construct(
        public readonly ?string $Emv,
        public readonly float $Amount,
        public readonly TransactionStatus $StatusId,
        public readonly TransactionType $TransactionTypeId,
        public readonly ?string $RedirectUrl,
        public readonly string $CurrencyCode,
        public readonly string $TransactionId,
        public readonly int $ReferenceNumber,
        public readonly string $AuthorizationId,
        public readonly string $RetrievalReferenceNumber,
        public readonly ?string $Loyalty,
        public readonly int $ThreeDSecureStatusId,
        public readonly int $ErrorCode,
        public readonly ?string $ErrorText,
        public readonly string $TimeStamp,
        public readonly ?string $CorrelationId,
        public readonly int $EventId,
        public readonly bool $Success,
        public readonly ?string $IssuerMessage = null,
        public readonly mixed $IssuerMessageControl = null,
        public readonly mixed $Ctap = null,
        public readonly ?string $CartesBancaires = null,
        public readonly mixed $ApplePosInfo = null,
        public readonly mixed $ServiceId = null,
    ) {}
}
