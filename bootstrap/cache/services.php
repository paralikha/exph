<?php return array (
  'providers' => 
  array (
    0 => 'Illuminate\\Auth\\AuthServiceProvider',
    1 => 'Illuminate\\Bus\\BusServiceProvider',
    2 => 'Illuminate\\Cache\\CacheServiceProvider',
    3 => 'Illuminate\\Cookie\\CookieServiceProvider',
    4 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    5 => 'Illuminate\\Hashing\\HashServiceProvider',
    6 => 'Illuminate\\Mail\\MailServiceProvider',
    7 => 'Illuminate\\Pagination\\PaginationServiceProvider',
    8 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
    9 => 'Illuminate\\Session\\SessionServiceProvider',
    10 => 'Illuminate\\Validation\\ValidationServiceProvider',
    11 => 'Pluma\\Providers\\ViewServiceProvider',
    12 => 'Pluma\\Providers\\ApplicationServiceProvider',
    13 => 'Pluma\\Providers\\DatabaseServiceProvider',
    14 => 'Pluma\\Providers\\EncryptionServiceProvider',
    15 => 'Pluma\\Providers\\EventServiceProvider',
    16 => 'Pluma\\Providers\\ModuleServiceProvider',
    17 => 'Pluma\\Providers\\RouteServiceProvider',
    18 => 'Pluma\\Providers\\TranslationServiceProvider',
    19 => 'Pluma\\Providers\\FormRequestServiceProvider',
    20 => 'Pluma\\Support\\Installation\\Providers\\InstallationServiceProvider',
    21 => 'Blacksmith\\Providers\\ConsoleSupportServiceProvider',
  ),
  'eager' => 
  array (
    0 => 'Illuminate\\Auth\\AuthServiceProvider',
    1 => 'Illuminate\\Cookie\\CookieServiceProvider',
    2 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
    3 => 'Illuminate\\Pagination\\PaginationServiceProvider',
    4 => 'Illuminate\\Session\\SessionServiceProvider',
    5 => 'Pluma\\Providers\\ViewServiceProvider',
    6 => 'Pluma\\Providers\\DatabaseServiceProvider',
    7 => 'Pluma\\Providers\\EncryptionServiceProvider',
    8 => 'Pluma\\Providers\\EventServiceProvider',
    9 => 'Pluma\\Providers\\ModuleServiceProvider',
    10 => 'Pluma\\Providers\\RouteServiceProvider',
    11 => 'Pluma\\Providers\\FormRequestServiceProvider',
    12 => 'Pluma\\Support\\Installation\\Providers\\InstallationServiceProvider',
  ),
  'deferred' => 
  array (
    'Illuminate\\Bus\\Dispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Contracts\\Bus\\Dispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'Illuminate\\Contracts\\Bus\\QueueingDispatcher' => 'Illuminate\\Bus\\BusServiceProvider',
    'cache' => 'Illuminate\\Cache\\CacheServiceProvider',
    'cache.store' => 'Illuminate\\Cache\\CacheServiceProvider',
    'memcached.connector' => 'Illuminate\\Cache\\CacheServiceProvider',
    'hash' => 'Illuminate\\Hashing\\HashServiceProvider',
    'mailer' => 'Illuminate\\Mail\\MailServiceProvider',
    'swift.mailer' => 'Illuminate\\Mail\\MailServiceProvider',
    'swift.transport' => 'Illuminate\\Mail\\MailServiceProvider',
    'Illuminate\\Mail\\Markdown' => 'Illuminate\\Mail\\MailServiceProvider',
    'Illuminate\\Contracts\\Pipeline\\Hub' => 'Illuminate\\Pipeline\\PipelineServiceProvider',
    'validator' => 'Illuminate\\Validation\\ValidationServiceProvider',
    'validation.presence' => 'Illuminate\\Validation\\ValidationServiceProvider',
    'translator' => 'Pluma\\Providers\\TranslationServiceProvider',
    'translation.loader' => 'Pluma\\Providers\\TranslationServiceProvider',
  ),
  'when' => 
  array (
    'Illuminate\\Bus\\BusServiceProvider' => 
    array (
    ),
    'Illuminate\\Cache\\CacheServiceProvider' => 
    array (
    ),
    'Illuminate\\Hashing\\HashServiceProvider' => 
    array (
    ),
    'Illuminate\\Mail\\MailServiceProvider' => 
    array (
    ),
    'Illuminate\\Pipeline\\PipelineServiceProvider' => 
    array (
    ),
    'Illuminate\\Validation\\ValidationServiceProvider' => 
    array (
    ),
    'Pluma\\Providers\\ApplicationServiceProvider' => 
    array (
    ),
    'Pluma\\Providers\\TranslationServiceProvider' => 
    array (
    ),
    'Blacksmith\\Providers\\ConsoleSupportServiceProvider' => 
    array (
    ),
  ),
);