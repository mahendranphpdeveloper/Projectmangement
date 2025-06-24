<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ContactsImport;
use App\Imports\ClientsImport;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function importContacts(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ContactsImport, $request->file('file'));

    return redirect()->back()->with('success', 'Contacts imported successfully.');
}
    public function importClients(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls'
    ]);

    Excel::import(new ClientsImport, $request->file('file'));

    return redirect()->back()->with('success', 'Contacts imported successfully.');
}
public function downloadSample()
{
    $headers = [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ];

    $file = storage_path('app/public/sample_contacts.xlsx');

    return response()->download($file, 'sample_contacts.xlsx', $headers);
}
public function downloadClientsSample()
{
    $headers = [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ];

    $file = storage_path('app/public/sample_clients.xlsx');

    return response()->download($file, 'sample_clients.xlsx', $headers);
}

}
