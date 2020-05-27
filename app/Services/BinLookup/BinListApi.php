<?php


namespace App\Services\BinLookUp;


class BinListApi extends BinLookup
{

    public function isEu(string $bin): bool
    {
        $rawResponse = file_get_contents('https://lookup.binlist.net/' . $bin);

        if (!$rawResponse) {
            throw new \HttpResponseException('BIN lookup service failure');
        }

        $responseJson = json_decode($rawResponse);
        return $this->currencyLookup->isEu($responseJson->country->alpha2);
    }
}
