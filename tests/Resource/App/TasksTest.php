<?php
/**
 * This file is part of the Ryo88c\ChatWorkApiClient package
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ryo88c\ChatWorkApiClient\Resource\App;

use BEAR\Package\Bootstrap;
use FakeVendor\Sandbox\Resource\App\Href\Embed;

class TasksTest extends \PHPUnit_Framework_TestCase
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
        $res = $this->resource->get->uri('app://self/rooms/123/tasks')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Tasks', $res);
        $this->assertSame(200, $res->code);
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnGetUnFormat()
    {
        $this->resource->get->uri('app://self/rooms/12a/tasks')->eager->request();
    }

    public function testOnGetIndividual()
    {
        $res = $this->resource->get->uri('app://self/rooms/123/tasks/456')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Tasks', $res);
        $this->assertSame(200, $res->code);
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnGetIndividualUnFormat()
    {
        $this->resource->get->uri('app://self/rooms/123/tasks/45a')->eager->request();
    }

    public function testOnPost()
    {
        $res = $this->resource->post->uri('app://self/rooms/123/tasks')->eager->request();
        $this->assertInstanceOf('Ryo88c\ChatWorkApiClient\Resource\App\Tasks', $res);
        $this->assertSame(200, $res->code);
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnPostIndividual()
    {
        $this->resource->post->uri('app://self/rooms/123/tasks/456')->eager->request();
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnPut()
    {
        $this->resource->put->uri('app://self/rooms/123/tasks')->eager->request();
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnPutIndividual()
    {
        $this->resource->put->uri('app://self/rooms/123/tasks/456')->eager->request();
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnDelete()
    {
        $this->resource->delete->uri('app://self/rooms/123/tasks')->eager->request();
    }

    /**
     * @expectedException BEAR\Resource\Exception\ResourceNotFoundException
     */
    public function testOnPostDeleteIndividual()
    {
        $this->resource->delete->uri('app://self/rooms/123/tasks/456')->eager->request();
    }
}
