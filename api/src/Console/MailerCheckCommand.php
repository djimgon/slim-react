<?php
declare(strict_types=1);

namespace App\Console;

use App\Auth\Entity\User\Email;
use App\Auth\Entity\User\Token;
use App\Auth\Service\JoinConfirmationSender;
use Ramsey\Uuid\Uuid;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MailerCheckCommand extends Command
{
    private JoinConfirmationSender $sender;

    public function __construct(JoinConfirmationSender $sender)
    {
        parent::__construct();
        $this->sender = $sender;
    }

    protected function configure(): void
    {
        $this
            ->setName('mailer:check')
            ->setDescription('The user\'s custom command checking the mail program');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('<info>Sending!</info>');

        $this->sender->send(
            new Email('user@app.test'),
            new Token(Uuid::uuid4()->toString(), new \DateTimeImmutable())
        );

        $output->writeln('<info>Done!</info>');

        return 0;
    }
}
