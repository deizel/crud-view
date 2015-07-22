<?php
namespace CrudView\Test\Controller;

use Crud\TestSuite\IntegrationTestCase;

class BlogsControllerTest extends IntegrationTestCase {

    public $fixtures = ['plugin.crud_view.blogs'];

    public function testIndex()
    {
        $this->get('/blogs/index');
        $this->assertResponseSuccess();
        $this->assertCommon();

        $this->assertResponseContains('<div class="scaffold-action scaffold-action-index scaffold-controller-blogs scaffold-blogs-index">');
        $this->assertResponseContains('Page 1 of 2, showing 3 records out of 5 total.');
        $this->assertResponseContains('<h2>Blogs</h2>');
        $this->assertResponseContains('<a href="/blogs/add" class="btn btn-default">Add</a>');
        $this->assertResponseContains('<a href="/blogs/lookup" class="btn btn-default">Lookup</a>');
        $this->assertResponseContains('<a href="/blogs/view/1" class="btn btn-default">View</a>');
        $this->assertResponseContains('<a href="/blogs/edit/1" class="btn btn-default">Edit</a>');
        $this->assertResponseContains('<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete record #1?&quot;');
    }

    public function assertCommon()
    {
        $this->assertResponseContains('<title>Blogs</title>');
        $this->assertResponseContains('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.css"/>');
        $this->assertResponseContains('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/css/bootstrap-datetimepicker.min.css"/>');
        $this->assertResponseContains('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/css/selectize.bootstrap3.min.css"/>');
        $this->assertResponseContains('<link rel="stylesheet" href="crud_view/local.css"/>');
        $this->assertResponseContains('<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>');
        $this->assertResponseContains('<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js"></script>');
        $this->assertResponseContains('<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment-with-locales.min.js"></script>');
        $this->assertResponseContains('<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.14.30/js/bootstrap-datetimepicker.min.js"></script>');
        $this->assertResponseContains('<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.1/js/standalone/selectize.js"></script>');
        $this->assertResponseContains('<script src="https://cdn.jsdelivr.net/jquery.dirtyforms/1.2.2/jquery.dirtyforms.min.js"></script>');
        $this->assertResponseContains('<a class="navbar-brand" href="/">Crud View</a>');
        $this->assertResponseContains('<li><a href="/blogs">Blogs</a></li>');
    }
}
