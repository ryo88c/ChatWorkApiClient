<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource\App;

use BEAR\Resource\ResourceObject;
use Ryo88c\ChatWorkApiClient\Inject\ChatWorkApiClientInject;

class Files extends ResourceObject
{
    use ChatWorkApiClientInject;

    /**
     * /rooms/{room_id}/files チャットのファイル一覧を取得
     * /rooms/{room_id}/files/{file_id} ファイル情報を取得
     *
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id-files
     * @see http://developer.chatwork.com/ja/endpoint_rooms.html#GET-rooms-room_id-files-file_id
     *
     * @return $this
     */
    public function onGet()
    {
        $this['result'] = $this->request();
        return $this;
    }
}
