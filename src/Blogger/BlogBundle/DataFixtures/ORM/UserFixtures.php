<?php
// src/Blogger/BlogBundle/DataFixtures/ORM/UserFixtures.php
namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use Blogger\BlogBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface
{
    private $container;
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $userManager = $this->container->get('fos_user.user_manager');
        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setEmail('me@example.com');
        $user->setPlainPassword('NoPass4U!');
        $user->setEnabled(true);
        $user->addRole('ROLE_ADMIN');
        $userManager->updateUser($user);
        
        $manager->persist($user);
        $manager->flush();
        $this->addReference('admin-user', $user);
    }
    
    public function getOrder()
    {
        return 1;
    }
}

