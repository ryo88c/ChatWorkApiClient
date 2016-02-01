<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Fake\Module;

use Ryo88c\ChatWorkApiClient\Module\ChatWorkApiClientInterface;

class FakeChatWorkApiClient implements ChatWorkApiClientInterface
{
    public function request($method, $path, array $options = [])
    {
        return true;
    }
}
