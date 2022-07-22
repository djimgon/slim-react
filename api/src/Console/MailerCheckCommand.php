<?php
declare(strict_types=1);

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MailerCheckCommand extends Command
{
    protected function configure(): void
    {
        $this
            ->setName('mailer:check')
            ->setDescription('The user\'s custom command checking the mail program');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Sending!</info>');

        $transport = (new \Swift_SmtpTransport('mailer', 1025))
            ->setUsername('app')
            ->setPassword('secret')
            ->setEncryption('tcp');

        $mailer = new \Swift_Mailer($transport);

        $message = (new \Swift_Message('Join Confirmation'))
            ->setFrom('mail@app.test')
            ->setTo('user@app.test')
            ->setBody('confirm');

        if($mailer->send($message) === 0){
            throw new \RuntimeException('Unable to send Email.');
        }

        $output->writeln('<info>Done!</info>');

        return 0;
    }
}
