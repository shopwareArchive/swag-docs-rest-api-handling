<?php declare(strict_types=1);

namespace Swag\RestApiHandling\Test;

use Doctrine\DBAL\Connection;
use PHPUnit\Framework\TestCase;
use Shopware\Core\Framework\Test\Api\ApiVersioning\Tests\ApiVersioningTestBehaviour;
use Shopware\Core\Framework\Test\TestCaseBase\IntegrationTestBehaviour;
use Swag\RestApiHandling\Command\ApiInteractionCommand;
use Swag\RestApiHandling\Test\Mocks\InputMock;
use Swag\RestApiHandling\Test\Mocks\OutputMock;

class ApiInteractionCommandTest extends TestCase
{
    use IntegrationTestBehaviour;
    use ApiVersioningTestBehaviour;

    public function test_execute(): void
    {
        $this->getContainer()->get(Connection::class)->exec(file_get_contents(__DIR__ . '/_fixtures/config.sql'));

        /** @var ApiInteractionCommand $command */
        $command = $this->getContainer()->get(ApiInteractionCommand::class);

        $input = new InputMock();
        $output = new OutputMock();

        $method = (new \ReflectionClass(ApiInteractionCommand::class))->getMethod('execute');
        $method->setAccessible(true);

        $method->invoke($command, $input, $output);

        $expected = [
            'What are the names of all deliveryTime entities',
            '1-3 days',
            '2-5 days',
            '3-4 weeks',
            '1-2 weeks',
        ];

        $result = $output->getWritten();
        foreach ($result as $index => $line) {
            static::assertSame($expected[$index], $line);
        }

        static::assertCount(count($expected), $result);
    }
}
