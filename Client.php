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
     * Async bulk creation or update of documents in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#bulk_indexing
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param array  $documents      List of documents to index.
     *
     * @return array
     */
    public function asyncBulkCreateOrUpdateDocuments($engineName, $documentTypeId, $documents)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'documents' => $documents,
        ];

        $endpoint = $this->getEndpoint('AsyncBulkCreateOrUpdateDocuments');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Bulk creation of documents in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#bulk_create
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param array  $documents      List of documents to create.
     *
     * @return array
     */
    public function bulkCreateDocuments($engineName, $documentTypeId, $documents)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'documents' => $documents,
        ];

        $endpoint = $this->getEndpoint('BulkCreateDocuments');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Bulk creation or update of documents in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#bulk_create_or_update_verbose
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param array  $documents      List of documents to index.
     *
     * @return array
     */
    public function bulkCreateOrUpdateDocuments($engineName, $documentTypeId, $documents)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'documents' => $documents,
        ];

        $endpoint = $this->getEndpoint('BulkCreateOrUpdateDocuments');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Bulk delete of documents in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#bulk_destroy
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param array  $documents      List of deleted documents external ids.
     *
     * @return array
     */
    public function bulkDeleteDocuments($engineName, $documentTypeId, $documents)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'documents' => $documents,
        ];

        $endpoint = $this->getEndpoint('BulkDeleteDocuments');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Bulk update of documents in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#bulk_update
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param array  $documents      List of documents to update.
     *
     * @return array
     */
    public function bulkUpdateDocuments($engineName, $documentTypeId, $documents)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'documents' => $documents,
        ];

        $endpoint = $this->getEndpoint('BulkUpdateDocuments');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Create a new document in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#add-document
     *
     * @param string $engineName         Name of the engine.
     * @param string $documentTypeId     Document type id.
     * @param string $documentExternalId Document external id.
     * @param array  $documentFields     Document fields.
     *
     * @return array
     */
    public function createDocument($engineName, $documentTypeId, $documentExternalId, $documentFields)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'document.external_id' => $documentExternalId,
            'document.fields' => $documentFields,
        ];

        $endpoint = $this->getEndpoint('CreateDocument');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

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
     * Create or update a document in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#add-document
     *
     * @param string $engineName         Name of the engine.
     * @param string $documentTypeId     Document type id.
     * @param string $documentExternalId Document external id.
     * @param array  $documentFields     Document fields.
     *
     * @return array
     */
    public function createOrUpdateDocument($engineName, $documentTypeId, $documentExternalId, $documentFields)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'document.external_id' => $documentExternalId,
            'document.fields' => $documentFields,
        ];

        $endpoint = $this->getEndpoint('CreateOrUpdateDocument');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Delete a document from the engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#delete-external-id
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param string $externalId     Document external id.
     *
     * @return array
     */
    public function deleteDocument($engineName, $documentTypeId, $externalId)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'external_id' => $externalId,
        ];

        $endpoint = $this->getEndpoint('DeleteDocument');
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
     * Retrieve a document from the engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#document-single
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param string $externalId     Document external id.
     *
     * @return array
     */
    public function getDocument($engineName, $documentTypeId, $externalId)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'external_id' => $externalId,
        ];

        $endpoint = $this->getEndpoint('GetDocument');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    /**
     * Check the status of document receipts issued by aync bulk indexing.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#bulk_create_or_update_verbose
     *
     * @param array $receiptIds List of ids of documents receipts to check.
     *
     * @return array
     */
    public function getDocumentReceipts($receiptIds)
    {
        $params = [
            'ids' => $receiptIds,
        ];

        $endpoint = $this->getEndpoint('GetDocumentReceipts');
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
     * List all documents in an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#document-all
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     *
     * @return array
     */
    public function listDocuments($engineName, $documentTypeId)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
        ];

        $endpoint = $this->getEndpoint('ListDocuments');
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

    /**
     * Run a search request accross an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/searching
     *
     * @param string $engineName          Name of the engine.
     * @param string $queryText           Search query text.
     * @param array  $searchRequestParams Search request parameters.
     *
     * @return array
     */
    public function search($engineName, $queryText, $searchRequestParams = null)
    {
        $params = [
            'engine_name' => $engineName,
            'q' => $queryText,
        ];

        $endpoint = $this->getEndpoint('Search');
        $endpoint->setParams($params);
        $endpoint->setBody($searchRequestParams);

        return $this->performRequest($endpoint);
    }

    /**
     * Run an autocomplete search request accross an engine.
     *
     * Documentation: https://swiftype.com/documentation/site-search/autocomplete
     *
     * @param string $engineName          Name of the engine.
     * @param string $queryText           Search query text.
     * @param array  $searchRequestParams Search request parameters.
     *
     * @return array
     */
    public function suggest($engineName, $queryText, $searchRequestParams = null)
    {
        $params = [
            'engine_name' => $engineName,
            'q' => $queryText,
        ];

        $endpoint = $this->getEndpoint('Suggest');
        $endpoint->setParams($params);
        $endpoint->setBody($searchRequestParams);

        return $this->performRequest($endpoint);
    }

    /**
     * Update fields of a document.
     *
     * Documentation: https://swiftype.com/documentation/site-search/indexing#updating_fields
     *
     * @param string $engineName     Name of the engine.
     * @param string $documentTypeId Document type id.
     * @param string $externalId     Document external id.
     * @param array  $fields         Updated fields.
     *
     * @return array
     */
    public function updateDocumentFields($engineName, $documentTypeId, $externalId, $fields)
    {
        $params = [
            'engine_name' => $engineName,
            'document_type_id' => $documentTypeId,
            'external_id' => $externalId,
            'fields' => $fields,
        ];

        $endpoint = $this->getEndpoint('UpdateDocumentFields');
        $endpoint->setParams($params);

        return $this->performRequest($endpoint);
    }

    // phpcs:enable
}
