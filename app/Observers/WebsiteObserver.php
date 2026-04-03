<?php

namespace App\Observers;

use App\Models\Website;

class WebsiteObserver
{

    public function creating($model)
    {
        $model->wid = $this->generateBarcodeNumber();
    }

    private function generateBarcodeNumber() {
        $number = mt_rand(10000000, 99999999); // better than rand()

        // call the same function if the barcode exists already
        if ($this->sidExists($number)) {
            return $this->generateBarcodeNumber();
        }

        // otherwise, it's valid and can be used
        return $number;
    }

    private function sidExists($number) {
        // query the database and return a boolean
        // for instance, it might look like this in Laravel
        return Website::whereWid($number)->exists();
    }
}
