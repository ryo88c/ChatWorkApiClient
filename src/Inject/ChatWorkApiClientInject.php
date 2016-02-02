<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Inject;

use Ray\Di\Di\Inject;
use Ryo88c\ChatWorkApiClient\Module\ChatWorkApiClientInterface;

trait ChatWorkApiClientInject
{
    static private $endpoint = 'https://api.chatwork.com/v1';

    /**
     * @var ChatWorkApiClientInterface
     */
    private $apiClient;

    /**
     * @Inject
     */
    public function setClient(ChatWorkApiClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    private function request()
    {
        $options = ['headers' => ['X-ChatWorkToken' => $_ENV['CHATWORK_API_TOKEN']]];
        if (!empty($this->uri->query)) {
            if ($this->uri->method === 'get') {
                $options['query'] = $this->uri->query;
            } elseif ($this->uri->method === 'post') {
                $options['form_params'] = $this->uri->query;
            } else {
                $options['body'] = http_build_query($this->uri->query, '', '&');
            }
        }
        return $this->apiClient->request($this->uri->method, self::$endpoint . $this->uri->path, $options);
    }
}
