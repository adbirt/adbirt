<?php

namespace app\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/tour/rate',
        '/visit/verify',
        '/filter/product',
        '/product/delete',
        '/Product/Buy',
        '/Product/Pay',
        '/getParcelPrice',
        '/getCityPrice',
        '/getToCity',
        '/getFromCity',
        '/getAllCity',
        '/check-waybill',
        '/city/checkCity',
        '/city-price/checkCity',
        '/city/delete',
        '/parcel/delete',
        '/city-price/delete',
        '/send/delete',
        '/category/checkCategory',
        '/category/delete',
        '/notify/ChngeStatus',
        '/getProductPrice',
        '/GiftReason/delete',
        '/GiftReason/checkGiftReason',
        '/getReceiverDet',
        '/CheckClient',
        '/gift/CashRedeem',
        '/gift/Get',
        '/gift/Pay',
        '/advertiser/delete',
        '/advertiser/CheckEmail',
        '/advertiser/CheckPhone',
        '/gift/PayWallet',
        'user/delete',
        '/tour/delete',
        '/tour/Book',
        '/campaigns-category/change-status',
        '/campaigns-category/delete',
        '/campaigns-category/check-category',
        '/campaigns/delete',
        '/ubm_getbanner',
        '/campaigns/verified',
        '/wallet-credit/paystack',
        '/withdraw/updated',

        '/login',

        '/contact',
        '/contactus',
        '/contact-us',
        '/api/send-mail'
    ];
}
