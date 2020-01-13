<?php

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\RequestOptions;


class Sendmantic
{

    protected $sendmanticEndpoint = 'https://sendmantic.my.id/api/v2/';
    protected $apikey;
    protected $httpClient;
    protected $headers;

    public function __construct($apikey)
    {
        $this->apikey = $apikey;
        $this->headers = [
            'Accept' => 'application/json',
            'apikey' => $this->apikey,
        ];

        $this->httpClient = new GuzzleClient([
            'base_uri' => $this->sendmanticEndpoint
        ]);
    }


    public function paketinfo()
    {
        if (!empty($this->apikey)) {
            $res = $this->httpClient->post('paketinfo', [
                RequestOptions::HEADERS => $this->headers,
            ]);
            return json_decode($res->getBody());

        }


        return false;
    }
    public function hitungPesanSMS($pesan)
    {
        $smsl = strlen($pesan);
        if ($smsl <= 160) {
            $smst = 1;
        } else if ($smsl <=  306) {
            $smst = 2;
        } else {
            $smsl -= 306;
            $smst = $smsl / 153;
            $smst += 2;
        }
        if (strpos($smst, '.') !== false) {
            $smst = preg_replace('/\..*/i', '', $smst);
            $smst++;
        }
        return $smst;
    }

    public function kirimSMS($to, $pesan, $jadwal = null)
    {
        $res = $this->httpClient->post('kirim', [
            RequestOptions::HEADERS => $this->headers,
            RequestOptions::FORM_PARAMS => [
                'tujuan'     => $to,
                'pesan'   => $pesan,
                'tipe'     => "sms",
                'jadwal'      => ($jadwal) ? $jadwal : ""
            ],
        ]);
        return json_decode($res->getBody());
    }
}
