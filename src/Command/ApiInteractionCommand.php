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

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('What are the names of all deliveryTime entities');

        $response = $this->restService->request('GET', 'delivery-time?sort=name');
//        $response = $this->restService->request('POST', '/delivery-time', [
//            'name' => 'api call',
//            'min' => 1,
//            'max' => 5,
//            'unit' => 'month'
//        ]);

        $body = json_decode($response->getBody()->getContents(), true);

        foreach ($body['data'] as $deliveryTime) {
            $output->writeln($deliveryTime['attributes']['name']);
        }

        return 0;
    }
}
