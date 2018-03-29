<?php

namespace App\Command;

use App\Manager\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends Command
{
    /**
     * @var UserManager
     */
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('app:create-user')
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user')
            ->addArgument('email', InputArgument::REQUIRED, 'The username of the user.')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('User Creator');

        if(!$io->confirm('Create a new User with email : ' . $input->getArgument('email') . ' ?', true)){
            $io->note('Action canceled');
            return;
        };

        $io->section('Create the User');
        $this->userManager->saveUserFromEmailAndPlainPassword($input->getArgument('email'), $input->getArgument('password'));
        $io->note('Finish.');
    }
}
