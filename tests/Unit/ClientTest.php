<?php

namespace Sebdesign\VivaPayments\Test\Unit;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use Sebdesign\VivaPayments\Client;
use Sebdesign\VivaPayments\Enums\Environment;
use Sebdesign\VivaPayments\Test\TestCase;
use Sebdesign\VivaPayments\VivaException;

/** @covers \Sebdesign\VivaPayments\Client */
class ClientTest extends TestCase
{
    /**
     * @test
     */
    public function it_gets_the_demo_url(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $url = $client->withEnvironment(Environment::Demo)->getUrl();

        $this->assertEquals(Client::DEMO_URL, $url, 'The URL should be '.Client::DEMO_URL);
    }

    /**
     * @test
     */
    public function it_gets_the_production_url(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $url = $client->withEnvironment(Environment::Production)->getUrl();

        $this->assertEquals(Client::PRODUCTION_URL, $url, 'The URL should be '.Client::PRODUCTION_URL);
    }

    /**
     * @test
     */
    public function it_gets_the_demo_accounts_url(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $url = $client->withEnvironment(Environment::Demo)->getAccountsUrl();

        $this->assertEquals(Client::DEMO_ACCOUNTS_URL, $url, 'The URL should be '.Client::DEMO_ACCOUNTS_URL);
    }

    /**
     * @test
     */
    public function it_gets_the_production_accounts_url(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $url = $client->withEnvironment(Environment::Production)->getAccountsUrl();

        $this->assertEquals(Client::PRODUCTION_ACCOUNTS_URL, $url, 'The URL should be '.Client::PRODUCTION_ACCOUNTS_URL);
    }

    /**
     * @test
     */
    public function it_gets_the_demo_api_url(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $url = $client->withEnvironment(Environment::Demo)->getApiUrl();

        $this->assertEquals(Client::DEMO_API_URL, $url, 'The URL should be '.Client::DEMO_API_URL);
    }

    /**
     * @test
     */
    public function it_gets_the_production_api_url(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $url = $client->withEnvironment(Environment::Production)->getApiUrl();

        $this->assertEquals(Client::PRODUCTION_API_URL, $url, 'The URL should be '.Client::PRODUCTION_API_URL);
    }

    /**
     * @test
     */
    public function it_authenticates_with_basic_auth(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $basic = $client->authenticateWithBasicAuth();

        $this->assertEquals(config('services.viva.merchant_id'), $basic['auth'][0]);
        $this->assertEquals(config('services.viva.api_key'), $basic['auth'][1]);
    }

    /**
     * @test
     */
    public function it_sets_the_basic_auth_credentials(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $client->withBasicAuthCredentials('foo', 'bar');

        $basic = $client->authenticateWithBasicAuth();

        $this->assertEquals(['foo', 'bar'], $basic['auth']);
    }

    /**
     * @test
     *
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_authenticates_with_bearer_token(): void
    {
        /** @var Client */
        $client = $this->app?->make(Client::class);

        $bearer = $client->withToken('foo')->authenticateWithBearerToken();

