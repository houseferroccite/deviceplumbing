<?php


namespace App\Service;

use YooKassa\Client;
class PaymentService
{
    /**
     * @return Client
     */
    private function getClient():Client{

        $client = new Client();
        $client->setAuth(config('service.yookassa.shop_id'), config('service.yookassa.secret_key'));
        return $client;
    }

    /**
     * @param float $amount
     * @param string $description
     * @param array $options
     * @return string
     * @throws \YooKassa\Common\Exceptions\ApiException
     * @throws \YooKassa\Common\Exceptions\BadApiRequestException
     * @throws \YooKassa\Common\Exceptions\ForbiddenException
     * @throws \YooKassa\Common\Exceptions\InternalServerError
     * @throws \YooKassa\Common\Exceptions\NotFoundException
     * @throws \YooKassa\Common\Exceptions\ResponseProcessingException
     * @throws \YooKassa\Common\Exceptions\TooManyRequestsException
     * @throws \YooKassa\Common\Exceptions\UnauthorizedException
     */
    public function createPayment(float $amount, string $description, array $options = []){
        $client = $this->getClient();
        $payment = $client->createPayment([
           'amount' => [
               'value' => $amount,
               'currency' => 'RUB',
           ],
            'capture' => false,
            'confirmation' => [
                'type' => 'redirect',
                'return_url' => route('payments.callback'),
            ],
            'metadata'=>$options['transaction_id'],
            'description'=>$description
        ],uniqid('',true));

        return $payment->getConfirmation()->getConfirmationUrl();
    }
}
