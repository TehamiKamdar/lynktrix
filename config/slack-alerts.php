<?php

return [
    /*
     * The webhook URLs that we'll use to send a message to Slack.
     */
    'webhook_urls' => [
        'default' => env('SLACK_ALERT_GENERAL_WEBHOOK'),
        'warning' => env('SLACK_ALERT_WARNING_WEBHOOK'),
        'generate_link' => env('SLACK_ALERT_GENERATE_LINK_WEBHOOK'),
        'generate_depp_link' => env('SLACK_ALERT_GENERATE_DEEP_LINK_WEBHOOK'),
        'admitad_notification' => env('SLACK_ALERT_ADMITAD_WEBHOOK'),
        'awin_notification' => env('SLACK_ALERT_AWIN_WEBHOOK'),
        'impact_radius_notification' => env('SLACK_ALERT_IMPACT_RADIUS_WEBHOOK'),
        'pepperjam_notification' => env('SLACK_ALERT_PEPPERJAM_WEBHOOK'),
        'rakuten_notification' => env('SLACK_ALERT_RAKUTEN_WEBHOOK'),
        'tradedoubler_notification' => env('SLACK_ALERT_TRADEDOUBLER_WEBHOOK'),
    ],

    /*
     * This job will send the message to Slack. You can extend this
     * job to set timeouts, retries, etc...
     */
    'job' => Spatie\SlackAlerts\Jobs\SendToSlackChannelJob::class,
];
