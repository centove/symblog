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
        $user->setName('dsyph3r');
        $user->setEmail('me@example.com');
        $user->setPlainPassword('NoPass4U!');
        $user->setEnabled(true);
        $user->addRole('ROLE_ADMIN');
        $userManager->updateUser($user);
        
        $manager->persist($user);
        
        $zero = $userManager->createUser();
        $zero->setUsername('blogger');
        $zero->setName('Zero Cool');
        $zero->setEmail('zero@example.com');
        $zero->setPlainPassword('FireFix-');
        $zero->setEnabled(true);
        $userManager->updateUser($zero);
        $manager->persist($zero);
        
        $gabriel = $userManager->createUser();
        $gabriel->setUsername('g-blogger');
        $gabriel->setName('Gabriel');
        $gabriel->setEmail('gabriel@example.com');
        $gabriel->setPlainPassword('Disabled.');
        $gabriel->setEnabled(false);
        $userManager->updateUser($gabriel);
        $manager->persist($gabriel);
        
        $kevin = $userManager->createUser();
        $kevin->setUsername('k-blogger');
        $kevin->setName('Kevin Flynn');
        $kevin->setEmail('kevin@example.com');
        $kevin->setPlainPassword('Disabled.');
        $kevin->setEnabled(false);
        $userManager->updateUser($kevin);
        $manager->persist($kevin);
        
        $gary = $userManager->createUser();
        $gary->setUsername('gw-blogger');
        $gary->setName('Gary Winston');
        $gary->setEmail('gary@example.com');
        $gary->setPlainPassword('Disabled.');
        $gary->setEnabled(false);
        $userManager->updateUser($gary);
        $manager->persist($gary);
        
        $manager->flush();
        $this->addReference('admin-user', $user);
        $this->addReference('zero-user', $zero);
        $this->addReference('gabriel-user', $gabriel);
        $this->addReference('kevin-user', $kevin);
        $this->addReference('gary-user', $gary);
        
    }
    
    public function getOrder()
    {
        return 1;
    }
}

