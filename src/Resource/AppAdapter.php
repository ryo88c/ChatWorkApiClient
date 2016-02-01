<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource;

use BEAR\Resource\AdapterInterface;
use BEAR\Resource\AbstractUri;
use Ray\Di\InjectorInterface;

final class AppAdapter implements AdapterInterface
{
    /**
     * @var InjectorInterface
     */
    private $injector;

    /**
     * Resource adapter namespace
     *
     * @var string
     */
    private $namespace;

    /**
     * Resource adapter path
     *
     * @var string
     */
    private $path;

    private $patterns = [
        'get' => [
            // 自分のチャット一覧の取得
            '/rooms' => 'Rooms',
            // チャットの名前、アイコン、種類(my/direct/group)を取得
            '/rooms/[0-9]+' => 'Rooms',
            // チャットのメンバー一覧を取得
            '/rooms/[0-9]+/members' => 'Members',
            // チャットのメッセージ一覧を取得
            '/rooms/[0-9]+/messages' => 'Messages',
            // メッセージ情報を取得
            '/rooms/[0-9]+/messages/[0-9]+' => 'Messages',
            // チャットのタスク一覧を取得
            '/rooms/[0-9]+/tasks' => 'Tasks',
            // タスク情報を取得
            '/rooms/[0-9]+/tasks/[0-9]+' => 'Tasks',
            // チャットのファイル一覧を取得
            '/rooms/[0-9]+/files' => 'Files',
            // ファイル情報を取得
            '/rooms/[0-9]+/files/[0-9]+' => 'Files',
        ],
        'post' => [
            // グループチャットを新規作成
            '/rooms' => 'Rooms',
            // チャットに新しいメッセージを追加
            '/rooms/[0-9]+/messages' => 'Messages',
            // チャットに新しいタスクを追加
            '/rooms/[0-9]+/tasks' => 'Tasks',
        ],
        'put' => [
            '/rooms' => 'Rooms',
            // チャットの名前、アイコンをアップデート
            '/rooms/[0-9]+' => 'Rooms',
            // チャットのメンバーを一括変更
            '/rooms/[0-9]+/members' => 'Members',
        ],
        'delete' => [
            // グループチャットを退席/削除する
            '/rooms/[0-9]+' => 'Rooms',
        ],
    ];

    /**
     * @param InjectorInterface $injector  Application dependency injector
     * @param string            $namespace Resource adapter namespace
     */
    public function __construct(InjectorInterface $injector, $namespace)
    {
        $this->injector = $injector;
        $this->namespace = $namespace;
    }

    /**
     * {@inheritdoc}
     */
    public function get(AbstractUri $uri)
    {
        if (empty($uri->method)) {
            if (getenv('REQUEST_METHOD')) {
                $method = getenv('REQUEST_METHOD');
            } elseif (isset($_SERVER['argv']) && isset($_SERVER['argv'][1])) {
                $method = $_SERVER['argv'][1];
            }
        } else {
            $method = $uri->method;
        }

        if (isset($method)) {
            foreach ($this->patterns[$method] as $regex => $resource) {
                if (!preg_match(sprintf('!^%s\z!', $regex), $uri->path)) {
                    continue;
                }
                $class = sprintf('%s%s\Resource\%s\%s', $this->namespace, $this->path, ucfirst($uri->scheme), $resource);
                $instance = $this->injector->getInstance($class);
                return $instance;
            }
        }

        $class = $this->namespace . $this->path . '\Resource' . str_replace(' ', '\\', ucwords(str_replace('/', ' ', ' ' . $uri->scheme . $uri->path)));
        $instance = $this->injector->getInstance($class);

        return $instance;
    }
}
