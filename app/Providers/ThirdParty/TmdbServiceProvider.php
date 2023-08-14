<?php
declare(strict_types=1);

namespace App\Providers\ThirdParty;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Support\DeferrableProvider;
use Tmdb\Client;
use Tmdb\Event\BeforeRequestEvent;
use Tmdb\Event\Listener\Request\AcceptJsonRequestListener;
use Tmdb\Event\Listener\Request\ApiTokenRequestListener;
use Tmdb\Event\Listener\Request\ContentTypeJsonRequestListener;
use Tmdb\Event\Listener\Request\UserAgentRequestListener;
use Tmdb\Event\Listener\RequestListener;
use Tmdb\Event\RequestEvent;
use Tmdb\Token\Api\BearerToken;
use Symfony\Component\EventDispatcher\EventDispatcher;

class TmdbServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            Client::class,
            function (Application $application) {
                $token = new BearerToken(config('services.tmdb.key'));
                $eventDispatcher = $application->make(EventDispatcher::class);

                $client = new Client(
                    [
                        'api_token' => $token,
                        'event_dispatcher' => [
                            'adapter' => $eventDispatcher
                        ],
                        'http' => [
                            'client' => null,
                            'request_factory' => null,
                            'response_factory' => null,
                            'stream_factory' => null,
                            'uri_factory' => null,
                        ]
                    ]
                );

                $requestListener = new RequestListener($client->getHttpClient(), $eventDispatcher);
                $eventDispatcher->addListener(RequestEvent::class, $requestListener);

                $apiTokenListener = new ApiTokenRequestListener($client->getToken());
                $eventDispatcher->addListener(BeforeRequestEvent::class, $apiTokenListener);

                $acceptJsonListener = new AcceptJsonRequestListener();
                $eventDispatcher->addListener(BeforeRequestEvent::class, $acceptJsonListener);

                $jsonContentTypeListener = new ContentTypeJsonRequestListener();
                $eventDispatcher->addListener(BeforeRequestEvent::class, $jsonContentTypeListener);

                $userAgentListener = new UserAgentRequestListener();
                $eventDispatcher->addListener(BeforeRequestEvent::class, $userAgentListener);

                return $client;
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            Client::class,
        ];
    }
}
