<?php

namespace App\Domains\Customer\Jobs;

use App\Contracts\CsvToArrayInterface;
use App\Data\Repositories\CustomerRepository;
use Lucid\Foundation\Job;

class HandleCsvUploadJob extends Job //implements CsvToArrayInterface
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $data, $customer;

    public function __construct($data)
    {
        $this->data = $data;
        $this->customer = app(CustomerRepository::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $file = $this->convertCsvToArray($this->data);
        foreach ($file as $key => $row) {
        $data = [
                'first_name'    => $row['first_name'],
                'last_name'     => $row['last_name'],
                'company_id'    => auth()->user()->company->id,
                'user_id'       => auth()->user()->id,
                'email'         => $row['email'],
                'address'       => $row['address'],
                'phone'         => $row['phone'],
                'website'       => $row['website'],
                'image'         => $row['image'],
            ];
            $this->customer->fill($data)->save();
        }
        return response()->json([
            'success' => 'successfully uploaded '
        ]);
//        $file = $this->data;
//        $csvData = file_get_contents($file);
//        $rows = array_map('str_getcsv', explode("\n", $csvData));
//        $header = array_shift($rows);
//        $rows = (collect($rows)->map(function($row) {
//            return collect($row)->map(function ($value) {
//                return trim($value);
//            })->toArray();
//        }));
    }


    public function convertCsvToArray($filename, $delimiter=',')
    {
        if(!file_exists($filename) || !is_readable($filename))
            return FALSE;

        $header = NULL;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== FALSE)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
            {
                if(!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
}
