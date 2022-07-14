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

class SendEmailAuthCommand extends Command
{
    protected static $defaultName = 'SendEmailAuth';
    protected static $defaultDescription = 'Add a short description for your command';

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_REQUIRED, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->progressStart();
        $io->progressAdvance();
        $arg1 = $input->getArgument('arg1');
        $optionValue = $input->getOption('option1');
        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
      
        if ($input->getOption('option1')) {
if (  'inscription '=== $optionValue) {
    $email = (new Email())
            ->from('admin@admin.com')
            ->to($arg1)
            ->subject('Bonjour')
            ->text('Bonjour '. $arg1 .' nous vous remercions pour votre inscription sur notre site ')
            ->html('Bonjour '. $arg1 .' nous vous remercions pour votre inscription sur notre site ');
             sleep(5); 
             $this->mailer->send($email);
} else if(  'connexion '=== $optionValue) {
$email = (new Email())
            ->from('admin@admin.com')
            ->to($arg1)
            ->subject('Bonjour')
            ->text('Bonjour  '. $arg1 .'votre compte est maintenant activé  ')
            ->html('Bonjour '. $arg1 .' vous remercions pour votre inscription sur notre site ');
             sleep(5); 
             $this->mailer->send($email);
}else {
return 0;
}

        }
  }

    $io->progressFinish();
        $io->success('Email sent to users!');

        return 0;
    }
}
