<?php

namespace App\Service\Admin\AdvertiserManagement\Api;

use App\Models\Advertiser;
use App\Models\Commission;
use App\Models\ValidationDomain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateService
{
    public function init(Request $request, Advertiser $api_advertiser) {

        try {

            $advertiserData = [];

            if(isset($request->name))
                $advertiserData['name'] = $request->name;

             if (isset($request->advertiser_id)) {
                $advertiserData["advertiser_id"] = $request->advertiser_id;
            }
            
            if (isset($request->source)) {
                $advertiserData["source"] = $request->source;
            }

            if(isset($request->url))
                $advertiserData['url'] = $request->url;

            if(isset($request->primary_region))
                $advertiserData['primary_regions'] = [$request->primary_region];

            if(isset($request->currency_code))
                $advertiserData['currency_code'] = $request->currency_code;

            if(isset($request->average_payment_time))
                $advertiserData['average_payment_time'] = $request->average_payment_time;

            if(isset($request->epc))
                $advertiserData['epc'] = $request->epc;

            if(isset($request->click_through_url))
                $advertiserData['click_through_url'] = $request->click_through_url;

             if (isset($request->status)) {
                $advertiserData["status"] = $request->status;
                $advertiserData["is_available"] = $request->status;
                $advertiserData["is_active"] = $request->status;
            }

            if(isset($request->deeplink_enabled))
                $advertiserData['deeplink_enabled'] = $request->deeplink_enabled;

            if(isset($request->categories))
                $advertiserData['categories'] = $request->categories;

            if(isset($request->tags))
                $advertiserData['tags'] = $request->tags;

            if(isset($request->offer_type))
                $advertiserData['offer_type'] = $request->offer_type;

                if(isset($request->commission))
                $advertiserData['commission'] = $request->commission;

                if(isset($request->commission_type))
                $advertiserData['commission_type'] = $request->commission_type;

            if(isset($request->supported_regions))
                $advertiserData['supported_regions'] = $request->supported_regions;

            if(isset($request->program_restrictions))
                $advertiserData['program_restrictions'] = $request->program_restrictions;

            if(isset($request->promotional_methods))
                $advertiserData['promotional_methods'] = $request->promotional_methods;

            if(isset($request->description))
                $advertiserData['description'] = $request->description;

            if(isset($request->short_description))
                $advertiserData['short_description'] = $request->short_description;

            if(isset($request->program_policies))
                $advertiserData['program_policies'] = $request->program_policies;

            if(isset($request->custom_domain))
                $advertiserData["custom_domain"] = $request->custom_domain ?? null;

            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $filename = $this->sanitizeFileName($api_advertiser->name.$api_advertiser->advertiser_id, $api_advertiser->url);
                $filename = $filename.'.'.$file->extension();

                // Store in storage/app/public/logos
                $path = $file->storeAs('public', $filename);

                // Get the URL to access the file
                $logoUrl = Storage::url($path);
                $advertiserData['logo'] = $logoUrl;
            }

            $api_advertiser->update($advertiserData);

            if($request->removeCommission)
            {
                Commission::whereIn("id", $request->removeCommission)->delete();
            }

            if($request->removeValidation)
            {
                ValidationDomain::whereIn("id", $request->removeValidation)->delete();
            }

            foreach ($request->commissions ?? [] as $commission)
            {
                if(in_array($commission['commission_id'], $request->removeCommission ?? []))
                    continue;

                Commission::updateOrCreate(
                    [
                        'id' => $commission['commission_id'] ?? null,
                        "advertiser_id" => $api_advertiser->id
                    ],
                    [
                        "created_by" => auth()->user()->name,
                        "date" => $commission["date"] ?? null,
                        "condition" => $commission["condition"] ?? null,
                        "rate" => $commission["rate"] ?? null,
                        "type" => $commission["type"] ?? null,
                        "info" => $commission["info"] ?? null,
                    ]
                );
            }

            if(isset($request->validations))
            {
                foreach (array_column($request->validations, 'domain') as $validation)
                {
                    if($validation)
                    {
                        ValidationDomain::updateOrCreate(
                            [
                                'name' => $validation,
                                "advertiser_id" => $api_advertiser->id
                            ],
                            [
                                "created_by" => auth()->user()->name,
                            ]
                        );
                    }
                }
            }

            $response = [
                "type" => "success",
                "message" => "Advertiser API Data Successfully Updated."
            ];

        } catch (\Exception $exception) {

            $response = [
                "type" => "error",
                "message" => $exception->getMessage()
            ];

        }

        return redirect()->route('admin.advertiser-management.api-advertisers.index')->with($response['type'], $response['message']);

    }

    private function sanitizeFileName($name, $url)
    {
        $sanitized = preg_replace('/[^a-zA-Z0-9]/', '', $name);

        if (empty($sanitized)) {
            $url = trim($url);
            $url = filter_var($url, FILTER_SANITIZE_URL);

            if (!preg_match('/^http[s]?:\/\//', $url)) {
                $url = 'http://' . $url;
            }

            $parsedUrl = parse_url($url);
            $domain = $parsedUrl['host'] ?? null;

            $domain = preg_replace('/^www\./', '', $domain);
            $sanitized = preg_replace('/[^a-zA-Z0-9]/', '', $domain);
        }

        return strtolower($sanitized);
    }
}
