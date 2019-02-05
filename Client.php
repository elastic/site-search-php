<?php
/**
 * This file is part of the Swiftype PHP Client package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swiftype\SiteSearch;

/**
 * Client implementation.
 *
 * @package Swiftype
 *
 * @author  Aurélien FOUCRET <aurelien.foucret@elastic.co>
 */
class Client extends \Swiftype\AbstractClient
{
    // phpcs:disable

    /**
     * Create a new API based engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/engines#create
     *
     * @param string $engineName     Engine name.
     * @param string $engineLanguage Engine languager (null for universal).
     *
     * @return array
     */
    public function createEngine($engineName, $engineLanguage = null)
    {
        $params = [
            'engine.name' => $engineName,
            'engine.language' => $engineLanguage,
        ];

        $endpoint = $this->getEndpoint('CreateEngine');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Delete an engine by name.
     *
     * Documentation: https://swiftype.com/documentation/app-search/api/engines#delete
     *
     * @param string $engineName Name of the engine.
     *
     * @return array
     */
    public function deleteEngine($engineName)
    {
        $params = [
            'engine_name' => $engineName,
        ];

        $endpoint = $this->getEndpoint('DeleteEngine');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Retrieves an engine by name.
     *
     * Documentation: https://swiftype.com/documentation/site-search/engines#one-engine
     *
     * @param string $engineName Name of the engine.
     *
     * @return array
     */
    public function getEngine($engineName)
    {
        $params = [
            'engine_name' => $engineName,
        ];

        $endpoint = $this->getEndpoint('GetEngine');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Retrieves all engines with optional pagination support.
     *
     * Documentation: https://swiftype.com/documentation/site-search/engines#list
     *
     * @param string $page    The page to fetch. Defaults to 1.
     * @param string $perPage The number of results per page.
     *
     * @return array
     */
    public function listEngines($page = null, $perPage = null)
    {
        $params = [
            'page' => $page,
            'per_page' => $perPage,
        ];

        $endpoint = $this->getEndpoint('ListEngines');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    // phpcs:enable
}
