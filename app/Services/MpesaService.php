<?php
namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MpesaService
{
    protected $client;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->baseUrl = config('mpesa.env') === 'sandbox'
            ? 'https://sandbox.safaricom.co.ke'
            : 'https://api.safaricom.co.ke';
    }

    public function getAccessToken()
    {
        try {
            $response = $this->client->post($this->baseUrl . '/oauth/v1/generate?grant_type=client_credentials', [
                'auth' => [
                    config('mpesa.consumer_key'),
                    config('mpesa.consumer_secret'),
                ],
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if (isset($responseBody['access_token'])) {
                return $responseBody['access_token'];
            }

            // Log the response if access_token is missing
            \Log::error('M-Pesa Access Token Error', ['response' => $responseBody]);
            throw new \Exception('Failed to retrieve access token from M-Pesa API.');
        } catch (RequestException $e) {
            // Log the exception for debugging
            \Log::error('M-Pesa API Request Error', [
                'message' => $e->getMessage(),
                'response' => $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null,
            ]);
            throw new \Exception('Failed to connect to M-Pesa API.');
        }
    }
public function stkPush($phoneNumber, $amount, $reference, $description)
{
    $accessToken = $this->getAccessToken();

    try {
        $response = $this->client->post($this->baseUrl . '/mpesa/stkpush/v1/processrequest', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
            'json' => [
                'BusinessShortCode' => config('mpesa.shortcode'),
                'Password' => base64_encode(config('mpesa.shortcode') . config('mpesa.passkey') . now()->format('YmdHis')),
                'Timestamp' => now()->format('YmdHis'),
                'TransactionType' => 'CustomerPayBillOnline',
                'Amount' => $amount,
                'PartyA' => $phoneNumber,
                'PartyB' => config('mpesa.shortcode'),
                'PhoneNumber' => $phoneNumber,
                'CallBackURL' => config('mpesa.callback_url'),
                'AccountReference' => $reference,
                'TransactionDesc' => $description,
            ],
        ]);

        $responseBody = json_decode($response->getBody(), true);

        if (isset($responseBody['ResponseCode']) && $responseBody['ResponseCode'] == '0') {
            return $responseBody;
        }

        // Log the response if the STK Push fails
        \Log::error('M-Pesa STK Push Error', ['response' => $responseBody]);
        throw new \Exception('Failed to initiate STK Push.');
    } catch (RequestException $e) {
        // Log the exception for debugging
        \Log::error('M-Pesa STK Push Request Error', [
            'message' => $e->getMessage(),
            'response' => $e->getResponse() ? $e->getResponse()->getBody()->getContents() : null,
        ]);
        throw new \Exception('Failed to connect to M-Pesa API.');
    }
}
}
