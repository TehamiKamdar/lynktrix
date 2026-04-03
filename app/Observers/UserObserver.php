<?php

namespace App\Observers;

use App\Models\Advertiser;
use App\Models\User;

class UserObserver
{
    public function creating($model)
    {
        $model->sid = $this->generateBarcodeNumber();
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
        return User::whereSid($number)->exists() && Advertiser::whereSid($number)->exists();
    }
}
