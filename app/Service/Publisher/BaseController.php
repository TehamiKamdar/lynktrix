<?php

namespace App\Service\Publisher;

use App\Models\Website;

class BaseController
{
    protected function websiteElseMsg($website)
    {
        if($website->status == Website::HOLD)
        {
            $event = "onclick=`window.open('https://join.skype.com/invite/rGeSJpSJ8kuq','_blank')`";
            $message = "Your website is on hold. <a {$event} href='javascript:void(0)'>Contact to account manager</a> for more information.";
        }
        elseif($website->status == Website::REJECTED)
        {
            $event = "onclick=`window.open('https://join.skype.com/invite/rGeSJpSJ8kuq','_blank')`";
            $message = "Your website is on rejected. <a {$event} href='javascript:void(0)'>Contact to account manager</a> for more information.";
        }
        else
        {
            $url = route("publisher.profile.websites.index");
            $message = "Please go to <a href='{$url}'>website settings</a> and verify your site to view My Advertiser.";
        }

        return $message;
    }
}
