<?php

namespace Orchestra\Testbench\Dusk;

use Exception;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Illuminate\Foundation\Application;
use Laravel\Dusk\DuskServiceProvider;
use Orchestra\Testbench\Dusk\Foundation\PackageManifest;
use Orchestra\Testbench\Dusk\Options as DuskOptions;
use Orchestra\Testbench\TestCase as Testbench;

abstract class TestCase extends Testbench
{
    use Concerns\CanServeSite;
    use Concerns\InteractsWithWebDriverOptions;
    use Concerns\ProvidesBrowser;

    /**
     * The base serve host URL to use while testing the application.
     *
     * @var string
     */
    protected static $baseServeHost = '127.0.0.1';

    /**
     * The base serve port to use while testing the application.
     *
     * @var int
     */
    protected static $baseServePort = 8001;

    /**
     * Keep track of whether we've registered shutdown function.
     *
     * @var bool
     */
    protected static $hasRegisteredShutdown = false;

    /**
     * The base server port.
     *
     * @return int
     */
    public static function getBaseServePort()
    {
        return static::$baseServePort;
    }

    /**
     * The base server host.
     *
     * @return string
     */
    public static function getBaseServeHost()
    {
        return static::$baseServeHost;
    }

    /**
     * Get Application's base path.
     *
     * @return string
     */
    public static function applicationBasePath()
    {
        return static::applicationBasePathUsingWorkbench() ?? realpath(__DIR__.'/../laravel');
    }

    /**
     * Get Application's base URL.
     *
     * @var string
     *
     * @return string
     */
    public static function applicationBaseUrl()
    {
        return sprintf('http://%s:%d', static::getBaseServeHost(), static::getBaseServePort());
    }

    /**
     * Determine the application's base URL.
     *
     * @var string
     *
     * @return string
     *
     * @deprecated To be removed on 7.0.0, use static::applicationBaseUrl() instead.
     */
    public static function baseServeUrl()
    {
        return static::applicationBaseUrl();
    }

    /**
     * Register the base URL with Dusk.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->setUpTheBrowserEnvironment();
        $this->registerShutdownFunction();
    }

    /**
     * Determine trait should be ignored from being autoloaded.
     *
     * @param  class-string  $use
     * @return bool
     */
    protected function setUpTheTestEnvironmentTraitToBeIgnored(string $use): bool
    {
        return \in_array($use, [
            Concerns\CanServeSite::class,
            Concerns\InteractsWithWebDriverOptions::class,
            Concerns\ProvidesBrowser::class,
            \Laravel\Dusk\Concerns\ProvidesBrowser::class,
            \Laravel\Dusk\Chrome\SupportsChrome::class,
        ]) || parent::setUpTheTestEnvironmentTraitToBeIgnored($use);
    }

    /**
     * Get application providers.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return array<int, class-string>
     */
    protected function getApplicationProviders($app)
    {
        $providers = parent::getApplicationProviders($app);

        if (! \in_array(DuskServiceProvider::class, $providers)) {
            array_push($providers, DuskServiceProvider::class);
        }

        return $providers;
    }

    /**
     * Setup parallel testing callback.
     */
    protected function setUpParallelTestingCallbacks(): void
    {
        // Not supported at the moment.
    }

    /**
     * Teardown parallel testing callback.
     */
    protected function tearDownParallelTestingCallbacks(): void
    {
        // Not supported at the moment.
    }

    /**
     * Make sure we close down any chrome processes when we temrinate early, unlike normal
     * Dusk, we also close down all the server processes - so keeping the chome browser
     * open doesn't help, nor does it help when we're running in headless mode :).
     *
     * @return void
     */
    protected function registerShutdownFunction()
    {
        if (! static::$hasRegisteredShutdown) {
            register_shutdown_function(function () {
                $this->closeAll();
            });

            static::$hasRegisteredShutdown = true;
        }
    }

    /**
     * Get base path.
     *
     * @return string
     */
    protected function getBasePath()
    {
        return static::applicationBasePath();
    }

    /**
     * Resolve application implementation.
     *
     * @return \Illuminate\Foundation\Application
     */
    protected function resolveApplication()
    {
        return tap(new Application($this->getBasePath()), function ($app) {
            $app->bind(
                'Illuminate\Foundation\Bootstrap\LoadConfiguration',
                Bootstrap\LoadConfiguration::class
            );

            PackageManifest::swap($app, $this);
        });
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver(): RemoteWebDriver
    {
        static::defineWebDriverOptions();

        if (DuskOptions::shouldUsesWithoutUI()) {
            DuskOptions::withoutUI();
        } elseif ($this->hasHeadlessDisabled()) {
            DuskOptions::withUI();
        }

        return RemoteWebDriver::create(
            $_ENV['DUSK_DRIVER_URL'] ?? 'http://localhost:9515',
            DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY,
                DuskOptions::getChromeOptions()
            )
        );
    }

    /**
     * Determine the application's base URL.
     *
     * @var string
     *
     * @return string
     */
    protected function baseUrl()
    {
        return static::applicationBaseUrl();
    }

    /**
     * Get a callback that returns the default user to authenticate.
     *
     * @return callable
     *
     * @throws \Exception
     */
    protected function user()
    {
        throw new Exception('User resolver has not been set.');
    }

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    public static function prepare()
    {
        static::startChromeDriver(['port' => 9515]);
    }

    /**
     * Begin a server for the tests.
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        static::startServing();
    }

    /**
     * Kill our server.
     *
     * @return void
     *
     * @codeCoverageIgnore
     */
    public static function tearDownAfterClass(): void
    {
        static::stopServing();

        parent::tearDownAfterClass();
    }

    /**
     * Determine whether the Dusk command has disabled headless mode.
     *
     * @return bool
     *
     * @codeCoverageIgnore
     */
    protected function hasHeadlessDisabled()
    {
        return (isset($_SERVER['DUSK_HEADLESS_DISABLED']) && $_SERVER['DUSK_HEADLESS_DISABLED'] == true)
            || (isset($_ENV['DUSK_HEADLESS_DISABLED']) && $_ENV['DUSK_HEADLESS_DISABLED'] == true);
    }
}
