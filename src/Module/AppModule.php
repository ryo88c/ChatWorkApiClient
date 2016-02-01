<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Module;

use BEAR\Package\PackageModule;
use Ray\Di\AbstractModule;
use josegonzalez\Dotenv\Loader as Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use BEAR\Resource\SchemeCollectionInterface;
use BEAR\Resource\ResourceInterface;
use Ryo88c\ChatWorkApiClient\Resource\Resource;

class AppModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        Dotenv::load([
            'filepath' => dirname(dirname(__DIR__)) . '/.env',
            'toEnv' => true
        ]);
        $this->install(new PackageModule);
        $this->bind(ClientInterface::class)->to(Client::class);
        $this->bind(ChatWorkApiClientInterface::class)->to(ChatWorkApiClient::class);
        $this->bind(SchemeCollectionInterface::class)->toProvider(SchemeCollectionProvider::class);
        $this->bind(ResourceInterface::class)->to(Resource::class);
    }
}
