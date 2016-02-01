<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Module;

interface ChatWorkApiClientInterface
{
    public function request($method, $path, array $options = []);
}
