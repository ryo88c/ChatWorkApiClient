<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource\App;

use BEAR\Resource\ResourceObject;
use Ryo88c\ChatWorkApiClient\Inject\ChatWorkApiClientInject;

class Rooms extends ResourceObject
{
    use ChatWorkApiClientInject;

    /**
     * /rooms 自分のチャット一覧の取得
     * /rooms/{room_id} チャットの名前、アイコン、種類(my/direct/group)を取得
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id
     *
     * @return $this
     */
    public function onGet()
    {
        $this['result'] = $this->request();
        return $this;
    }

    /**
     * /rooms グループチャットを新規作成
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#POST-rooms
     *
     * @return $this
     */
    public function onPost()
    {
        $this['result'] = $this->request();
        return $this;
    }

    /**
     * /rooms/{room_id} チャットの名前、アイコンをアップデート
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#PUT-rooms-room_id
     *
     * @return $this
     */
    public function onPut()
    {
        $this['result'] = $this->request();
        return $this;
    }

    /**
     * /rooms/{room_id} グループチャットを退席/削除する
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#DELETE-rooms-room_id
     *
     * @return $this
     */
    public function onDelete()
    {
        $this['result'] = $this->request();
        return $this;
    }
}
