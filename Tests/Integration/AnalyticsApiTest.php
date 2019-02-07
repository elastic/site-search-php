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
class AnalyticsApiTest extends AbstractClientTestCase
{
    /**
     * Test for the searches count API endpoint.
     */
    public function testGetSearchesCount()
    {
        $searchesByDate = self::getDefaultClient()->getSearchCountAnalytics(self::getDefaultEngineName());

        foreach ($searchesByDate as list($date, $count)) {
            $this->assertNotFalse(\DateTime::createFromFormat('Y-m-d', $date));
            $this->assertInternalType('int', $count);
        }
    }

    /**
     * Test for the top queries API endpoint.
     */
    public function testGetTopQueries()
    {
        $topQueries = self::getDefaultClient()->getTopQueriesAnalytics(self::getDefaultEngineName());

        foreach ($topQueries as list($queryText, $count)) {
            $this->assertInternalType('string', $queryText);
            $this->assertInternalType('int', $count);
        }
    }

    /**
     * Test for the top no result queries API endpoint.
     */
    public function testGetTopNoResultQueriesNoResult()
    {
        $topQueries = self::getDefaultClient()->getTopNoResultQueriesAnalytics(self::getDefaultEngineName());

        foreach ($topQueries as list($queryText, $count)) {
            $this->assertInternalType('string', $queryText);
            $this->assertInternalType('int', $count);
        }
    }

    /**
     * Test for the top no result queries API endpoint.
     */
    public function testGetClicksCount()
    {
        $clicksByDate = self::getDefaultClient()->getClicksCountAnalytics(self::getDefaultEngineName());

        foreach ($clicksByDate as list($date, $count)) {
            $this->assertNotFalse(\DateTime::createFromFormat('Y-m-d', $date));
            $this->assertInternalType('int', $count);
        }
    }

    /**
     * Test for the top no result queries API endpoint.
     */
    public function testGetAutoselectsCount()
    {
        $autoselectByDate = self::getDefaultClient()->getAutoselectsCountAnalytics(self::getDefaultEngineName());

        foreach ($autoselectByDate as list($date, $count)) {
            $this->assertNotFalse(\DateTime::createFromFormat('Y-m-d', $date));
            $this->assertInternalType('int', $count);
        }
    }

    /**
     * Test calling the log clickthrough API.
     */
    public function testLogClickthrough()
    {
        $client = self::getDefaultClient();
        $engine = self::getDefaultEngineName();

        $searchResponse = $client->search($engine, 'search engine');
        $clickRecord = current($searchResponse['records']['page']);

        $this->assertEmpty($client->logClickthrough($engine, 'page', $clickRecord['external_id'], 'search engine'));
    }

    /**
     * @return string
     */
    protected static function getDefaultEngineName()
    {
        return 'kb-demo';
    }
}
