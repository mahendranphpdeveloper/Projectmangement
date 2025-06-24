<?php

namespace App\Imports;

use App\Models\Clients;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ClientsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
            return new Clients([
            'segment'        => $row['segment'],
            'company_name'   => $row['company_name'],
            'url'            => $row['website_or_url'],
            'contact_person' => $row['contact_person'],
            'email'          => $row['email'],
            'phone_number'   => $row['phone_number'],
            'location'       => $row['location'],
            'zipcode'        => $row['zipcode'],
            'country'        => $row['country'],
        ]);
    }
}
