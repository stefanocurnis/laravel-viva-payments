<?php

namespace Sebdesign\VivaPayments\Events;

use Sebdesign\VivaPayments\Enums\TransactionStatus;
use Sebdesign\VivaPayments\Enums\TransactionType;

/** @see https://developer.vivawallet.com/webhooks-for-payments/transaction-failed/ */
class TransactionFailed
{
    public function __construct(
        public readonly bool $Moto,
        public readonly string $Email,
        public readonly ?string $Phone,
        public readonly string $BankId,
        public readonly bool $Systemic,
        public readonly bool $Switching,
        public readonly ?string $ParentId,
        public readonly float $Amount,
        public readonly string $ChannelId,
        public readonly int $TerminalId,
        public readonly string $MerchantId,
        public readonly string $OrderCode,
        public readonly ?string $ProductId,
        public readonly TransactionStatus $StatusId,
        public readonly string $FullName,
        public readonly ?string $ResellerId,
        public readonly string $InsDate,
        public readonly float $TotalFee,
        public readonly string $CardUniqueReference,
        public readonly string $CardToken,
        public readonly string $CardNumber,
        public readonly float $TipAmount,
        public readonly string $SourceCode,
        public readonly string $SourceName,
        public readonly ?float $Latitude,
        public readonly ?float $Longitude,
        public readonly ?string $CompanyName,
        public readonly string $TransactionId,
        public readonly ?string $CompanyTitle,
        public readonly string $PanEntryMode,
        public readonly int $ReferenceNumber,
        public readonly ?string $ResponseCode,
        public readonly string $CurrencyCode,
        public readonly string $OrderCulture,
        public readonly ?string $MerchantTrns,
        public readonly string $CustomerTrns,
        public readonly bool $IsManualRefund,
        public readonly ?string $TargetPersonId,
        public readonly ?string $TargetWalletId,
        public readonly bool $LoyaltyTriggered,
        public readonly TransactionType $TransactionTypeId,
        public readonly int $TotalInstallments,
        public readonly ?string $CardCountryCode,
        public readonly ?string $CardIssuingBank,
        public readonly int $RedeemedAmount,
        public readonly ?int $ClearanceDate,
        public readonly ?int $CurrentInstallment,
        /** @var string[] */
        public readonly array $Tags,
        public readonly ?string $BillId,
        public readonly ?string $ResellerSourceCode,
        public readonly ?string $ResellerSourceName,
        public readonly ?string $ResellerCompanyName,
        public readonly ?string $ResellerSourceAddress,
        public readonly string $CardExpirationDate,
        public readonly ?string $RetrievalReferenceNumber,
        /** @var string[] */
        public readonly array $AssignedMerchantUsers,
        /** @var string[] */
        public readonly array $AssignedResellerUsers,
        public readonly int $CardTypeId,
        public readonly ?int $DigitalWalletId,
        public readonly ?string $ResponseEventId,
        public readonly ?string $ElectronicCommerceIndicator,
    ) {
    }

    /** @phpstan-param  TransactionFailedArray  $attributes */
    public static function create(array $attributes): self
    {
        return new self(
            Moto: $attributes['Moto'],
            Email: $attributes['Email'],
            Phone: $attributes['Phone'] ?? null,
            BankId: $attributes['BankId'],
            Systemic: $attributes['Systemic'],
            Switching: $attributes['Switching'],
            ParentId: $attributes['ParentId'] ?? null,
            Amount: $attributes['Amount'],
            ChannelId: $attributes['ChannelId'],
            TerminalId: $attributes['TerminalId'],
            MerchantId: $attributes['MerchantId'],
            OrderCode: $attributes['OrderCode'],
            ProductId: $attributes['ProductId'] ?? null,
            StatusId: TransactionStatus::from($attributes['StatusId']),
            FullName: $attributes['FullName'],
            ResellerId: $attributes['ResellerId'] ?? null,
            InsDate: $attributes['InsDate'],
            TotalFee: $attributes['TotalFee'],
            CardUniqueReference: $attributes['CardUniqueReference'],
            CardToken: $attributes['CardToken'],
            CardNumber: $attributes['CardNumber'],
            TipAmount: $attributes['TipAmount'],
            SourceCode: $attributes['SourceCode'],
            SourceName: $attributes['SourceName'],
            Latitude: $attributes['Latitude'] ?? null,
            Longitude: $attributes['Longitude'] ?? null,
            CompanyName: $attributes['CompanyName'] ?? null,
            TransactionId: $attributes['TransactionId'],
            CompanyTitle: $attributes['CompanyTitle'] ?? null,
            PanEntryMode: $attributes['PanEntryMode'],
            ReferenceNumber: $attributes['ReferenceNumber'],
            ResponseCode: $attributes['ResponseCode'] ?? null,
            CurrencyCode: $attributes['CurrencyCode'],
            OrderCulture: $attributes['OrderCulture'],
            MerchantTrns: $attributes['MerchantTrns'] ?? null,
            CustomerTrns: $attributes['CustomerTrns'],
            IsManualRefund: $attributes['IsManualRefund'],
            TargetPersonId: $attributes['TargetPersonId'] ?? null,
            TargetWalletId: $attributes['TargetWalletId'] ?? null,
            LoyaltyTriggered: $attributes['LoyaltyTriggered'],
            TransactionTypeId: TransactionType::from($attributes['TransactionTypeId']),
            TotalInstallments: $attributes['TotalInstallments'],
            CardCountryCode: $attributes['CardCountryCode'] ?? null,
            CardIssuingBank: $attributes['CardIssuingBank'] ?? null,
            RedeemedAmount: $attributes['RedeemedAmount'],
            ClearanceDate: $attributes['ClearanceDate'] ?? null,
            CurrentInstallment: $attributes['CurrentInstallment'] ?? null,
            Tags: $attributes['Tags'],
            BillId: $attributes['BillId'] ?? null,
            ResellerSourceCode: $attributes['ResellerSourceCode'] ?? null,
            ResellerSourceName: $attributes['ResellerSourceName'] ?? null,
            ResellerCompanyName: $attributes['ResellerCompanyName'] ?? null,
            ResellerSourceAddress: $attributes['ResellerSourceAddress'] ?? null,
            CardExpirationDate: $attributes['CardExpirationDate'],
            RetrievalReferenceNumber: $attributes['RetrievalReferenceNumber'] ?? null,
            AssignedMerchantUsers: $attributes['AssignedMerchantUsers'],
            AssignedResellerUsers: $attributes['AssignedResellerUsers'],
            CardTypeId: $attributes['CardTypeId'],
            DigitalWalletId: $attributes['DigitalWalletId'] ?? null,
            ResponseEventId: $attributes['ResponseEventId'] ?? null,
            ElectronicCommerceIndicator: $attributes['ElectronicCommerceIndicator'] ?? null,
        );
    }
}
