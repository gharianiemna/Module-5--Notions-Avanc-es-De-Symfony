<?php

namespace App\Command;
use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Repository\UserRepository;
use App\Entity\User;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;


class SendEmailsCommand extends Command
{
    protected static $defaultName = 'SendEmails';
    protected static $defaultDescription = 'Sends Emails to users';
    private $userRepository;
    

    public function __construct(UserRepository $userRepository, MailerInterface $mailer )
    {
        parent::__construct(null);
        $this->userRepository = $userRepository;
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

    protected function execute(InputInterface $input, OutputInterface $output ): int
    {
        $io = new SymfonyStyle($input, $output);

        $users = $this->userRepository
        ->findUsersNotAdmin('admin@admin.com');
        $io->progressStart(count($users));
        foreach ($users as $user) {
            $io->progressAdvance();
            $Address=$user->getEmail();
            $Name=$user->getUsername();
            $email = (new Email())
            ->from('admin@admin.com')
            ->to($Address)
            ->subject('Bonjour')
            ->text('Bonjour, Nous vous souhaitons une agréable journée')
            ->html('Bonjour '.$Name.', Nous vous souhaitons une agréable journée');
             sleep(10); 
             $this->mailer->send($email);
        }
        $io->progressFinish();
        $io->success(' Email sent to users!');
        return 0;
       
    }

}
