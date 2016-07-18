<?php
/**
 * slince template collector library
 * @author Tao <taosikai@yeah.net>
 */
namespace Slince\Runner;

use Slince\Runner\Command\GoCommand;
use Slince\Runner\Command\RunCommand;
use Slince\Runner\Command\ValidateCommand;
use Symfony\Component\Console\Application;

class CommandUI
{
    /**
     * 默认的应用
     * @var string
     */
    const DEFAULT_COMMAND_NAME = 'go';

    /**
     * 创建command
     * @return array
     */
    static function createCommands()
    {
        return [
            new ValidateCommand(),
            new GoCommand(),
            new RunCommand()
        ];
    }

    /**
     * command应用主入口
     * @throws \Exception
     */
    static function main()
    {
        $application = new Application();
        $application->addCommands(self::createCommands());
        $application->setDefaultCommand(self::DEFAULT_COMMAND_NAME);
        $application->run();
    }
}