<?php
/**
 * This file is part of the Elastic Site Search PHP Client package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Elastic\SiteSearch\Client\Tests\Integration;

use Elastic\OpenApi\Codegen\Exception\NotFoundException;

/**
 * Integrations test for the Engine API.
 *
 * @package Elastic\SiteSearch\Client\Test\Integration
 */
class EngineApiTest extends AbstractClientTestCase
{
    /**
     * @var array
     */
    private $engines = [];

    /**
     * Delete the engines created during the test.
     */
    public function tearDown()
    {
        foreach ($this->engines as $engineName) {
            try {
                $this->getDefaultClient()->deleteEngine($engineName);
            } catch (NotFoundException $e) {
                // The engine have already been deleted. Nothing to do.
            }
        }
        $this->engines = [];
    }

    /**
     * This test run the following scenario:
     * - Create a new engine and check the name in the return.
     * - Retrieve this engine and test name and the language.
     * - Try to list the engines and check the new engine is present in the entries.
     * - Delete the engine and check the result.
     *
     * @param string $language Engine language.
     *
     * @testWith ["en"]
     *           [null]
     */
    public function testApiMethods($language)
    {
        $client = $this->getDefaultClient();
        $engineName = $this->getEngineName(__METHOD__, func_get_args());

        $engine = $client->createEngine($engineName, $language);
        $this->assertArrayHasKey('slug', $engine);
        $this->engines[] = $engine['slug'];

        $engine = $client->getEngine($engineName);
        $this->assertEquals($engineName, $engine['name']);
        $this->assertEquals($language, $engine['language']);

        $engineList = $client->listEngines(1, 20);
        $this->assertContains($engine, $engineList);

        $client->deleteEngine($engineName);
    }

    /**
     * Try to get a non existing engine.
     *
     * @expectedException \Elastic\OpenApi\Codegen\Exception\NotFoundException
     */
    public function testGetNonExistingEngine()
    {
        $this->getDefaultClient()->getEngine('some-non-existing-engine');
    }

    /**
     * Try to delete a non existing engine.
     *
     * @expectedException \Elastic\OpenApi\Codegen\Exception\NotFoundException
     */
    public function testDeleteNonExistingEngine()
    {
        $this->getDefaultClient()->getEngine('some-non-existing-engine');
    }

    /**
     * Try to create an already existing engine.
     *
     * @expectedException \Elastic\OpenApi\Codegen\Exception\BadRequestException
     */
    public function testCreateAlreadyExistingEngine()
    {
        $engineName = $this->getEngineName(__METHOD__);
        $this->engines[] = $engineName;

        $this->getDefaultClient()->createEngine($engineName);
        $this->getDefaultClient()->createEngine($engineName);
    }

    private function getEngineName($method, $params = [])
    {
        $nameParts = [$this->getDefaultEngineName()];

        $methodParts = explode(':', $method);
        $nameParts[] = strtolower(end($methodParts));

        $nameParts = array_merge($nameParts, array_filter($params));

        return implode('-', $nameParts);
    }
}
