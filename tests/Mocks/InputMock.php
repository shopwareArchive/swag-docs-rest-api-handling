<?php declare(strict_types=1);

namespace Swag\RestApiHandling\Test\Mocks;

use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;

class InputMock implements InputInterface
{
    public function getFirstArgument()
    {
        // TODO: Implement getFirstArgument() method.
    }

    public function hasParameterOption($values, $onlyParams = false)
    {
        // TODO: Implement hasParameterOption() method.
    }

    public function getParameterOption($values, $default = false, $onlyParams = false)
    {
        // TODO: Implement getParameterOption() method.
    }

    public function bind(InputDefinition $definition)
    {
        // TODO: Implement bind() method.
    }

    public function validate()
    {
        // TODO: Implement validate() method.
    }

    public function getArguments()
    {
        // TODO: Implement getArguments() method.
    }

    public function getArgument($name)
    {
        // TODO: Implement getArgument() method.
    }

    public function setArgument($name, $value)
    {
        // TODO: Implement setArgument() method.
    }

    public function hasArgument($name)
    {
        // TODO: Implement hasArgument() method.
    }

    public function getOptions()
    {
        // TODO: Implement getOptions() method.
    }

    public function getOption($name)
    {
        // TODO: Implement getOption() method.
    }

    public function setOption($name, $value)
    {
        // TODO: Implement setOption() method.
    }

    public function hasOption($name)
    {
        // TODO: Implement hasOption() method.
    }

    public function isInteractive()
    {
        // TODO: Implement isInteractive() method.
    }

    public function setInteractive($interactive)
    {
        // TODO: Implement setInteractive() method.
    }
}
