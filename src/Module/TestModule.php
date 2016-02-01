<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Module;

use Ray\Di\AbstractModule;
use Ryo88c\ChatWorkApiClient\Fake\Module\FakeChatWorkApiClient;

class TestModule extends AbstractModule
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->bind(ChatWorkApiClientInterface::class)->to(FakeChatWorkApiClient::class);
    }
}
