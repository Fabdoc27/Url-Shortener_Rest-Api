<?php

use Dedoc\Scramble\Scramble;

Scramble::registerUiRoute(path: 'docs/v1', api: 'v1');
Scramble::registerUiRoute(path: 'docs/v2', api: 'v2');
Scramble::registerJsonSpecificationRoute(path: 'docs/v1.json', api: 'v1');
Scramble::registerJsonSpecificationRoute(path: 'docs/v2.json', api: 'v2');
