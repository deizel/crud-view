<?php
namespace CrudView\Test\Controller;

use Crud\TestSuite\IntegrationTestCase;

class BlogsControllerTest extends IntegrationTestCase {

    public $fixtures = ['plugin.crud_view.blogs'];

    public function testIndex()
    {
        $this->get('/blogs/index');
        $this->assertResponseSuccess();
        $this->assertResponseContains('<title>Blogs</title>');
    }
}
