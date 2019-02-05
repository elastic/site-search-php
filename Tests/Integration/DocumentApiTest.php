<?php
/**
 * This file is part of the Swiftype Site Search PHP Client package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swiftype\SiteSearch\Tests\Integration;

/**
 * Integrations test for the Document API.
 *
 * @package Swiftype\SiteSearch\Test\Integration
 *
 * @author  Aurélien FOUCRET <aurelien.foucret@elastic.co>
 */
class DocumentApiTest extends AbstractEngineTestCase
{
    /**
     * Test the document type API.
     */
    public function testDocumentTypeApi()
    {
        $client = $this->getDefaultClient();
        $engine = $this->getDefaultEngineName();

        $this->assertArrayHasKey('id', $client->createDocumentType($engine, 'document-type'));

        $documentType = $client->getDocumentType($engine, 'document-type');
        $this->assertArrayHasKey('id', $documentType);
        $this->assertEquals('document-type', $documentType['name']);

        $documentTypes = $client->listDocumentTypes($engine);
        $this->assertCount(1, $documentTypes);

        $client->deleteDocumentType($engine, 'document-type');
    }
}
