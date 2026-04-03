<?php

namespace App\Service\Publisher\Advertiser;

use App\Enums\ExportType;
use App\Exports\AdvertiserExport;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ExportService
{
    /**
     * @param Request $request
     * @param ExportType $type
     * @return RedirectResponse|BinaryFileResponse
     */
    public function init(Request $request, ExportType $type): BinaryFileResponse|RedirectResponse
    {
        try
        {
            if(ExportType::CSV == $type)
                return Excel::download(new AdvertiserExport($request), 'advertisers.csv');
            elseif(ExportType::XLSX == $type)
                return Excel::download(new AdvertiserExport($request), 'advertisers.xlsx');
        }
        catch (\Exception $exception)
        {
            return redirect()->back()->with("error", $exception->getMessage());
        }
    }
}
