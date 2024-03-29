<?php

namespace Laranext\Tests;

use Laranext\Laranext;
use Laranext\LaranextServiceProvider;
use Laranext\Tests\Packages\BaseServiceProvider;

class SiteServiceProvider extends BaseServiceProvider {}
class BlogServiceProvider extends BaseServiceProvider {}
class AdminServiceProvider extends BaseServiceProvider {}
class AdminBlogServiceProvider extends BaseServiceProvider {}
class PrefixAdminServiceProvider extends BaseServiceProvider {}

class PackageTest extends OrchestraTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        /*
        |--------------------------------------------------------------------------
        | Possible URI's
        |--------------------------------------------------------------------------
        |
        | / (package site)
        | /jobs (package site uri)
        | /blog
        | /admin
        | /admin/blog
        |
        */

        $this->app->config->set('laranext.prefix_providers', [
            '' => PrefixAdminServiceProvider::class,
            'blog' => AdminBlogServiceProvider::class,
        ]);

        $this->app->config->set('laranext.providers', [
            '' => SiteServiceProvider::class,
            'admin' => AdminServiceProvider::class,
            'blog' => BlogServiceProvider::class,
        ]);
    }

    public function test_it_can_serve_package_with_key()
    {
        $response = $this->get('/blog');

        $this->assertTrue($this->app->providerIsLoaded(BlogServiceProvider::class));
    }

    public function test_it_cannot_load_other_packages_with_current_key()
    {
        $response = $this->get('/blog');

        $this->assertFalse($this->app->providerIsLoaded(SiteServiceProvider::class));
    }

    public function test_it_can_serve_package_without_uri()
    {
        $response = $this->get('/');

        $this->assertTrue($this->app->providerIsLoaded(SiteServiceProvider::class));
    }

    public function test_it_can_serve_base_package_with_uri_when_other_package_not_found()
    {
        $response = $this->get('/jobs');

        $this->assertTrue($this->app->providerIsLoaded(SiteServiceProvider::class));
    }

    public function test_it_can_serve_package_with_prefix_and_key()
    {
        $response = $this->get('/prefix/blog');

        $this->assertTrue($this->app->providerIsLoaded(AdminBlogServiceProvider::class));
    }

    public function test_there_should_not_conflict_between_prefix_and_providers_key()
    {
        $response = $this->get('/prefix');

        $this->assertTrue($this->app->providerIsLoaded(PrefixAdminServiceProvider::class));
    }

    public function test_it_has_laranext_config()
    {
        $this->assertNotNull($this->app->config['laranext']);
    }

    public function test_it_should_fetch_current_key()
    {
        $response = $this->get('/blog');

        $this->assertEquals('blog', Laranext::key());
        $this->assertEquals('blog', Laranext::prefix());
    }

    public function test_it_should_fetch_current_prefix_uri()
    {
        $response = $this->get('/prefix/blog');

        $this->assertEquals('blog', Laranext::key());
        $this->assertEquals('prefix/blog', Laranext::prefix());
    }

    public function test_it_can_register_all_providers()
    {
        Laranext::registerAllProviders();

        $this->assertTrue($this->app->providerIsLoaded(LaranextServiceProvider::class));
        $this->assertTrue($this->app->providerIsLoaded(SiteServiceProvider::class));
        $this->assertTrue($this->app->providerIsLoaded(BlogServiceProvider::class));
        $this->assertTrue($this->app->providerIsLoaded(AdminServiceProvider::class));
        $this->assertTrue($this->app->providerIsLoaded(AdminBlogServiceProvider::class));
        $this->assertTrue($this->app->providerIsLoaded(PrefixAdminServiceProvider::class));
    }

    public function test_it_should_ignore_excluded_routes()
    {
        $this->app->config->set('laranext.excluded_routes', ['blog', 'prefix']);

        $this->get('/blog');
        $this->assertFalse($this->app->providerIsLoaded(BlogServiceProvider::class));

        $this->get('/prefix');
        $this->assertFalse($this->app->providerIsLoaded(PrefixAdminServiceProvider::class));
    }
}
