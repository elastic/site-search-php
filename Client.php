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
     * Retrieves all engines with optional pagination support.
     *
     * Documentation: https://swiftype.com/documentation/app-search/api/engines#list
     *
     *
     * @return array
     */
    public function listEngines()
    {
        $endpoint = $this->getEndpoint('ListEngines');

        return $this->performRequest($endpoint);
    }

    // phpcs:enable
}
