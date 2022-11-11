<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Http;
use Psr\Http\Message\RequestInterface;

class payment
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://secure.snd.payu.com/pl/standard/user/oauth/authorize',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'grant_type=client_credentials&client_id=452231&client_secret=105686c50e5b41db255de5935f6b629c',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: cookieFingerprint=9a1a9a29-b507-47db-8926-4dea74b9bfd9; payu_persistent=mobile_agent-false#'
        ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $token = json_decode($response)->access_token;


        // #########

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://secure.payu.com/api/v2_1/orders',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "customerIp": "127.0.0.1",
    "merchantPosId": "452231",
    "description": "RTV market",
    "currencyCode": "PLN",
    "totalAmount": "21000",
    "products": [
         {
             "name": "Wireless Mouse for Laptop",
             "unitPrice": "21000",
             "quantity": "1"
         }
     ]
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json',
    'Authorization: Bearer '.$token,
    'Cookie: cookieFingerprint=9a1a9a29-b507-47db-8926-4dea74b9bfd9; payu_persistent=mobile_agent-false#'
  ),
));

$response = curl_exec($curl);

curl_close($curl);


                dd($response);

        return $next($request);
    }
}
