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
     * Create a new document type in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#add-documenttype
     *
     * @param string $engineName       Name of the engine.
     * @param string $documentTypeName Document type name.
     *
     * @return array
     */
    public function createDocumentType($engineName, $documentTypeName)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type.name' => $documentTypeName,
        ];

        $endpoint = $this->getEndpoint('CreateDocumentType');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

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
     * Delete a document type by id.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#documenttypes-delete
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     *
     * @return array
     */
    public function deleteDocumentType($engineName, $documentTypeId)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
        ];

        $endpoint = $this->getEndpoint('DeleteDocumentType');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Delete an engine by name.
     *
     * Documentation: https://swiftype.com/documentation/site-search/engines#destroy
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
     * Get a document type by id.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#documenttypes-single
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     *
     * @return array
     */
    public function getDocumentType($engineName, $documentTypeId)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
        ];

        $endpoint = $this->getEndpoint('GetDocumentType');
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
     * List all document types for an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#documenttypes-all
     *
     * @param string $engineName Name of the engine.
     *
     * @return array
     */
    public function listDocumentTypes($engineName)
    {
        $params = [
            'engine_name' => $engineName,
        ];

        $endpoint = $this->getEndpoint('ListDocumentTypes');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Retrieves all engines with optional pagination support.
     *
     * Documentation: https://swiftype.com/documentation/site-search/engines#list
     *
     * @param string $currentPage The page to fetch. Defaults to 1.
     * @param string $pageSize    The number of results per page.
     *
     * @return array
     */
    public function listEngines($currentPage = null, $pageSize = null)
    {
        $params = [
            'page' => $currentPage,
            'per_page' => $pageSize,
        ];

        $endpoint = $this->getEndpoint('ListEngines');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    // phpcs:enable
}
