<?php declare(strict_types=1);

namespace Swag\RestApiHandling\Command;

use Swag\RestApiHandling\Service\RestService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ApiInteractionCommand extends Command
{
    /**
     * @var RestService
     */
    private $restService;

    public function __construct(RestService $restService)
    {
        $this->restService = $restService;

        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setName('swag:api:example')
            ->setDescription('This is an example of how to work with the API');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('What are the names of the names of all deliveryTime entities');

        $response = $this->restService->request('GET', 'delivery-time');

        $body = json_decode($response->getBody()->getContents(), true);

        foreach ($body['data'] as $deliveryTime) {
            $output->writeln($deliveryTime['attributes']['name']);
        }
    }
}
