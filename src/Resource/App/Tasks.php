<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource\App;

use BEAR\Resource\ResourceObject;
use Ryo88c\ChatWorkApiClient\Inject\ChatWorkApiClientInject;

class Tasks extends ResourceObject
{
    use ChatWorkApiClientInject;

    /**
     * /rooms/{room_id}/tasks チャットのタスク一覧を取得
     * /rooms/{room_id}/tasks/{task_id} タスク情報を取得
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id-tasks
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id-tasks-task_id
     *
     * @return $this
     */
    public function onGet()
    {
        $this['result'] = $this->request();
        return $this;
    }

    /**
     * /rooms/{room_id}/tasks チャットに新しいタスクを追加
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#POST-rooms-room_id-tasks
     *
     * @return $this
     */
    public function onPost()
    {
        $this['result'] = $this->request();
        return $this;
    }
}
