<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;


class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
        
            TextField::new('userName'),
            TextField::new('Email'),
            NumberField::new('Age'),
            TextField::new('Adress'),
            TextField::new('Password'),
            ArrayField::new('roles'),

        ];
    }

    public function configureCrud(Crud $crud): Crud
{
    return $crud
        ->setPaginatorPageSize(10)
    ;
}

//  public function sendEmail(MailerInterface $mailer): Response
//     {   
//         $email = (new Email())
//             ->from('admin@admin.com')
//             ->to('you@example.com')
//             //->cc('cc@example.com')
//             //->bcc('bcc@example.com')
//             //->replyTo('fabien@example.com')
//             //->priority(Email::PRIORITY_HIGH)
//             ->subject('Time for Symfony Mailer!')
//             ->text('Sending emails is fun again!')
//             ->html('<p>See Twig integration for better HTML integration!</p>');

//         $mailer->send($email);

//         // ...
//     }
}
