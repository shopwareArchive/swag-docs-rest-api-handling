<?php declare(strict_types=1);

namespace Swag\RestApiHandling\Test\Mocks;

use Symfony\Component\Console\Formatter\OutputFormatterInterface;
use Symfony\Component\Console\Output\OutputInterface;

class OutputMock implements OutputInterface
{
    public $writeBuffer = [];

    public function getWritten(): array
    {
        return $this->writeBuffer;
    }

    public function write($messages, $newline = false, $options = 0)
    {
        if (!is_array($messages)) {
            $this->writeBuffer[] = $messages;
            return;
        }

        foreach ($messages as $message) {
            $this->writeBuffer[] = $message;
        }
    }

    public function writeln($messages, $options = 0)
    {
        if (!is_array($messages)) {
            $this->writeBuffer[] = $messages;
            return;
        }

        foreach ($messages as $message) {
            $this->writeBuffer[] = $message;
        }
    }

    public function setVerbosity($level)
    {
        // TODO: Implement setVerbosity() method.
    }

    public function getVerbosity()
    {
        // TODO: Implement getVerbosity() method.
    }

    public function isQuiet()
    {
        // TODO: Implement isQuiet() method.
    }

    public function isVerbose()
    {
        // TODO: Implement isVerbose() method.
    }

    public function isVeryVerbose()
    {
        // TODO: Implement isVeryVerbose() method.
    }

    public function isDebug()
    {
        // TODO: Implement isDebug() method.
    }

    public function setDecorated($decorated)
    {
        // TODO: Implement setDecorated() method.
    }

    public function isDecorated()
    {
        // TODO: Implement isDecorated() method.
    }

    public function setFormatter(OutputFormatterInterface $formatter)
    {
        // TODO: Implement setFormatter() method.
    }

    public function getFormatter()
    {
        // TODO: Implement getFormatter() method.
    }
}
