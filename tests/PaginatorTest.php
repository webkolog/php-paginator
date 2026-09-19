<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../paginator.php';

class PaginatorTest extends TestCase
{
    public function testPaginatorInitialization()
    {
        $paginator = new Paginator('en');
        $this->assertEquals('en', $paginator->lang);
        $this->assertEquals(10, $paginator->perPage);
    }

    public function testCreateLinksGeneratesHtml()
    {
        $p = new Paginator('en');
        $p->baseURL = "?p=";
        $p->totalRows = 50;
        $p->perPage = 10;
        $p->page = 1;
        $p->createLinks();

        $this->assertNotEmpty($p->links);
        $this->assertStringContainsString('<ul class="pagination pagination-sm">', $p->links);
        $this->assertStringContainsString('<li class="active"><a href="javascript:void(0);">1</a></li>', $p->links);
    }
}
