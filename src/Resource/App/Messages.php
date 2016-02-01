<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource\App;

use BEAR\Resource\ResourceObject;
use Ryo88c\ChatWorkApiClient\Inject\ChatWorkApiClientInject;

class Messages extends ResourceObject
{
    use ChatWorkApiClientInject;

    /**
     * /rooms/{room_id}/messages チャットのメッセージ一覧を取得
     * /rooms/{room_id}/messages/{message_id} メッセージ情報を取得
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id-messages
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id-messages-message_id
     *
     * @return $this
     */
    public function onGet()
    {
        $this['result'] = $this->request();
        return $this;
    }

    /**
     * /rooms/{room_id}/messages チャットに新しいメッセージを追加
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#POST-rooms-room_id-messages
     *
     * @return $this
     */
    public function onPost()
    {
        $this['result'] = $this->request();
        return $this;
    }
}
