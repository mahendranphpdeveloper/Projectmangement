<?php

namespace App\Imports;

use App\Models\Contact;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
            return new Contact([
            // 'id'            => $row['id'],
            'name'          => $row['client_first_name'],
            'last_name' => $row['client_second_name'],
            'phone_number'  => $row['contact_details'],
            'email'         => $row['email'],
            'location'      => $row['location'],
            'category'      => $row['category'],
            'company_name' => $row['company_name'],
            'service' => $row['service'],
            'status' => $row['status'],
            'content' => $row['content'],
            'created_at'    => \Carbon\Carbon::parse($row['date_of_inquiry'])
        ]);
    }
}
