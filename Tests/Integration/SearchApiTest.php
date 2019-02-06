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
     * @param string $docType
     * @param string $queryText
     * @param int    $currentPage
     * @param int    $pageSize
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

        $searchParams = ['per_page' => $pageSize, 'page' => $currentPage, 'document_types' => [$docType]];

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
     * Test using a search boost inside the search query.
     */
    public function testBoostedSearch()
    {
        $client = $this->getDefaultClient();
        $engine = $this->getDefaultEngineName();

        $searchParams = ['functional_boosts' => ['page' => ['votes' => 'logarithmic']]];

        $searchResponse = $client->search($engine, 'search engine', $searchParams);

        $this->assertEmpty($searchResponse['errors']);
    }

    /**
     * Test using a search sort order inside the search query.
     *
     * @param string $sortField
     * @param string $sortDirection
     *
     * @testWith ["votes", "desc"]
     *           ["title", "desc"]
     */
    public function testSortedSearch($sortField, $sortDirection = 'asc')
    {
        $client = $this->getDefaultClient();
        $engine = $this->getDefaultEngineName();

        $searchParams = ['sort_field' => ['page' => $sortField], 'sort_direction' => ['page' => $sortDirection]];

        $searchResponse = $client->search($engine, 'search engine', $searchParams);

        $this->assertEmpty($searchResponse['errors']);
    }

    /**
     * Test using a search sort order inside the search query.
     * Run filtered query to check the doc count is consistent.
     *
     * @param string $facetField
     *
     * @testWith ["type"]
     */
    public function testFacetedSearch($facetField)
    {
        $client = $this->getDefaultClient();
        $engine = $this->getDefaultEngineName();

        $searchParams = ['facets' => ['page' => [$facetField]]];

        $searchResponse = $client->search($engine, 'search engine', $searchParams);

        $this->assertEmpty($searchResponse['errors']);
        $this->assertNotEmpty($searchResponse['info']['page']['facets'][$facetField]);

        $filterValues = array_slice($searchResponse['info']['page']['facets'][$facetField], 0, 10);

        foreach ($filterValues as $filterValue => $docCount) {
            $filteredSearchParams = ['filters' => ['page' => [$facetField => $filterValue]]];

            $filteredSearchResponse = $client->search($engine, 'search engine', $filteredSearchParams);

            $this->assertEmpty($filteredSearchResponse['errors']);
            $this->assertEquals($docCount, $filteredSearchResponse['info']['page']['total_result_count']);
        }
    }

    /**
     * @return string
     */
    protected static function getDefaultEngineName()
    {
        return 'kb-demo';
    }
}
