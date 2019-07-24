<?php
/**
 * This file is part of the Elastic Site Search PHP Client package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elastic\SiteSearch\Client\Connection\Handler;

use GuzzleHttp\Ring\Core;
use Elastic\OpenApi\Codegen\Exception\ApiException;
use Elastic\OpenApi\Codegen\Exception\AuthenticationException;
use Elastic\OpenApi\Codegen\Exception\BadRequestException;
use Elastic\OpenApi\Codegen\Exception\NotFoundException;

/**
 * This handler manage server side errors and throw comprehensive exceptions to the user.
 *
 * @package Elastic\SiteSearch\Client\Connection\Handler
 */
class ApiErrorHandler
{
    /**
     * @var callable
     */
    private $handler;

    /**
     * Constructor.
     *
     * @param callable $handler original handler
     */
    public function __construct(callable $handler)
    {
        $this->handler = $handler;
    }

    /**
     * Proxy the response and throw an exception if a http error is detected.
     *
     * @param array $request request
     *
     * @return array
     */
    public function __invoke($request)
    {
        $handler = $this->handler;
        $response = Core::proxy($handler($request), function ($response) use ($request) {
            if ($response['status'] >= 400) {
                $exception = new ApiException($this->getErrorMessage($response));
                switch ($response['status']) {
                    case 401:
                    case 403:
                        $exception = new AuthenticationException($exception->getMessage());
                        break;
                    case 404:
                        $exception = new NotFoundException($exception->getMessage());
                        break;
                    case 400:
                        $exception = new BadRequestException($exception->getMessage());
                        break;
                }

                throw $exception;
            }

            return $response;
        });

        return $response;
    }

    /**
     * Process the error message from the response body.
     *
     * @param array $response
     *
     * @return string
     */
    private function getErrorMessage($response)
    {
        $message = isset($response['reason']) ? $response['reason'] : 'Unexpected error.';

        if (!empty($response['body']['errors'])) {
            $message = $response['body']['errors'];
        } elseif (!empty($response['body']['error'])) {
            $message = $response['body']['error'];
        }

        return is_array($message) ? implode(' ', $message) : $message;
    }
}
