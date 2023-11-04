<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeFourController extends Controller
{
    public function groupByOwnersService(array $files)
    {
        $groupedFiles = [];

        foreach ($files as $file => $owner) {
            if (!isset($groupedFiles[$owner])) {
                $groupedFiles[$owner] = [];
            }
            $groupedFiles[$owner][] = $file;
        }

        return $groupedFiles;
    }
}

$service = new FileProcessorService();
$files = [
    "insurance.txt" => "Company A",
    "letter.docx" => "Company A",
    "Contract.docx" => "Company B"
];

$result = $service->groupByOwnersService($files);

print_r($result);