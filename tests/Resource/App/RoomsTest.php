<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource\App;

use BEAR\Package\Bootstrap;
use FakeVendor\Sandbox\Resource\App\Href\Embed;

class RoomsTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \BEAR\Resource\ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        parent::setUp();
        $app = (new Bootstrap)->getApp('Ryo88c\ChatWorkApiClient', 'test-app');
        $this->resource = $app->resource;
    }

    public function testOnGet()
    {
        $res = $this->resource->get->uri('app://self/rooms')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Rooms', $res);
        $this->assertSame(200, $res->code);
    }

    public function testOnGetIndividual()
    {
        $res = $this->resource->get->uri('app://self/rooms/123')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Rooms', $res);
        $this->assertSame(200, $res->code);
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnGetIndividualUnFormat()
    {
        $this->resource->get->uri('app://self/rooms/12a')->eager->request();
    }

    public function testOnPost()
    {
        $res = $this->resource->post->uri('app://self/rooms')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Rooms', $res);
        $this->assertSame(200, $res->code);
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnPostIndividual()
    {
        $this->resource->post->uri('app://self/rooms/123')->eager->request();
    }

    public function testOnPut()
    {
        $res = $this->resource->put->uri('app://self/rooms')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Rooms', $res);
        $this->assertSame(200, $res->code);
    }

    public function testOnPutIndividual()
    {
        $res = $this->resource->put->uri('app://self/rooms/123')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Rooms', $res);
        $this->assertSame(200, $res->code);
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnPutIndividualUnFormat()
    {
        $this->resource->put->uri('app://self/rooms/12a')->eager->request();
    }

    public function testOnDelete()
    {
        $res = $this->resource->delete->uri('app://self/rooms')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Rooms', $res);
        $this->assertSame(200, $res->code);
    }

    public function testOnDeleteIndividual()
    {
        $res = $this->resource->delete->uri('app://self/rooms/123')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Rooms', $res);
        $this->assertSame(200, $res->code);
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnDeleteIndividualUnFormat()
    {
        $this->resource->delete->uri('app://self/rooms/12a')->eager->request();
    }
}
