<?php
/**
 * This file is part of the Swiftype Site Search PHP Client package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swiftype\SiteSearch\Tests\Integration;

/**
 * Integrations test for the Bulk Document API.
 *
 * @package Swiftype\SiteSearch\Test\Integration
 *
 * @author  Aurélien FOUCRET <aurelien.foucret@elastic.co>
 */
class BulkDocumentApiTest extends AbstractEngineTestCase
{
    /**
     * Test the document type API.
     */
    public function testBulkOperations()
    {
        $client = $this->getDefaultClient();
        $engine = $this->getDefaultEngineName();
        $typeId = self::getDefaultDocumentType();

        $documents = [
            ['external_id' => 'doc1', 'fields' => [['name' => 'title', 'value' => 'Doc 1', 'type' => 'string']]],
            ['external_id' => 'doc2', 'fields' => [['name' => 'title', 'value' => 'Doc 2', 'type' => 'string']]],
        ];
        $bulkResponse = $client->bulkCreateDocuments($engine, $typeId, $documents);
        $this->assertCount(count($documents), $bulkResponse);
        $this->assertNotContains(false, $bulkResponse);
        $this->assertCount(count($documents), $client->listDocuments($engine, $typeId));

        $documents[] = ['external_id' => 'doc3', 'fields' => [['name' => 'title', 'value' => 'Doc 3', 'type' => 'string']]];
        $bulkResponse = $client->bulkCreateOrUpdateDocuments($engine, $typeId, $documents);
        $this->assertCount(count($documents), $bulkResponse);
        $this->assertNotContains(false, $bulkResponse);
        $this->assertCount(count($documents), $client->listDocuments($engine, $typeId));

        $documentUpdates = [
            ['external_id' => 'doc1', 'fields' => ['name' => 'Doc 1 updated']],
            ['external_id' => 'doc2', 'fields' => ['name' => 'Doc 2 updated']],
        ];
        $bulkResponse = $client->bulkCreateOrUpdateDocuments($engine, $typeId, $documentUpdates);
        $this->assertCount(count($documentUpdates), $bulkResponse);
        $this->assertNotContains(false, $bulkResponse);

        $deletedDocIds = array_column($documents, 'external_id');
        $bulkResponse = $client->bulkDeleteDocuments($engine, $typeId, $deletedDocIds);
        $this->assertCount(count($deletedDocIds), $bulkResponse);
        $this->assertNotContains(false, $bulkResponse);
        $this->assertEmpty($client->listDocuments($engine, $typeId));
    }
}
