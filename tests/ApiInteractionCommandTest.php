<?php declare(strict_types=1);

namespace Swag\RestApiHandling\Test;

use PHPUnit\Framework\TestCase;
use Shopware\Core\Framework\Test\Api\ApiVersioning\Tests\ApiVersioningTestBehaviour;
use Shopware\Core\Framework\Test\TestCaseBase\IntegrationTestBehaviour;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Swag\RestApiHandling\Command\ApiInteractionCommand;
use Symfony\Component\Console\Tester\CommandTester;

class ApiInteractionCommandTest extends TestCase
{
    use IntegrationTestBehaviour;
    use ApiVersioningTestBehaviour;

    public function test_execute(): void
    {
        /** @var SystemConfigService $configService */
        $configService = $this->getContainer()->get(SystemConfigService::class);
        $configService->set('RestApiHandling.config.username', 'admin');
        $configService->set('RestApiHandling.config.password', 'shopware');
        $configService->set('RestApiHandling.config.scope', 'read');

        /** @var ApiInteractionCommand $command */
        $command = $this->getContainer()->get(ApiInteractionCommand::class);

        $commandTester = new CommandTester($command);
        $commandTester->execute([]);

        $expected = [
            'What are the names of all deliveryTime entities',
            '1-2 weeks',
            '1-3 days',
            '2-5 days',
            '3-4 weeks',
        ];

        $result = $commandTester->getDisplay();
        $result = array_filter(explode("\n", $result));
        foreach ($result as $index => $line) {
            static::assertSame($expected[$index], $line);
        }

        static::assertCount(\count($expected), $result);
    }
}