        $this->assertEquals([
            'headers' => ['Authorization' => 'Bearer foo'],
        ], $bearer);
    }

    /**
     * @test
     *
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_sets_the_oauth_credentials(): void
    {
        $this->mockJsonResponses([
            'access_token' => 'eyJhbGciOiJSUzI1NiIsImtpZCI6IjBEOEZCOEQ2RURFQ0Y1Qzk3RUY1MjdDMDYxNkJCMjMzM0FCNjVGOUYiLCJ0eXAiOiJKV1QiLCJ4NXQiOiJEWS00MXUzczljbC05U2ZBWVd1eU16cTJYNTgifQ.eyJuYmYiOjE1NjAxNTc4MDQsImV4cCI6MTU2MDE2MTQwNCwiaXNzIjoiaHR0cHM6Ly9kZW1vLWFjY291bnRzLnZpdmFwYXltZW50cy5jb20iLCJhdWQiOlsiaHR0cHM6Ly9kZW1vLWFjY291bnRzLnZpdmFwYXltZW50cy5jb20vcmVzb3VyY2VzIiwiY29yZV9hcGkiXSwiY2xpZW50X2lkIjoiZ2VuZXJpY19hY3F1aXJpbmdfY2xpZW50LmFwcHMudml2YXBheW1lbnRzLmNvbSIsInNjb3BlIjpbInVybjp2aXZhOnBheW1lbnRzOmNvcmU6YXBpOmFjcXVpcmluZyIsInVybjp2aXZhOnBheW1lbnRzOmNvcmU6YXBpOmFjcXVpcmluZzpjYXJkcyIsInVybjp2aXZhOnBheW1lbnRzOmNvcmU6YXBpOmFjcXVpcmluZzpjYXJkczp0b2tlbnMiXX0.GNjeRJhQQir3M_rqvjC0C9Up_pA2AFxlv9dhpr-7C-Lk0Xr5gJyGwgb0BD7Bvp2Oku-CjgG8tqE0s8KaWGHYIqGQyFJIUWiHWMejRKRqkuzt128NbThX7f4w-tN6DoyP1EouDhBsMs5BwrxOkbkIXtSjBxkE7jEOrRJ4YNAv-DjuDsPtAjC0cTLEDQBnMHLHAE-c2XHJ84I9WLFnOUX6-lwdwWuefv5o6BpvfNFC6y0mR-DcAi9KE82jRFVoY5G7xY6HQnS6RqaNDC5ifhdZKZcpgUxxdPTIWpS5L2F81RXsoMq3BSAWqvwuNeT8QTWDvtAsv_fgUABs06P7-slnvg',
            'expires_in' => 3600,
            'token_type' => 'Bearer',
            'scope' => 'urn:viva:payments:core:api:test',
        ]);
        $this->mockRequests();

        $client = $this->client;

        $client->withOAuthCredentials('foo', 'bar')->oauth()->requestToken();

        $request = $this->getLastRequest();

        $this->assertHeader('Authorization', 'Basic '.base64_encode('foo:bar'), $request);
    }

    /**
     * @test
     *
     * @covers \Sebdesign\VivaPayments\VivaException
     *
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_throws_an_exception_when_it_cannot_decode_an_invalid_response(): void
    {
        $this->mockResponses([new Response(body: 'invalid')]);

        $this->expectException(VivaException::class);
        $this->expectExceptionMessage('Invalid response');

        $this->client->get('test');
    }

    /**
     * @test
     *
     * @covers \Sebdesign\VivaPayments\VivaException
     *
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_throws_an_exception_when_it_cannot_decode_a_response(): void
    {
        $this->mockResponses([new Response(body: 'null')]);

        $this->expectException(VivaException::class);
        $this->expectExceptionMessage('Invalid response');

        $this->client->get('test');
    }

    /**
     * @test
     *
     * @throws \JsonException
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_decodes_a_json_response(): void
    {
        $json = json_encode([
            'ErrorCode' => 0,
            'ErrorText' => 'No errors.',
        ], JSON_THROW_ON_ERROR);

        $this->mockResponses([
            new Response(body: $json),
        ]);

        $response = $this->client->get('test');

        $this->assertEquals(json_decode($json, associative: true), $response, 'The JSON response was not decoded.');
    }

    /**
     * @test
     *
     * @covers \Sebdesign\VivaPayments\VivaException
     *
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_throws_an_exception_when_the_response_has_errors(): void
    {
        $this->mockJsonResponses([
            'ErrorCode' => 1,
            'ErrorText' => 'Some error occurred.',
        ]);

        $this->expectException(VivaException::class);

        $this->client->get('error');
    }

    /**
     * @test
     *
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_sends_a_get_request(): void
    {
        $body = ['foo' => 'bar'];

        $this->mockJsonResponses($body);
        $this->mockRequests();

        $response = $this->client->get('test', ['query' => ['key' => 'value']]);

        $request = $this->getLastRequest();

        $this->assertMethod('GET', $request);
        $this->assertPath('test', $request);
        $this->assertQuery('key', 'value', $request);
        $this->assertEquals($body, $response);
    }

    /**
     * @test
     *
     * @throws GuzzleException
     * @throws VivaException
     */
    public function it_sends_a_post_request(): void
    {
        $body = ['foo' => 'bar'];

        $this->mockJsonResponses($body);
        $this->mockRequests();

        $response = $this->client->post('test', ['json' => ['key' => 'value']]);

        $request = $this->getLastRequest();

        $this->assertMethod('POST', $request);
        $this->assertPath('test', $request);
        $this->assertJsonBody('key', 'value', $request);
        $this->assertEquals($body, $response);
    }
}
