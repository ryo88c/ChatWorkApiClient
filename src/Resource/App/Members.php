<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource\App;

use BEAR\Resource\ResourceObject;
use Ryo88c\ChatWorkApiClient\Inject\ChatWorkApiClientInject;

class Members extends ResourceObject
{
    use ChatWorkApiClientInject;

    /**
     * /rooms/{room_id}/members チャットのメンバー一覧を取得
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id-members
     *
     * @return $this
     */
    public function onGet()
    {
        $this['result'] = $this->request();
        return $this;
    }

    /**
     * /rooms/{room_id}/members チャットのメンバーを一括変更
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#PUT-rooms-room_id-members
     *
     * @return $this
     */
    public function onPut()
    {
        $this['result'] = $this->request();
        return $this;
    }
}
