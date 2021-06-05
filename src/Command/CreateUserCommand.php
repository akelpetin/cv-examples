<?php

namespace App\Command;

use App\Entity\Company;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class CreateUserCommand
 *
 * @package App\Command
 */
class CreateUserCommand extends Command
{

    protected static $defaultName = 'app:create-user';

    private EntityManagerInterface $entityManager;

    /**
     * CreateUserCommand constructor.
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        // This is only an example

        $company = new Company();
        $company->setName('Test Company');
        $this->entityManager->persist($company);
        $this->entityManager->flush();

        $user = new User();
        $user->setFirstname('Max');
        $user->setLastname('Mustermann');
        $user->setEmail('max.mustermann@email.com');
        $user->setCompany($company);
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $output->writeln('<info>User created!</info>');

        return Command::SUCCESS;
    }
}