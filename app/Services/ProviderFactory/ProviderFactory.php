<?php
// app/Services/ProviderFactory.php
namespace App\Services\ProviderFactory;

use App\Services\Providers\MockTwoProvider;
use App\Services\Providers\ProviderInterface;
use App\Services\Providers\MockOneProvide;

class ProviderFactory {
    public static function createProvider(string $type): ProviderInterface {
        switch ($type) {
            case 'mock-one':
                return new MockOneProvide();
            case 'mock-two':
                return new MockTwoProvider();
            default:
                throw new \Exception("Unknown provider type");
        }
    }
}
