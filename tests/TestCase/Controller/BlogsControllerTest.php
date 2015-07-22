<?php
namespace CrudView\Test\Controller;

use Crud\TestSuite\IntegrationTestCase;

class BlogsControllerTest extends IntegrationTestCase
{

    public $fixtures = ['plugin.crud_view.blogs'];

    public function testIndex()
    {
        $this->get('/blogs/index');
        $this->assertResponseSuccess();
        $this->assertResponseContains('<title>Blogs</title>');
        $this->assertResponseContains('<a href="/blogs/add" class="btn btn-default">Add</a>');
        $this->assertCommon();

        $this->assertResponseContains('<div class="scaffold-action scaffold-action-index scaffold-controller-blogs scaffold-blogs-index">');
        $this->assertResponseContains('<h2>Blogs</h2>');
        $this->assertResponseContains('<a href="/blogs/view/1" class="btn btn-default">View</a>');
        $this->assertResponseContains('<a href="/blogs/edit/1" class="btn btn-default">Edit</a>');
        $this->assertResponseContains('<a href="#" onclick="if (confirm(&quot;Are you sure you want to delete record #1?&quot;');
        $this->assertResponseContains('Page 1 of 2, showing 3 records out of 5 total.');
    }

    public function testView()
    {
        $this->get('/blogs/view/1');
        $this->assertResponseSuccess();
        $this->assertResponseContains('<title>View Blog #1: 1st post</title>');
        $this->assertResponseContains('<a href="/blogs" class="btn btn-default">Index</a>');
        $this->assertResponseContains('<a href="/blogs/add" class="btn btn-default">Add</a>');
        $this->assertCommon();

        $this->assertResponseContains('<div class="scaffold-action scaffold-action-view scaffold-controller-blogs scaffold-blogs-view">');
        $this->assertResponseContains('<h2>View Blog #1: 1st post</h2>');
        $this->assertResponseContains('<tr><th>Is Active</th><td><span class="label label-success">Yes</span>&nbsp;</td></tr>');
        $this->assertResponseContains('<tr><th>Name</th><td><a href="/blogs/view/1">1st post</a>&nbsp;</td></tr>');
        $this->assertResponseContains('<tr><th>Body</th><td>1st post body&nbsp;</td></tr>');
    }

    public function testAdd()
    {
        $this->get('/blogs/add');
        $this->assertResponseSuccess();
        $this->assertResponseContains('<title>Add Blog</title>');
        $this->assertResponseContains('<a href="/blogs" class="btn btn-default">Index</a>');
        $this->assertCommon();

        $this->assertResponseContains('<div class="scaffold-action scaffold-action-add scaffold-controller-blogs scaffold-blogs-add">');
        $this->assertResponseContains('<h2>Add Blog</h2>');

        $this->assertResponseContains('<form method="post" role="form" action="/blogs/add">');

        $this->assertResponseContains('<label for="is-active"><input type="checkbox" name="is_active" value="1" id="is-active">Is Active</label>');
        $this->assertResponseContains('<label class="control-label" for="name">Name</label><input type="text" name="name" maxlength="255" id="name" class="form-control">');
        $this->assertResponseContains('<label for="body">Body</label><textarea name="body" id="body" class="form-control" rows="5"></textarea>');

        $this->assertResponseContains('<button class="btn btn-primary" name="_save" type="submit">Save</button>');
        $this->assertResponseContains('<button class="btn btn-success btn-save-continue" name="_edit" type="submit">Save & continue editing</button>');
        $this->assertResponseContains('<button class="btn btn-success" name="_add" type="submit">Save & create new</button>');
        $this->assertResponseContains('<a href="/blogs" class="btn btn-default" role="button">Back</a>');
    }

    public function testEdit()
    {
        $this->get('/blogs/edit/1');
        $this->assertResponseSuccess();
        $this->assertResponseContains('<title>Edit Blog #1: 1st post</title>');
        $this->assertResponseContains('<a href="/blogs" class="btn btn-default">Index</a>');
        $this->assertCommon();

        $this->assertResponseContains('<div class="scaffold-action scaffold-action-edit scaffold-controller-blogs scaffold-blogs-edit">');
        $this->assertResponseContains('<h2>Edit Blog #1: 1st post</h2>');

        $this->assertResponseContains('<form method="post" role="form" action="/blogs/edit/1">');

        $this->assertResponseContains('<label for="is-active"><input type="checkbox" name="is_active" value="1" id="is-active" checked="checked">Is Active</label>');
        $this->assertResponseContains('<label class="control-label" for="name">Name</label><input type="text" name="name" maxlength="255" id="name" class="form-control" value="1st post">');
        $this->assertResponseContains('<label for="body">Body</label><textarea name="body" id="body" class="form-control" rows="5">1st post body</textarea>');

        $this->assertResponseContains('<button class="btn btn-primary" name="_save" type="submit">Save</button>');
        $this->assertResponseContains('<button class="btn btn-success btn-save-continue" name="_edit" type="submit">Save & continue editing</button>');
        $this->assertResponseContains('<button class="btn btn-success" name="_add" type="submit">Save & create new</button>');
        $this->assertResponseContains('<a href="/blogs" class="btn btn-default" role="button">Back</a>');
    }

    public function assertCommon()
    {
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
        $this->assertResponseContains('<a href="/blogs/lookup" class="btn btn-default">Lookup</a>'); // @todo This shouldn't appear.
    }
}
