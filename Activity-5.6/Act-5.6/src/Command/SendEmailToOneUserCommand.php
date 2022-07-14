<?php

namespace App\Command;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\User;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;

class SendEmailToOneUserCommand extends Command
{
    protected static $defaultName = 'SendEmailToOneUser';
    protected static $defaultDescription = 'Add a short description for your command';

    

    public function __construct(MailerInterface $mailer )
    {
        parent::__construct(null);
    
        $this->mailer=$mailer;
    }
    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }
            $io = new SymfonyStyle($input, $output);
            $io->progressStart();
            $io->progressAdvance();
      
            $email = (new Email())
            ->from('admin@admin.com')
            ->to($arg1)
            ->subject('Bonjour')
            ->text('Bonjour Bienvenue a talan Academy ')
            ->html('Bonjour Bienvenue a talan Academy ');
             sleep(5); 
             $this->mailer->send($email);
        
        $io->progressFinish();
        $io->success('Email sent to users!');
        return 0;
    }
}
