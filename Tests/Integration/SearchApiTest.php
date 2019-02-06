<?php
/**
 * This file is part of the Swiftype Site Search PHP Client package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Swiftype\SiteSearch\Tests\Integration;

/**
 * Integration tests for the Search API.
 *
 * @package Swiftype\SiteSearch\Test\Integration
 *
 * @author  Aurélien FOUCRET <aurelien.foucret@elastic.co>
 */
class ClientApiTest extends AbstractClientTestCase
{
    /**
     * Test the search API with simple searches and pagination.
     *
     * @param string  $docType
     * @param string  $queryText
     * @param integer $currentPage
     * @param integer $pageSize
     *
     * @testWith ["page", ""]
     *           ["page", "search engine"]
     *           ["page", "search engine", 1, 3]
     *           ["page", "noresultsearch", 1, 3]
     */
    public function testSimpleSearch($docType, $queryText, $currentPage = null, $pageSize = null)
    {
        $client = $this->getDefaultClient();
        $engine = $this->getDefaultEngineName();
        $searchParams = ['per_page' => $pageSize, 'page' => $currentPage, "document_types" => [$docType]];
        $searchResponse = $client->search($engine, $queryText, $searchParams);

        $this->assertEmpty($searchResponse['errors']);
        $this->assertArrayHasKey('info', $searchResponse);
        $this->assertArrayHasKey($docType, $searchResponse['info']);
        $this->assertEquals($queryText, $searchResponse['info'][$docType]['query']);

        if ($pageSize) {
            $this->assertEquals($pageSize, $searchResponse['info'][$docType]['per_page']);
        }

        if ($currentPage) {
            $this->assertEquals($currentPage, $searchResponse['info'][$docType]['current_page']);
        }

        $expectedRecords = min(
            $searchResponse['info'][$docType]['per_page'],
            $searchResponse['info'][$docType]['total_result_count']
        );

        $this->assertArrayHasKey('records', $searchResponse);
        $this->assertArrayHasKey($docType, $searchResponse['records']);
        $this->assertCount($expectedRecords, $searchResponse['records'][$docType]);
    }

    /**
     * @return string
     */
    protected static function getDefaultEngineName()
    {
        return 'kb-demo';
    }
}
