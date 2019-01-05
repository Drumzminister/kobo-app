<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Koboaccountant\Models\Bank;
class SeedBanks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function run()
    {
        $client = new Client();
        $res = $client->request('GET', 'https://api.paystack.co/bank');
        $banks = json_decode($res->getBody()->getContents())->data;
        foreach ($banks as $bank) {
            $nBank = new Bank;
            $nBank->name = $bank->name;
            $nBank->code = $bank->code;
            $nBank->save();
        }

    }
}
