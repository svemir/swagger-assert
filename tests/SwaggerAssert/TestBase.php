<?php
namespace SwaggerAssert;

/**
 * Class AnnotationTestBase
 *
 * @package SwaggerAssert
 */
class TestBase extends \PHPUnit_Framework_TestCase
{
    /**
     * fixtureを読み込む
     *
     * @param string $fileName
     * @return array
     */
    protected function fixture($fileName)
    {
        $fileContent = file_get_contents(__DIR__ . "/../fixture/$fileName.json");

        return json_decode($fileContent, true);
    }
}
