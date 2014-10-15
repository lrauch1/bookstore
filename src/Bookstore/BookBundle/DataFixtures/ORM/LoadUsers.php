<?php
namespace Bookstore\BookBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bookstore\BookBundle\Entity\User;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadEvents implements FixtureInterface, ContainerAwareInterface
{
    private $container;
    
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('tony');
        $user->setPassword($this->encodePassword($user, "pass"));
        $user->setEmail("nope@fake.com");
        $user->setIsActive(true);
        $manager->persist($user);
        $manager->flush();
    }
    public function setContainer(ContainerInterface $container=null) {
        $this->container=$container;
    }
    private function encodePassword(User $user, $plainPassword) {
        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }
}