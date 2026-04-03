<?php

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => true,
    1 => 
    array (
      '/api/documentation-2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'l5-swagger.default.api',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/docs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'l5-swagger.default.docs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/oauth2-callback' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'l5-swagger.default.oauth2_callback',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/documentation' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scribe',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/documentation.postman' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scribe.postman',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/documentation.openapi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'scribe.openapi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/sanctum/csrf-cookie' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'sanctum.csrf-cookie',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/site-log-viewer/api/hosts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.hosts',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/site-log-viewer/api/folders' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.folders',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/site-log-viewer/api/files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.files',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/site-log-viewer/api/clear-cache-all' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.files.clear-cache-all',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/site-log-viewer/api/delete-multiple-files' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.files.delete-multiple-files',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/site-log-viewer/api/logs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.logs',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/health-check' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.healthCheck',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/execute-solution' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.executeSolution',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/_ignition/update-config' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'ignition.updateConfig',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::rhQlFtFw5clZCg2e',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/websites' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::4ICospGMrn3PXD0M',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/advertisers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::HOUpepAE1PnUUzxk',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/offers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::sKXnKhbC6CG1NviZ',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/api/v1/transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ltSUjI2MxHJKCpal',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::ZOewZSIAgUNWMTZs',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::YTuvU0O2zT2Rm43w',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test-total-transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::tfZs3G9AK3yIquAa',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/test2' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::9gVHvkyqM56K3KkF',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/publishers/website' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/csv-download-transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generated::dW9glbGtlRNgghVI',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/clicks-manual' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.generated::hCidOwZqOhKRQ6Uq',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/top-clicks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.topClicks',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/top-transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.topTransactions',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/latest-publishers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.topPublsihers',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/top-advertisers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.topAdvertisers',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/correct-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.correct-password',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/api-advertisers/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/api-advertisers/show-on-publisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.show_on_publisher.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.show_on_publisher.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/api-advertisers/show-on-publisher/get-countries-by-network' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.show_on_publisher.get-countries-by-network',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/api-advertisers/show-on-publisher/get-advertisers-by-network' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.show_on_publisher.get-advertisers-by-network',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/api-advertisers/duplicate-records' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.duplicate_record',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.duplicate_record.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/manual-join-publisher' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.manual_join_publisher',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.manual_join_publisher.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/api-advertisers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/api-advertisers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/advertisers/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/advertisers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/advertiser-management/advertisers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/manual-approval-advertiser-is-delete-from-network' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.manual_approval_advertiser_is_delete_from_network.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/settings/advertiser-configs/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/settings/advertiser-configs' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/settings/advertiser-configs/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/settings/notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.notification.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.notification.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/publisher-management/publishers/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/publisher-management/publishers/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/publisher-management/publishers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/creative-management/coupons/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/creative-management/coupons' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/creative-management/coupons/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/permissions/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/permissions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/permissions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/roles/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/roles' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/roles/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/users/get-tab' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.tabs',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/users/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/user-management/users/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/statistics/links' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.links.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.links.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/statistics/links/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.links.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/statistics/deeplinks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.deeplinks.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.deeplinks.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/statistics/deeplinks/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.deeplinks.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/approval/status-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.approval.statusUpdate',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/transactions/rakuten/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.rakuten.payment',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/transactions/missing' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.missing',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.missing.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/transactions/missing/payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.missing.payment',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.missing.payment.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/transactions/destroy' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.massDestroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/transactions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/transactions/create' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.create',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/transaction-data-export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.data.export.view',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.data.export',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/payment-management/status-update/release-payment' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payment-management.statusUpdateReleasePayment',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/payment-management/status-update' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payment-management.statusUpdate',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/payment-management/release-payment/export' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payment-management.releasePaymentExport',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/838v7aozgk/add-manual-advertisers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.add-advertiser-manual',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.store-advertiser-manual',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/all-brands' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.find-advertisers',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/advertiser-types' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.advertiser-types',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/approved-brands' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.own-advertisers',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/search-advertiser-filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.search-advertiser-filter',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/apply-advertiser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.apply-advertiser',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/send-msg-to-advertiser' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.send-msg-to-advertiser',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/compaign-materials/special-offers' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.creatives.coupons.list',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/compaign-materials/tracking-links' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.creatives.text-links.list',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/compaign-materials/deep-links' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.creatives.deep-links.list',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/compaign-materials/deep-links/generator' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.tools.deep-links.generate',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/compaign-materials/api-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.tools.api-info.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/compaign-materials/api-info/regenerate-token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.tools.api-info.regenerate-token',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/analytics/analytical-reports' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.reports.performance-by-transactions.list',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/analytics/performance-by-clicks' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.reports.performance-by-clicks.list',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/analytics/conversions' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.reports.transactions.list',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/profile/basic-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.basic-information.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.basic-information.update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/profile/company' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.company.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.company.update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/profile/websites' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.websites.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.websites.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.websites.update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/account/login-info' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.account.login-info.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/account/login-info/change-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.account.login-info.change-email',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/account/login-info/change-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.account.login-info.change-password',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/payouts' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/payouts/billing-information' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.billing-information.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.billing-information.update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/payouts/payment-settings' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.payment-settings.index',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.payment-settings.update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/payouts/payment-settings/verify-identity' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.payment-settings.verify-identity',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/changes/email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.changes.email-update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/changes/username' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.changes.username-update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/changes/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.changes.password-update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/deeplink/check-availability' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.deeplink.check-availability',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/tracking/check-availability' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.tracking.check-availability',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/get-month-last-day' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.get-month-last-day',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/upload-profile-image' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.upload-profile-image',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/set-limit' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.set-limit',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/partner/set-advertiser-view' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.set-advertiser-view',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.edit',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'profile.update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'profile.destroy',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-states' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-states',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-cities' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-cities',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-countries-by-network' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-countries-by-network',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-advertisers-by-network' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-advertisers-by-network',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-advertisers-by-network-by-users' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-advertisers-by-network-by-user',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-websites-by-user' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-websites-by-user',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/get-started' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'get-started',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/forgot-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.request',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'password.email',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/reset-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.store',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/verify-email' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.notice',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email/verification-notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.send',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/confirm-password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.confirm',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::yDUTwUqlWDdCVuJg',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'logout',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/advertiser-step-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertiser-step-form',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/advertiser-step-one' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertiser-step-one',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/advertiser-step-two' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertiser-step-two',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/advertiser-step-three' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'advertiser-step-three',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/publisher-step-form' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher-step-form',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/publisher-step-one' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher-step-one',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/publisher-step-two' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher-step-two',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/publisher-step-three' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher-step-three',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/webhooks/incoming' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::6YaIIZZVnuLPzYfH',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/track' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.simple.long',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/deeplink' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.deeplink.long',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/link-expired' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'link.expired',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/redirect' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'redirect.url',
          ),
          1 => '127.0.0.1',
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|(?:(?:[^./]*+\\.)++)(?|/docs/asset/([^/]++)(*:49)|/838v7aozgk/site\\-log\\-viewer(?|/api/f(?|olders/([^/]++)(?|/(?|download(*:127)|clear\\-cache(*:147))|(*:156))|iles/([^/]++)(?|/(?|download(*:193)|clear\\-cache(*:213))|(*:222)))|(?:/((?:.*)))?(*:246))|/pendingEmail/verify/([^/]++)(*:284)|/api/v1/(?|websites/([^/]++)(*:320)|advertisers/([^/]++)(*:348)|offer/([^/]++)(*:370)|generate\\-(?|link/([^/]++)(*:404)|deep\\-link/([^/]++)(*:431))))|(?i:127\\.0\\.0\\.1)\\.(?|/publisher/payments/invoice/([^/]++)(*:500)|/([^/]++)/dashboard(*:527)|/838v7aozgk/(?|a(?|dvertiser\\-management/a(?|pi\\-advertisers/(?|status/([^/]++)(*:614)|([^/]++)(?|(*:633)|/edit(*:646)|(*:654)))|dvertisers/([^/]++)(?|(*:686)|/edit(*:699)|(*:707)))|pproval/(?|([^/]++)(*:736)|show/([^/]++)/([^/]++)(*:766)|destroy/([^/]++)(*:790))|ccess\\-login/([^/]++)(*:820))|manual\\-approval\\-advertiser\\-is\\-delete\\-from\\-network/([^/]++)(*:893)|s(?|ettings/advertiser\\-configs/([^/]++)(?|(*:944)|/edit(*:957)|(*:965))|tatistics/(?|links/([^/]++)(?|(*:1004)|/edit(*:1018)|(*:1027))|deeplinks/([^/]++)(?|(*:1058)|/edit(*:1072)|(*:1081))))|p(?|ublisher\\-management/publisher(?|s/([^/]++)(?|/(?|([^/]++)(*:1155)|edit(*:1168))|(*:1178))|/([^/]++)(*:1197))|ayment\\-management/(?|([^/]++)(?|/([^/]++)/([^/]++)(*:1258)|(*:1267))|history/([^/]++)(?|(*:1296))))|creative\\-management/coupons/([^/]++)(?|(*:1348)|/edit(*:1362)|(*:1371))|user\\-management/(?|permissions/([^/]++)(?|(*:1424)|/edit(*:1438)|(*:1447))|roles/([^/]++)(?|(*:1474)|/edit(*:1488)|(*:1497))|users/([^/]++)(?|/(?|([^/]++)(*:1536)|edit(*:1549))|(*:1559)))|transactions/([^/]++)(?|(*:1594)|/edit(*:1608)|(*:1617)))|/partner/(?|export\\-advertisers/([^/]++)(*:1668)|a(?|dvertiser\\-detail/([^/]++)(*:1707)|nalytics/(?|analytical\\-reports/export/([^/]++)(*:1763)|performance\\-by\\-clicks/export/([^/]++)(*:1811)|conversions/export/([^/]++)(*:1847)))|c(?|ompaign\\-materials/(?|special\\-offers/(?|([^/]++)(*:1911)|export/([^/]++)(*:1935))|tracking\\-links/export/([^/]++)(*:1976)|deep\\-links/export/([^/]++)(*:2012))|hanges/verify\\-to\\-change\\-email/([^/]++)(*:2063))|p(?|rofile/(?|basic\\-information/media\\-kits/([^/]++)(*:2126)|websites/(?|([^/]++)(*:2155)|verification(*:2176)))|ayouts/payment\\-settings/verify\\-identity\\-code/([^/]++)(*:2243))|notification\\-center(?|/notification/([^/]++)(*:2298)|(?:/([^/]++))?(*:2321))|set\\-website/([^/]++)(*:2352))|/([^/]++)/(?|register(?|(*:2386))|login(*:2401))|/hfLprTv8(?:/([^/]++))?(*:2434)|/([^/]++)/login(*:2458)|/reset\\-password/([^/]++)(*:2492)|/verify\\-email/([^/]++)/([^/]++)(*:2533)|/track/([^/]++)(?|/([^/]++)(?|/([^/]++)(*:2581)|(*:2590))|(*:2600))|/g/([^/]++)(*:2621)|/short/([^/]++)(*:2645)|/deeplink/([^/]++)(*:2672)))/?$}sDu',
    ),
    3 => 
    array (
      49 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'l5-swagger.default.asset',
          ),
          1 => 
          array (
            0 => 'asset',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      127 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.folders.download',
          ),
          1 => 
          array (
            0 => 'folderIdentifier',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      147 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.folders.clear-cache',
          ),
          1 => 
          array (
            0 => 'folderIdentifier',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      156 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.folders.delete',
          ),
          1 => 
          array (
            0 => 'folderIdentifier',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      193 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.files.download',
          ),
          1 => 
          array (
            0 => 'fileIdentifier',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      213 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.files.clear-cache',
          ),
          1 => 
          array (
            0 => 'fileIdentifier',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      222 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.files.delete',
          ),
          1 => 
          array (
            0 => 'fileIdentifier',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      246 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'log-viewer.index',
            'view' => NULL,
          ),
          1 => 
          array (
            0 => 'view',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      284 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'pendingEmail.verify',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      320 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::NHWigdMZZnDZtu83',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::8lNFPnhVl67wIEoz',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      370 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::5F02Kxz7zf3EvOrH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      404 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::jIyPnG0LFOIbDQSH',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      431 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::7kgJ2kMdJwLo2jIY',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      500 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.invoice',
          ),
          1 => 
          array (
            0 => 'payment_history',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      527 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'dashboard',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      614 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.status',
          ),
          1 => 
          array (
            0 => 'api_advertiser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      633 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.show',
          ),
          1 => 
          array (
            0 => 'api_advertiser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      646 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.edit',
          ),
          1 => 
          array (
            0 => 'api_advertiser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      654 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.update',
          ),
          1 => 
          array (
            0 => 'api_advertiser',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.api-advertisers.destroy',
          ),
          1 => 
          array (
            0 => 'api_advertiser',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      686 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.show',
          ),
          1 => 
          array (
            0 => 'advertiser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      699 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.edit',
          ),
          1 => 
          array (
            0 => 'advertiser',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.update',
          ),
          1 => 
          array (
            0 => 'advertiser',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.advertiser-management.advertisers.destroy',
          ),
          1 => 
          array (
            0 => 'advertiser',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      736 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.approval.index',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      766 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.approval.show',
          ),
          1 => 
          array (
            0 => 'approval',
            1 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      790 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.approval.destroy',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      820 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.access-login',
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      893 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.manual_approval_advertiser_is_delete_from_network',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      944 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.show',
          ),
          1 => 
          array (
            0 => 'advertiser_config',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      957 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.edit',
          ),
          1 => 
          array (
            0 => 'advertiser_config',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      965 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.update',
          ),
          1 => 
          array (
            0 => 'advertiser_config',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.settings.advertiser-configs.destroy',
          ),
          1 => 
          array (
            0 => 'advertiser_config',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1004 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.links.show',
          ),
          1 => 
          array (
            0 => 'link',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1018 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.links.edit',
          ),
          1 => 
          array (
            0 => 'link',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1027 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.links.update',
          ),
          1 => 
          array (
            0 => 'link',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.links.destroy',
          ),
          1 => 
          array (
            0 => 'link',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1058 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.deeplinks.show',
          ),
          1 => 
          array (
            0 => 'deeplink',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1072 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.deeplinks.edit',
          ),
          1 => 
          array (
            0 => 'deeplink',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1081 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.deeplinks.update',
          ),
          1 => 
          array (
            0 => 'deeplink',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.statistics.deeplinks.destroy',
          ),
          1 => 
          array (
            0 => 'deeplink',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.statusUpdate',
          ),
          1 => 
          array (
            0 => 'status',
            1 => 'website',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1168 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.edit',
          ),
          1 => 
          array (
            0 => 'publisher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1178 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.show',
          ),
          1 => 
          array (
            0 => 'publisher',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.update',
          ),
          1 => 
          array (
            0 => 'publisher',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.destroy',
          ),
          1 => 
          array (
            0 => 'publisher',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1197 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.publisher-management.publishers.index',
          ),
          1 => 
          array (
            0 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1258 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payment-management.statusUpdateByID',
          ),
          1 => 
          array (
            0 => 'section',
            1 => 'transaction',
            2 => 'status',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1267 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payment-management.index',
          ),
          1 => 
          array (
            0 => 'section',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1296 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payment-management.paymentHistoryByInvoice',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.payment-management.updatePaymentHistoryByInvoice',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.show',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1362 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.edit',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1371 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.update',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.creative-management.coupons.destroy',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1424 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.show',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1438 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.edit',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1447 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.update',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.permissions.destroy',
          ),
          1 => 
          array (
            0 => 'permission',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1474 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.show',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1488 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.edit',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1497 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.update',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.roles.destroy',
          ),
          1 => 
          array (
            0 => 'role',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1536 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.statusUpdate',
          ),
          1 => 
          array (
            0 => 'status',
            1 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1549 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.edit',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1559 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.show',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.update',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.users.destroy',
          ),
          1 => 
          array (
            0 => 'user',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1594 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.show',
          ),
          1 => 
          array (
            0 => 'transaction',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1608 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.edit',
          ),
          1 => 
          array (
            0 => 'transaction',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      1617 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.update',
          ),
          1 => 
          array (
            0 => 'transaction',
          ),
          2 => 
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.transactions.destroy',
          ),
          1 => 
          array (
            0 => 'transaction',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1668 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.export-advertisers',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1707 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.view-advertiser',
          ),
          1 => 
          array (
            0 => 'sid',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1763 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.reports.performance-by-transactions.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1811 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.reports.performance-by-clicks.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1847 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.reports.transactions.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1911 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.creatives.coupons.show',
          ),
          1 => 
          array (
            0 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1935 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.creatives.coupons.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      1976 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.creatives.text-links.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2012 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.creatives.deep-links.export',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2063 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.changes.verify-email',
          ),
          1 => 
          array (
            0 => 'url',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2126 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.basic-information.media-kits.delete',
          ),
          1 => 
          array (
            0 => 'mediakit',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2155 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.websites.show',
          ),
          1 => 
          array (
            0 => 'website',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2176 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.profile.websites.verification',
          ),
          1 => 
          array (
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2243 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.payments.payment-settings.verify-identity-code',
          ),
          1 => 
          array (
            0 => 'identity',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2298 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.notification-center.show',
          ),
          1 => 
          array (
            0 => 'notification',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2321 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.notification-center.index',
            'category' => NULL,
          ),
          1 => 
          array (
            0 => 'category',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2352 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'publisher.set-website',
          ),
          1 => 
          array (
            0 => 'website',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2386 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'register',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'generated::1wJtpG1JyvmabVhY',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2401 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2434 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::k3ygG9wJ35oPLx8V',
            'email' => NULL,
          ),
          1 => 
          array (
            0 => 'email',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2458 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::Uy7BDlZavxA0lHcq',
          ),
          1 => 
          array (
            0 => 'type',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      2492 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.reset',
          ),
          1 => 
          array (
            0 => 'token',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2533 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'verification.verify',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2581 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.coupon',
          ),
          1 => 
          array (
            0 => 'advertiser',
            1 => 'website',
            2 => 'coupon',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2590 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.simple',
          ),
          1 => 
          array (
            0 => 'advertiser',
            1 => 'website',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2600 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.simple.sub-id',
          ),
          1 => 
          array (
            0 => 'tracking',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2621 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.simple.short',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2645 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.short',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      2672 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'track.deeplink',
          ),
          1 => 
          array (
            0 => 'code',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'l5-swagger.default.api' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/documentation-2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'L5Swagger\\Http\\Middleware\\Config',
        ),
        'l5-swagger.documentation' => 'default',
        'as' => 'l5-swagger.default.api',
        'uses' => '\\L5Swagger\\Http\\Controllers\\SwaggerController@api',
        'controller' => '\\L5Swagger\\Http\\Controllers\\SwaggerController@api',
        'namespace' => 'L5Swagger',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'l5-swagger.default.docs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'docs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'L5Swagger\\Http\\Middleware\\Config',
        ),
        'l5-swagger.documentation' => 'default',
        'as' => 'l5-swagger.default.docs',
        'uses' => '\\L5Swagger\\Http\\Controllers\\SwaggerController@docs',
        'controller' => '\\L5Swagger\\Http\\Controllers\\SwaggerController@docs',
        'namespace' => 'L5Swagger',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'l5-swagger.default.asset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'docs/asset/{asset}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'L5Swagger\\Http\\Middleware\\Config',
        ),
        'l5-swagger.documentation' => 'default',
        'as' => 'l5-swagger.default.asset',
        'uses' => '\\L5Swagger\\Http\\Controllers\\SwaggerAssetController@index',
        'controller' => '\\L5Swagger\\Http\\Controllers\\SwaggerAssetController@index',
        'namespace' => 'L5Swagger',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'l5-swagger.default.oauth2_callback' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/oauth2-callback',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'L5Swagger\\Http\\Middleware\\Config',
        ),
        'l5-swagger.documentation' => 'default',
        'as' => 'l5-swagger.default.oauth2_callback',
        'uses' => '\\L5Swagger\\Http\\Controllers\\SwaggerController@oauth2Callback',
        'controller' => '\\L5Swagger\\Http\\Controllers\\SwaggerController@oauth2Callback',
        'namespace' => 'L5Swagger',
        'prefix' => '',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scribe' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/documentation',
      'action' => 
      array (
        'middleware' => 
        array (
        ),
        'uses' => '\\Illuminate\\Routing\\ViewController@__invoke',
        'controller' => '\\Illuminate\\Routing\\ViewController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scribe',
      ),
      'fallback' => false,
      'defaults' => 
      array (
        'view' => 'scribe.index',
        'data' => 
        array (
        ),
        'status' => 200,
        'headers' => 
        array (
        ),
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scribe.postman' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/documentation.postman',
      'action' => 
      array (
        'middleware' => 
        array (
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:388:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:172:"function () {
            return new \\Illuminate\\Http\\JsonResponse(\\Illuminate\\Support\\Facades\\Storage::disk(\'local\')->get(\'scribe/collection.json\'), json: true);
        }";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000004a80000000000000000";}";s:4:"hash";s:44:"MSX25vylmEw93sVG9iSQuAHQzw/kEqWjZenaDxPABQE=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scribe.postman',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'scribe.openapi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/documentation.openapi',
      'action' => 
      array (
        'middleware' => 
        array (
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:358:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:142:"function () {
            return \\response()->file(\\Illuminate\\Support\\Facades\\Storage::disk(\'local\')->path(\'scribe/openapi.yaml\'));
        }";s:5:"scope";s:34:"Illuminate\\Support\\ServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000004aa0000000000000000";}";s:4:"hash";s:44:"rkuC8/QbYYm/EhyZbCYP1NQMadoKaGsoHezgNKQVMpU=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'scribe.openapi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'sanctum.csrf-cookie' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'sanctum/csrf-cookie',
      'action' => 
      array (
        'uses' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'controller' => 'Laravel\\Sanctum\\Http\\Controllers\\CsrfCookieController@show',
        'namespace' => NULL,
        'prefix' => 'sanctum',
        'where' => 
        array (
        ),
        'middleware' => 
        array (
          0 => 'web',
        ),
        'as' => 'sanctum.csrf-cookie',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.hosts' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/hosts',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\HostsController@index',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\HostsController@index',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.hosts',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.folders' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/folders',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@index',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@index',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.folders',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.folders.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/folders/{folderIdentifier}/download',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@download',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@download',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.folders.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.folders.clear-cache' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/folders/{folderIdentifier}/clear-cache',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@clearCache',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@clearCache',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.folders.clear-cache',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.folders.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/folders/{folderIdentifier}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@delete',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FoldersController@delete',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.folders.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.files' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/files',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@index',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@index',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.files',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.files.download' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/files/{fileIdentifier}/download',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@download',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@download',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.files.download',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.files.clear-cache' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/files/{fileIdentifier}/clear-cache',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@clearCache',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@clearCache',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.files.clear-cache',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.files.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/files/{fileIdentifier}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@delete',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@delete',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.files.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.files.clear-cache-all' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/clear-cache-all',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@clearCacheAll',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@clearCacheAll',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.files.clear-cache-all',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.files.delete-multiple-files' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/delete-multiple-files',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@deleteMultipleFiles',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\FilesController@deleteMultipleFiles',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.files.delete-multiple-files',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.logs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/site-log-viewer/api/logs',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'Opcodes\\LogViewer\\Http\\Middleware\\EnsureFrontendRequestsAreStateful',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'Opcodes\\LogViewer\\Http\\Middleware\\ForwardRequestToHostMiddleware',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\LogsController@index',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\LogsController@index',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer/api',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.logs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'log-viewer.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/site-log-viewer/{view?}',
      'action' => 
      array (
        'domain' => NULL,
        'middleware' => 
        array (
          0 => 'web',
          1 => 'Opcodes\\LogViewer\\Http\\Middleware\\AuthorizeLogViewer',
          2 => 'auth',
        ),
        'uses' => 'Opcodes\\LogViewer\\Http\\Controllers\\IndexController@__invoke',
        'controller' => 'Opcodes\\LogViewer\\Http\\Controllers\\IndexController',
        'namespace' => 'Opcodes\\LogViewer\\Http\\Controllers',
        'prefix' => '838v7aozgk/site-log-viewer',
        'where' => 
        array (
        ),
        'as' => 'log-viewer.index',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'view' => '(.*)',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'pendingEmail.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'pendingEmail/verify/{token}',
      'action' => 
      array (
        'uses' => 'ProtoneMedia\\LaravelVerifyNewEmail\\Http\\VerifyNewEmailController@verify',
        'controller' => 'ProtoneMedia\\LaravelVerifyNewEmail\\Http\\VerifyNewEmailController@verify',
        'middleware' => 
        array (
          0 => 'web',
          1 => 'signed',
        ),
        'as' => 'pendingEmail.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.healthCheck' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '_ignition/health-check',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\HealthCheckController',
        'as' => 'ignition.healthCheck',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.executeSolution' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/execute-solution',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\ExecuteSolutionController',
        'as' => 'ignition.executeSolution',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'ignition.updateConfig' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '_ignition/update-config',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'Spatie\\LaravelIgnition\\Http\\Middleware\\RunnableSolutionsEnabled',
        ),
        'uses' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController@__invoke',
        'controller' => 'Spatie\\LaravelIgnition\\Http\\Controllers\\UpdateConfigController',
        'as' => 'ignition.updateConfig',
        'namespace' => NULL,
        'prefix' => '_ignition',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::rhQlFtFw5clZCg2e' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'auth:sanctum',
        ),
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:295:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:77:"function (\\Illuminate\\Http\\Request $request) {
    return $request->user();
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"000000000000054b0000000000000000";}";s:4:"hash";s:44:"qIM7BnCvlTz9oAzo5OUGft04wDIpH2+NLFR3jGHky9Y=";}}',
        'namespace' => NULL,
        'prefix' => 'api',
        'where' => 
        array (
        ),
        'as' => 'generated::rhQlFtFw5clZCg2e',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::4ICospGMrn3PXD0M' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/websites',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Website\\ListController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Website\\ListController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::4ICospGMrn3PXD0M',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::NHWigdMZZnDZtu83' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/websites/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Website\\ShowController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Website\\ShowController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::NHWigdMZZnDZtu83',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::HOUpepAE1PnUUzxk' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Advertiser\\ListController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Advertiser\\ListController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::HOUpepAE1PnUUzxk',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::8lNFPnhVl67wIEoz' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/advertisers/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Advertiser\\ShowController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Advertiser\\ShowController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::8lNFPnhVl67wIEoz',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::sKXnKhbC6CG1NviZ' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/offers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Offer\\ListController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Offer\\ListController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::sKXnKhbC6CG1NviZ',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::5F02Kxz7zf3EvOrH' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/offer/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Offer\\ShowController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Offer\\ShowController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::5F02Kxz7zf3EvOrH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ltSUjI2MxHJKCpal' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'api/v1/transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Transaction\\ListController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Transaction\\ListController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::ltSUjI2MxHJKCpal',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::jIyPnG0LFOIbDQSH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/generate-link/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Generate\\TrackingLinkController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Generate\\TrackingLinkController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::jIyPnG0LFOIbDQSH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::7kgJ2kMdJwLo2jIY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'api/v1/generate-deep-link/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'api',
          1 => 'doc.auth',
          2 => 'throttle:60,1',
        ),
        'uses' => 'App\\Http\\Controllers\\Doc\\Generate\\DeeplinkController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Doc\\Generate\\DeeplinkController',
        'namespace' => NULL,
        'prefix' => 'api/v1',
        'where' => 
        array (
        ),
        'as' => 'generated::7kgJ2kMdJwLo2jIY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::ZOewZSIAgUNWMTZs' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'O:47:"Laravel\\SerializableClosure\\SerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Signed":2:{s:12:"serializable";s:278:"O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:60:"function () {
    return \\redirect(\\route("get-started"));
}";s:5:"scope";s:37:"Illuminate\\Routing\\RouteFileRegistrar";s:4:"this";N;s:4:"self";s:32:"00000000000005570000000000000000";}";s:4:"hash";s:44:"JiREkcP8SP24yQvPBwzoJ+vuYQT3SdDTj9E6K4v23Bk=";}}',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::ZOewZSIAgUNWMTZs',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::YTuvU0O2zT2Rm43w' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\TestController@index',
        'controller' => 'App\\Http\\Controllers\\TestController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::YTuvU0O2zT2Rm43w',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::tfZs3G9AK3yIquAa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test-total-transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\TestController@totalTransaction',
        'controller' => 'App\\Http\\Controllers\\TestController@totalTransaction',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::tfZs3G9AK3yIquAa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::9gVHvkyqM56K3KkF' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'test2',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\TestController@index2',
        'controller' => 'App\\Http\\Controllers\\TestController@index2',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::9gVHvkyqM56K3KkF',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.invoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'publisher/payments/invoice/{payment_history}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Payments\\PaymentController@actionInvoice',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Payments\\PaymentController@actionInvoice',
        'as' => 'publisher.payments.invoice',
        'namespace' => NULL,
        'prefix' => '/publisher/payments',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'dashboard' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{type}/dashboard',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\DashboardController@index',
        'controller' => 'App\\Http\\Controllers\\DashboardController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'dashboard',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/publishers/website',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@getpublisherwebsite',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@getpublisherwebsite',
        'as' => 'admin.',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generated::dW9glbGtlRNgghVI' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/csv-download-transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@getcsvdownload',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@getcsvdownload',
        'as' => 'admin.generated::dW9glbGtlRNgghVI',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.generated::hCidOwZqOhKRQ6Uq' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/clicks-manual',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\ClicksManualController@index',
        'controller' => 'App\\Http\\Controllers\\ClicksManualController@index',
        'as' => 'admin.generated::hCidOwZqOhKRQ6Uq',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.topClicks' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/top-clicks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\DashboardController@topClicks',
        'controller' => 'App\\Http\\Controllers\\DashboardController@topClicks',
        'as' => 'admin.topClicks',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.topTransactions' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/top-transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\DashboardController@topTransactions',
        'controller' => 'App\\Http\\Controllers\\DashboardController@topTransactions',
        'as' => 'admin.topTransactions',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.topPublsihers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/latest-publishers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\DashboardController@topPublsihers',
        'controller' => 'App\\Http\\Controllers\\DashboardController@topPublsihers',
        'as' => 'admin.topPublsihers',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.topAdvertisers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/top-advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\DashboardController@topAdvertisers',
        'controller' => 'App\\Http\\Controllers\\DashboardController@topAdvertisers',
        'as' => 'admin.topAdvertisers',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.correct-password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/correct-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@correct_password',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@correct_password',
        'as' => 'admin.correct-password',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@massDestroy',
        'as' => 'admin.advertiser-management.api-advertisers.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.status' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/status/{api_advertiser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@status',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@status',
        'as' => 'admin.advertiser-management.api-advertisers.status',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.show_on_publisher.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@index',
        'as' => 'admin.advertiser-management.api-advertisers.show_on_publisher.index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.show_on_publisher.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@store',
        'as' => 'admin.advertiser-management.api-advertisers.show_on_publisher.store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.show_on_publisher.get-countries-by-network' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher/get-countries-by-network',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@getCountriesByNetwork',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@getCountriesByNetwork',
        'as' => 'admin.advertiser-management.api-advertisers.show_on_publisher.get-countries-by-network',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.show_on_publisher.get-advertisers-by-network' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher/get-advertisers-by-network',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@getAdvertisersByNetwork',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ShowOnController@getAdvertisersByNetwork',
        'as' => 'admin.advertiser-management.api-advertisers.show_on_publisher.get-advertisers-by-network',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers/show-on-publisher',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.duplicate_record' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/duplicate-records',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\DuplicateController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\DuplicateController@index',
        'as' => 'admin.advertiser-management.api-advertisers.duplicate_record',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.duplicate_record.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/duplicate-records',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\DuplicateController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\DuplicateController@store',
        'as' => 'admin.advertiser-management.api-advertisers.duplicate_record.store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management/api-advertisers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.manual_join_publisher' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/manual-join-publisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualJoinController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualJoinController@index',
        'as' => 'admin.advertiser-management.manual_join_publisher',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.manual_join_publisher.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/advertiser-management/manual-join-publisher',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualJoinController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualJoinController@store',
        'as' => 'admin.advertiser-management.manual_join_publisher.store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.api-advertisers.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.api-advertisers.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.api-advertisers.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/{api_advertiser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.api-advertisers.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/{api_advertiser}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.api-advertisers.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/{api_advertiser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.api-advertisers.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.api-advertisers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/advertiser-management/api-advertisers/{api_advertiser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.api-advertisers.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ApiAdvertiserController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@massDestroy',
        'as' => 'admin.advertiser-management.advertisers.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.advertisers.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.advertisers.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.advertisers.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers/{advertiser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.advertisers.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers/{advertiser}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.advertisers.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers/{advertiser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.advertisers.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.advertiser-management.advertisers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/advertiser-management/advertisers/{advertiser}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.advertiser-management.advertisers.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/advertiser-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.manual_approval_advertiser_is_delete_from_network' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/manual-approval-advertiser-is-delete-from-network/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualApprovalNetworkHoldNActiveAdvertiserController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualApprovalNetworkHoldNActiveAdvertiserController@index',
        'as' => 'admin.manual_approval_advertiser_is_delete_from_network',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.manual_approval_advertiser_is_delete_from_network.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/manual-approval-advertiser-is-delete-from-network',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualApprovalNetworkHoldNActiveAdvertiserController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\ManualApprovalNetworkHoldNActiveAdvertiserController@store',
        'as' => 'admin.manual_approval_advertiser_is_delete_from_network.store',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@massDestroy',
        'as' => 'admin.settings.advertiser-configs.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.settings.advertiser-configs.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.settings.advertiser-configs.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.settings.advertiser-configs.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs/{advertiser_config}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.settings.advertiser-configs.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs/{advertiser_config}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.settings.advertiser-configs.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs/{advertiser_config}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.settings.advertiser-configs.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.advertiser-configs.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/settings/advertiser-configs/{advertiser_config}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.settings.advertiser-configs.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\AdvertiserManagement\\AdvertiserConfigController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.notification.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/settings/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Setting\\NotificationController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Setting\\NotificationController@index',
        'as' => 'admin.settings.notification.index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.settings.notification.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/settings/notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Setting\\NotificationController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Setting\\NotificationController@store',
        'as' => 'admin.settings.notification.store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@massDestroy',
        'as' => 'admin.publisher-management.publishers.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.statusUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers/{status}/{website}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@statusUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@statusUpdate',
        'as' => 'admin.publisher-management.publishers.statusUpdate',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/publisher-management/publisher/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@index',
        'as' => 'admin.publisher-management.publishers.index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.publisher-management.publishers.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.publisher-management.publishers.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers/{publisher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.publisher-management.publishers.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers/{publisher}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.publisher-management.publishers.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers/{publisher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.publisher-management.publishers.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.publisher-management.publishers.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/publisher-management/publishers/{publisher}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.publisher-management.publishers.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/publisher-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/creative-management/coupons/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@massDestroy',
        'as' => 'admin.creative-management.coupons.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/creative-management/coupons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.creative-management.coupons.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/creative-management/coupons/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.creative-management.coupons.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/creative-management/coupons',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.creative-management.coupons.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/creative-management/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.creative-management.coupons.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/creative-management/coupons/{coupon}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.creative-management.coupons.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/creative-management/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.creative-management.coupons.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.creative-management.coupons.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/creative-management/coupons/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.creative-management.coupons.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\CreativeManagement\\CouponController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/creative-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/user-management/permissions/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@massDestroy',
        'as' => 'admin.user-management.permissions.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.permissions.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/permissions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.permissions.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/user-management/permissions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.permissions.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.permissions.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/permissions/{permission}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.permissions.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/user-management/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.permissions.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.permissions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/user-management/permissions/{permission}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.permissions.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\PermissionsController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/user-management/roles/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@massDestroy',
        'as' => 'admin.user-management.roles.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.roles.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/roles/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.roles.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/user-management/roles',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.roles.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.roles.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/roles/{role}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.roles.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/user-management/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.roles.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.roles.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/user-management/roles/{role}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.roles.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\RolesController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.statusUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/users/{status}/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@statusUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@statusUpdate',
        'as' => 'admin.user-management.users.statusUpdate',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.tabs' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/user-management/users/get-tab',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@tabs',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@tabs',
        'as' => 'admin.user-management.users.tabs',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/user-management/users/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@massDestroy',
        'as' => 'admin.user-management.users.massDestroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.users.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/users/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.users.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/user-management/users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.users.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.users.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/user-management/users/{user}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.users.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/user-management/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.users.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.users.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/user-management/users/{user}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.user-management.users.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagement\\UsersController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.links.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.links.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.links.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/links/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.links.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.links.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/statistics/links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.links.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.links.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/links/{link}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.links.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.links.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/links/{link}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.links.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.links.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/statistics/links/{link}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.links.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.links.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/statistics/links/{link}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.links.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\LinkController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.deeplinks.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/deeplinks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.deeplinks.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.deeplinks.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/deeplinks/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.deeplinks.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@create',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.deeplinks.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/statistics/deeplinks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.deeplinks.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@store',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.deeplinks.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/deeplinks/{deeplink}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.deeplinks.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.deeplinks.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/statistics/deeplinks/{deeplink}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.deeplinks.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@edit',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.deeplinks.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/statistics/deeplinks/{deeplink}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.deeplinks.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@update',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.statistics.deeplinks.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/statistics/deeplinks/{deeplink}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.statistics.deeplinks.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Statistics\\DeeplinkController@destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/statistics',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.approval.statusUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/approval/status-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@statusUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@statusUpdate',
        'as' => 'admin.approval.statusUpdate',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/approval',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.approval.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/approval/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@index',
        'as' => 'admin.approval.index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/approval',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.approval.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/approval/show/{approval}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@show',
        'as' => 'admin.approval.show',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/approval',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.approval.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/approval/destroy/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\ApplyAdvertiserController@destroy',
        'as' => 'admin.approval.destroy',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/approval',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.rakuten.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transactions/rakuten/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@transactionsRakutenPayment',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@transactionsRakutenPayment',
        'as' => 'admin.transactions.rakuten.payment',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.missing' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transactions/missing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@missingTransaction',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@missingTransaction',
        'as' => 'admin.transactions.missing',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.missing.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/transactions/missing',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@setMissingTransaction',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@setMissingTransaction',
        'as' => 'admin.transactions.missing.store',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.missing.payment' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transactions/missing/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@missingTransactionPayment',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@missingTransactionPayment',
        'as' => 'admin.transactions.missing.payment',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.missing.payment.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/transactions/missing/payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@setMissingTransactionPayment',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@setMissingTransactionPayment',
        'as' => 'admin.transactions.missing.payment.store',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.massDestroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/transactions/destroy',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@massDestroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@massDestroy',
        'as' => 'admin.transactions.massDestroy',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.transactions.index',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@index',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.create' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transactions/create',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.transactions.create',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@create',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/transactions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.transactions.store',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@store',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transactions/{transaction}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.transactions.show',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@show',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@show',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transactions/{transaction}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.transactions.edit',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@edit',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@edit',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => '838v7aozgk/transactions/{transaction}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.transactions.update',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@update',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => '838v7aozgk/transactions/{transaction}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'as' => 'admin.transactions.destroy',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@destroy',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.data.export.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/transaction-data-export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@actionTransactionDataExportView',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@actionTransactionDataExportView',
        'as' => 'admin.transactions.data.export.view',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.transactions.data.export' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/transaction-data-export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@actionTransactionDataExport',
        'controller' => 'App\\Http\\Controllers\\Admin\\Transaction\\TransactionController@actionTransactionDataExport',
        'as' => 'admin.transactions.data.export',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payment-management.statusUpdateReleasePayment' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/payment-management/status-update/release-payment',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@statusUpdateReleasePayment',
        'controller' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@statusUpdateReleasePayment',
        'as' => 'admin.payment-management.statusUpdateReleasePayment',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/payment-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payment-management.statusUpdate' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/payment-management/status-update',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@statusUpdate',
        'controller' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@statusUpdate',
        'as' => 'admin.payment-management.statusUpdate',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/payment-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payment-management.statusUpdateByID' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/payment-management/{section}/{transaction}/{status}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@statusUpdateByID',
        'controller' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@statusUpdateByID',
        'as' => 'admin.payment-management.statusUpdateByID',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/payment-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payment-management.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/payment-management/{section}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@index',
        'as' => 'admin.payment-management.index',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/payment-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payment-management.releasePaymentExport' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/payment-management/release-payment/export',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@releasePaymentExport',
        'controller' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@releasePaymentExport',
        'as' => 'admin.payment-management.releasePaymentExport',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/payment-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payment-management.paymentHistoryByInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/payment-management/history/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@paymentHistoryByInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@paymentHistoryByInvoice',
        'as' => 'admin.payment-management.paymentHistoryByInvoice',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/payment-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.payment-management.updatePaymentHistoryByInvoice' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/payment-management/history/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@updatePaymentHistoryByInvoice',
        'controller' => 'App\\Http\\Controllers\\Admin\\PaymentManagement\\PaymentController@updatePaymentHistoryByInvoice',
        'as' => 'admin.payment-management.updatePaymentHistoryByInvoice',
        'namespace' => NULL,
        'prefix' => '838v7aozgk/payment-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.add-advertiser-manual' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/add-manual-advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@maunalAdvertisers',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@maunalAdvertisers',
        'as' => 'admin.add-advertiser-manual',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.store-advertiser-manual' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '838v7aozgk/add-manual-advertisers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@storemaunalAdvertisers',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@storemaunalAdvertisers',
        'as' => 'admin.store-advertiser-manual',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.access-login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '838v7aozgk/access-login/{email}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@accessLogin',
        'controller' => 'App\\Http\\Controllers\\Admin\\PublisherManagement\\PublisherController@accessLogin',
        'as' => 'admin.access-login',
        'namespace' => NULL,
        'prefix' => '/838v7aozgk',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.find-advertisers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/all-brands',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionFindAdvertiser',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionFindAdvertiser',
        'as' => 'publisher.find-advertisers',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.advertiser-types' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/advertiser-types',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionAdvertiserTypes',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionAdvertiserTypes',
        'as' => 'publisher.advertiser-types',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.export-advertisers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/export-advertisers/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionExportAdvertisers',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionExportAdvertisers',
        'as' => 'publisher.export-advertisers',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.own-advertisers' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/approved-brands',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionOwnAdvertiser',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionOwnAdvertiser',
        'as' => 'publisher.own-advertisers',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.view-advertiser' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/advertiser-detail/{sid}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionViewAdvertiser',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionViewAdvertiser',
        'as' => 'publisher.view-advertiser',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.search-advertiser-filter' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/search-advertiser-filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionSearchAdvertiserFilter',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionSearchAdvertiserFilter',
        'as' => 'publisher.search-advertiser-filter',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.apply-advertiser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/apply-advertiser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionApplyNetwork',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionApplyNetwork',
        'as' => 'publisher.apply-advertiser',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.send-msg-to-advertiser' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/send-msg-to-advertiser',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionSendMsgToAdvertiser',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\AdvertiserController@actionSendMsgToAdvertiser',
        'as' => 'publisher.send-msg-to-advertiser',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.creatives.coupons.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/special-offers',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Creatives\\CouponController@actionCoupon',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Creatives\\CouponController@actionCoupon',
        'as' => 'publisher.creatives.coupons.list',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/special-offers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.creatives.coupons.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/special-offers/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Creatives\\CouponController@actionShow',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Creatives\\CouponController@actionShow',
        'as' => 'publisher.creatives.coupons.show',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/special-offers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.creatives.coupons.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/special-offers/export/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Creatives\\CouponController@actionExport',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Creatives\\CouponController@actionExport',
        'as' => 'publisher.creatives.coupons.export',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/special-offers',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.creatives.text-links.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/tracking-links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Creatives\\TextLinkController@actionTextLink',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Creatives\\TextLinkController@actionTextLink',
        'as' => 'publisher.creatives.text-links.list',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/tracking-links',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.creatives.text-links.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/tracking-links/export/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Creatives\\TextLinkController@actionExport',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Creatives\\TextLinkController@actionExport',
        'as' => 'publisher.creatives.text-links.export',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/tracking-links',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.creatives.deep-links.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/deep-links',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionDeeplinkSection',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionDeeplinkSection',
        'as' => 'publisher.creatives.deep-links.list',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/deep-links',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.creatives.deep-links.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/deep-links/export/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionExport',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionExport',
        'as' => 'publisher.creatives.deep-links.export',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/deep-links',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.tools.deep-links.generate' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/deep-links/generator',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionDeeplinkGenerate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionDeeplinkGenerate',
        'as' => 'publisher.tools.deep-links.generate',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/deep-links',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.tools.api-info.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/compaign-materials/api-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\APIInfoController@actionApiInfo',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\APIInfoController@actionApiInfo',
        'as' => 'publisher.tools.api-info.index',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/api-info',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.tools.api-info.regenerate-token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/compaign-materials/api-info/regenerate-token',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\APIInfoController@actionApiTokenRegenerate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\APIInfoController@actionApiTokenRegenerate',
        'as' => 'publisher.tools.api-info.regenerate-token',
        'namespace' => NULL,
        'prefix' => 'partner/compaign-materials/api-info',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.reports.performance-by-transactions.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/analytics/analytical-reports',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceTransaction',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceTransaction',
        'as' => 'publisher.reports.performance-by-transactions.list',
        'namespace' => NULL,
        'prefix' => 'partner/analytics/analytical-reports',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.reports.performance-by-transactions.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/analytics/analytical-reports/export/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceTransactionExport',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceTransactionExport',
        'as' => 'publisher.reports.performance-by-transactions.export',
        'namespace' => NULL,
        'prefix' => 'partner/analytics/analytical-reports',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.reports.performance-by-clicks.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/analytics/performance-by-clicks',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceClick',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceClick',
        'as' => 'publisher.reports.performance-by-clicks.list',
        'namespace' => NULL,
        'prefix' => 'partner/analytics/performance-by-clicks',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.reports.performance-by-clicks.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/analytics/performance-by-clicks/export/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceClickExport',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Reports\\PerformanceController@actionPerformanceClickExport',
        'as' => 'publisher.reports.performance-by-clicks.export',
        'namespace' => NULL,
        'prefix' => 'partner/analytics/performance-by-clicks',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.reports.transactions.list' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/analytics/conversions',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Reports\\TransactionController@actionTransaction',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Reports\\TransactionController@actionTransaction',
        'as' => 'publisher.reports.transactions.list',
        'namespace' => NULL,
        'prefix' => 'partner/analytics/conversions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.reports.transactions.export' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/analytics/conversions/export/{type}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Reports\\TransactionController@actionTransactionExport',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Reports\\TransactionController@actionTransactionExport',
        'as' => 'publisher.reports.transactions.export',
        'namespace' => NULL,
        'prefix' => 'partner/analytics/conversions',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.basic-information.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/profile/basic-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\BasicInfoController@actionBasicInfo',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\BasicInfoController@actionBasicInfo',
        'as' => 'publisher.profile.basic-information.index',
        'namespace' => NULL,
        'prefix' => 'partner/profile/basic-information',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.basic-information.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/profile/basic-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\BasicInfoController@actionBasicInfoUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\BasicInfoController@actionBasicInfoUpdate',
        'as' => 'publisher.profile.basic-information.update',
        'namespace' => NULL,
        'prefix' => 'partner/profile/basic-information',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.basic-information.media-kits.delete' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/profile/basic-information/media-kits/{mediakit}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\BasicInfoController@actionMediaKitsDelete',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\BasicInfoController@actionMediaKitsDelete',
        'as' => 'publisher.profile.basic-information.media-kits.delete',
        'namespace' => NULL,
        'prefix' => 'partner/profile/basic-information',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.company.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/profile/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\CompanyInfoController@actionCompanyInfo',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\CompanyInfoController@actionCompanyInfo',
        'as' => 'publisher.profile.company.index',
        'namespace' => NULL,
        'prefix' => 'partner/profile/company',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.company.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/profile/company',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\CompanyInfoController@actionCompanyInfoUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\CompanyInfoController@actionCompanyInfoUpdate',
        'as' => 'publisher.profile.company.update',
        'namespace' => NULL,
        'prefix' => 'partner/profile/company',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.websites.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/profile/websites',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsites',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsites',
        'as' => 'publisher.profile.websites.index',
        'namespace' => NULL,
        'prefix' => 'partner/profile/websites',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.websites.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/profile/websites/{website}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionGetWebsiteById',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionGetWebsiteById',
        'as' => 'publisher.profile.websites.show',
        'namespace' => NULL,
        'prefix' => 'partner/profile/websites',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.websites.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/profile/websites',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsiteStore',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsiteStore',
        'as' => 'publisher.profile.websites.store',
        'namespace' => NULL,
        'prefix' => 'partner/profile/websites',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.websites.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/profile/websites',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsiteUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsiteUpdate',
        'as' => 'publisher.profile.websites.update',
        'namespace' => NULL,
        'prefix' => 'partner/profile/websites',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.profile.websites.verification' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/profile/websites/verification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsiteVerification',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\WebsiteController@actionWebsiteVerification',
        'as' => 'publisher.profile.websites.verification',
        'namespace' => NULL,
        'prefix' => 'partner/profile/websites',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.account.login-info.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/account/login-info',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionLoginInfo',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionLoginInfo',
        'as' => 'publisher.account.login-info.index',
        'namespace' => NULL,
        'prefix' => 'partner/account/login-info',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.account.login-info.change-email' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/account/login-info/change-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangeEmail',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangeEmail',
        'as' => 'publisher.account.login-info.change-email',
        'namespace' => NULL,
        'prefix' => 'partner/account/login-info',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.account.login-info.change-password' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/account/login-info/change-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangePassword',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangePassword',
        'as' => 'publisher.account.login-info.change-password',
        'namespace' => NULL,
        'prefix' => 'partner/account/login-info',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/payouts',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Payments\\PaymentController@actionPayment',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Payments\\PaymentController@actionPayment',
        'as' => 'publisher.payments.index',
        'namespace' => NULL,
        'prefix' => 'partner/payouts',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.billing-information.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/payouts/billing-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\BillingInfoController@actionBillingInfo',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\BillingInfoController@actionBillingInfo',
        'as' => 'publisher.payments.billing-information.index',
        'namespace' => NULL,
        'prefix' => 'partner/payouts/billing-information',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.billing-information.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/payouts/billing-information',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\BillingInfoController@actionBillingInfoUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\BillingInfoController@actionBillingInfoUpdate',
        'as' => 'publisher.payments.billing-information.update',
        'namespace' => NULL,
        'prefix' => 'partner/payouts/billing-information',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.payment-settings.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/payouts/payment-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionPaymentSettings',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionPaymentSettings',
        'as' => 'publisher.payments.payment-settings.index',
        'namespace' => NULL,
        'prefix' => 'partner/payouts/payment-settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.payment-settings.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/payouts/payment-settings',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionPaymentSettingsUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionPaymentSettingsUpdate',
        'as' => 'publisher.payments.payment-settings.update',
        'namespace' => NULL,
        'prefix' => 'partner/payouts/payment-settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.payment-settings.verify-identity' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/payouts/payment-settings/verify-identity',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionVerifyIdentity',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionVerifyIdentity',
        'as' => 'publisher.payments.payment-settings.verify-identity',
        'namespace' => NULL,
        'prefix' => 'partner/payouts/payment-settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.payments.payment-settings.verify-identity-code' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/payouts/payment-settings/verify-identity-code/{identity}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionVerifyIdentityCode',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\PaymentSettingController@actionVerifyIdentityCode',
        'as' => 'publisher.payments.payment-settings.verify-identity-code',
        'namespace' => NULL,
        'prefix' => 'partner/payouts/payment-settings',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.changes.email-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/changes/email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangeEmailUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangeEmailUpdate',
        'as' => 'publisher.changes.email-update',
        'namespace' => NULL,
        'prefix' => 'partner/changes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.changes.verify-email' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/changes/verify-to-change-email/{url}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionVerifyEmail',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionVerifyEmail',
        'as' => 'publisher.changes.verify-email',
        'namespace' => NULL,
        'prefix' => 'partner/changes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.changes.username-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/changes/username',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionLoginInfoUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionLoginInfoUpdate',
        'as' => 'publisher.changes.username-update',
        'namespace' => NULL,
        'prefix' => 'partner/changes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.changes.password-update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'partner/changes/password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangePasswordUpdate',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Settings\\LoginInfoController@actionChangePasswordUpdate',
        'as' => 'publisher.changes.password-update',
        'namespace' => NULL,
        'prefix' => 'partner/changes',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.deeplink.check-availability' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/deeplink/check-availability',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionCheckAvailability',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionCheckAvailability',
        'as' => 'publisher.deeplink.check-availability',
        'namespace' => NULL,
        'prefix' => 'partner/deeplink',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.tracking.check-availability' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/tracking/check-availability',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionTrackingURLCheckAvailability',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Advertisers\\DeeplinkController@actionTrackingURLCheckAvailability',
        'as' => 'publisher.tracking.check-availability',
        'namespace' => NULL,
        'prefix' => 'partner/tracking',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.notification-center.show' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/notification-center/notification/{notification}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Notifications\\NotificationController@actionNotificationView',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Notifications\\NotificationController@actionNotificationView',
        'as' => 'publisher.notification-center.show',
        'namespace' => NULL,
        'prefix' => 'partner/notification-center',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.notification-center.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/notification-center/{category?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Notifications\\NotificationController@actionNotificationCenter',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Notifications\\NotificationController@actionNotificationCenter',
        'as' => 'publisher.notification-center.index',
        'namespace' => NULL,
        'prefix' => 'partner/notification-center',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.get-month-last-day' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/get-month-last-day',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionGetMonthLastDay',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionGetMonthLastDay',
        'as' => 'publisher.get-month-last-day',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.upload-profile-image' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'partner/upload-profile-image',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionUploadProfileImage',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionUploadProfileImage',
        'as' => 'publisher.upload-profile-image',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.set-limit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/set-limit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionSetPaginationLimit',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionSetPaginationLimit',
        'as' => 'publisher.set-limit',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.set-advertiser-view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/set-advertiser-view',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionSetAdvertiserView',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionSetAdvertiserView',
        'as' => 'publisher.set-advertiser-view',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher.set-website' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'partner/set-website/{website}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'verified',
          3 => 'publisher.status',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionSetWebsite',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Misc\\AjaxRequestController@actionSetWebsite',
        'as' => 'publisher.set-website',
        'namespace' => NULL,
        'prefix' => '/partner',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\ProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\ProfileController@edit',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\ProfileController@update',
        'controller' => 'App\\Http\\Controllers\\ProfileController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\ProfileController@destroy',
        'controller' => 'App\\Http\\Controllers\\ProfileController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile.destroy',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-states' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-states',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\AddressController@actionStates',
        'controller' => 'App\\Http\\Controllers\\AddressController@actionStates',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-states',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-cities' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-cities',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\AddressController@actionCities',
        'controller' => 'App\\Http\\Controllers\\AddressController@actionCities',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-cities',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-countries-by-network' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-countries-by-network',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Ajax\\GetCountriesByNetworkController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Ajax\\GetCountriesByNetworkController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-countries-by-network',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-advertisers-by-network' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-advertisers-by-network',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Ajax\\GetAdvertiserByNetworkController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Ajax\\GetAdvertiserByNetworkController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-advertisers-by-network',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-advertisers-by-network-by-user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-advertisers-by-network-by-users',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Ajax\\GetAdvertiserByNetworkByUserController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Ajax\\GetAdvertiserByNetworkByUserController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-advertisers-by-network-by-user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-websites-by-user' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'get-websites-by-user',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Ajax\\GetWebsiteByUserController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Ajax\\GetWebsiteByUserController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-websites-by-user',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'get-started' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'get-started',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginViewController@index',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginViewController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'get-started',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'register' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{type}/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::1wJtpG1JyvmabVhY' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '{type}/register',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisteredUserController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::1wJtpG1JyvmabVhY',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{type}/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::k3ygG9wJ35oPLx8V' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'hfLprTv8/{email?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@initLogin',
        'controller' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@initLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::k3ygG9wJ35oPLx8V',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::Uy7BDlZavxA0lHcq' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => '{type}/login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::Uy7BDlZavxA0lHcq',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.request' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.email' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'forgot-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordResetLinkController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.reset' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'reset-password/{token}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@create',
        'controller' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@create',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'reset-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'guest',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\NewPasswordController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.store',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.notice' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify-email',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\EmailVerificationPromptController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Auth\\EmailVerificationPromptController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.notice',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.verify' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'verify-email/{id}/{hash}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'signed',
          3 => 'throttle:6,1',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\VerifyEmailController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerifyEmailController@__invoke',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'verification.send' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'email/verification-notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
          2 => 'throttle:6,1',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\EmailVerificationNotificationController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\EmailVerificationNotificationController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'verification.send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.confirm' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'confirm-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@show',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@show',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::yDUTwUqlWDdCVuJg' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'confirm-password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@store',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmablePasswordController@store',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'generated::yDUTwUqlWDdCVuJg',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\PasswordController@update',
        'controller' => 'App\\Http\\Controllers\\Auth\\PasswordController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'logout' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'auth',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Auth\\AuthenticatedSessionController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertiser-step-form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'advertiser-step-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'advertiser-step-form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertiser-step-one' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'advertiser-step-one',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepOne',
        'controller' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepOne',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'advertiser-step-one',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertiser-step-two' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'advertiser-step-two',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepTwo',
        'controller' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepTwo',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'advertiser-step-two',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'advertiser-step-three' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'advertiser-step-three',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepThree',
        'controller' => 'App\\Http\\Controllers\\Auth\\AdvertiserAjaxController@actionStepThree',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'advertiser-step-three',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher-step-form' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'publisher-step-form',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepForm',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'publisher-step-form',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher-step-one' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'publisher-step-one',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepOne',
        'controller' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepOne',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'publisher-step-one',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher-step-two' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'publisher-step-two',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepTwo',
        'controller' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepTwo',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'publisher-step-two',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'publisher-step-three' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'publisher-step-three',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepThree',
        'controller' => 'App\\Http\\Controllers\\Auth\\PublisherAjaxController@actionStepThree',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'publisher-step-three',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'generated::6YaIIZZVnuLPzYfH' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'webhooks/incoming',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'webhook',
          2 => 'throttle:1000,1',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\WebhookController@actionIncomingWebhook',
        'controller' => 'App\\Http\\Controllers\\WebhookController@actionIncomingWebhook',
        'namespace' => NULL,
        'prefix' => '/webhooks',
        'where' => 
        array (
        ),
        'as' => 'generated::6YaIIZZVnuLPzYfH',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.simple.long' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'track',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionCodeTrackingLong',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionCodeTrackingLong',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.simple.long',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.coupon' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'track/{advertiser}/{website}/{coupon}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\TrackCouponLinkController@actionURLTracking',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\TrackCouponLinkController@actionURLTracking',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.coupon',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.simple' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'track/{advertiser}/{website}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionURLTracking',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionURLTracking',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.simple',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.simple.sub-id' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'track/{tracking}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionURLTrackingWithSubId',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionURLTrackingWithSubId',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.simple.sub-id',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.simple.short' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'g/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionCodeTrackingWithSubId',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionCodeTrackingWithSubId',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.simple.short',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.short' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'short/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionShortURLTracking',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\SimpleLinkController@actionShortURLTracking',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.short',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.deeplink.long' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'deeplink',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\DeepLinkController@actionLongURLTracking',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\DeepLinkController@actionLongURLTracking',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.deeplink.long',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'track.deeplink' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'deeplink/{code}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Track\\DeepLinkController@actionURLTracking',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Track\\DeepLinkController@actionURLTracking',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'track.deeplink',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'link.expired' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'link-expired',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\Publisher\\Misc\\LinkExpiredController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Publisher\\Misc\\LinkExpiredController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'link.expired',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'redirect.url' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'redirect',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'domain' => 'http://127.0.0.1',
        'uses' => 'App\\Http\\Controllers\\RedirectController@__invoke',
        'controller' => 'App\\Http\\Controllers\\RedirectController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'redirect.url',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
