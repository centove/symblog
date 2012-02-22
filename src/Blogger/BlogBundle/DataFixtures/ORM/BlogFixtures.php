<?php

namespace Blogger\BlogBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Blogger\BlogBundle\Entity\Blog;

class BlogFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(\Doctrine\Common\Persistence\ObjectManager $manager)
    {
        $blog1 = new Blog();
        $blog1->setTitle('A day with Symfony2');
        $blog1->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing eletra electrify denim vel ports.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ut velocity magna. Etiam vehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras el mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis, justo mauris lacinia libero, non facilisis purus ipsum non mi. Aliquam sollicitudin, augue id vestibulum iaculis, sem lectus convallis nunc, vel scelerisque lorem tortor ac nunc. Donec pharetra eleifend enim vel porta.');
        $blog1->setImage('beach.jpg');
        $blog1->setAuthor($this->getReference('admin-user'));
        $blog1->setTags('symfony2, php, paradise, symblog');
        $blog1->setCreated(new \DateTime());
        $blog1->setUpdated($blog1->getCreated());
        $manager->persist($blog1);

        $blog2 = new Blog();
        $blog2->setTitle('The pool on the roof must have a leak');
        $blog2->setBlog('Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Na. Cras elementum molestie vestibulum. Morbi id quam nisl. Praesent hendrerit, orci sed elementum lobortis.');
        $blog2->setImage('pool_leak.jpg');
        $blog2->setAuthor($this->getReference('zero-user'));
        $blog2->setTags('pool, leaky, hacked, movie, hacking, symblog');
        $blog2->setCreated(new \DateTime("2011-07-23 06:12:33"));
        $blog2->setUpdated($blog2->getCreated());
        $manager->persist($blog2);

        $blog3 = new Blog();
        $blog3->setTitle('Misdirection. What the eyes see and the ears hear, the mind believes');
        $blog3->setBlog('Lorem ipsumvehicula nunc non leo hendrerit commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog3->setImage('misdirection.jpg');
        $blog3->setAuthor($this->getReference('gabriel-user'));
        $blog3->setTags('misdirection, magic, movie, hacking, symblog');
        $blog3->setCreated(new \DateTime("2011-07-16 16:14:06"));
        $blog3->setUpdated($blog3->getCreated());
        $manager->persist($blog3);

        $blog4 = new Blog();
        $blog4->setTitle('The grid - A digital frontier');
        $blog4->setBlog('Lorem commodo. Vestibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque. Nulla consectetur tempus nisl vitae viverra.');
        $blog4->setImage('the_grid.jpg');
        $blog4->setAuthor($this->getReference('kevin-user'));
        $blog4->setTags('grid, daftpunk, movie, symblog');
        $blog4->setCreated(new \DateTime("2011-06-02 18:54:12"));
        $blog4->setUpdated($blog4->getCreated());
        $manager->persist($blog4);

        $blog5 = new Blog();
        $blog5->setTitle('You\'re either a one or a zero. Alive or dead');
        $blog5->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog5->setImage('one_or_zero.jpg');
        $blog5->setAuthor($this->getReference('gary-user'));
        $blog5->setTags('binary, one, zero, alive, dead, !trusting, movie, symblog');
        $blog5->setCreated(new \DateTime("2011-04-25 15:34:18"));
        $blog5->setUpdated($blog5->getCreated());
        $manager->persist($blog5);

        $blog6 = new Blog();
        $blog6->setTitle('You\'re either a one or a zero. Alive or dead');
        $blog6->setBlog('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tempor sodales neque, quis pharetra lectus viverra eget. Sed sit amet enim ac arcu cursus tempus. Donec vitae purus urna. Maecenas at magna congue dolor elementum mollis. Aliquam diam leo, luctus a viverra vel, gravida vitae purus. Duis vitae dictum justo. Phasellus venenatis odio ut orci scelerisque bibendum. Integer velit magna, sodales a tristique sit amet, mollis ac lectus. Nullam non ligula volutpat ligula laoreet rhoncus et eleifend eros. Sed felis mi, lobortis a feugiat eu, congue ac libero. Praesent id est tellus, non feugiat erat.

Integer et quam ac nunc dignissim eleifend id ac elit. Donec id sapien quam. Suspendisse purus metus, viverra eu adipiscing non, convallis ac velit. Pellentesque facilisis gravida velit sit amet condimentum. Cras nulla orci, ornare ac cursus egestas, accumsan ut neque. Suspendisse imperdiet leo in lectus ultricies id ultrices dolor commodo. Morbi et augue at nunc ultrices fringilla. Ut non nunc velit. Fusce vitae ipsum id libero rhoncus vehicula ullamcorper vel mauris. Proin mauris ipsum, blandit sed ullamcorper ut, facilisis a risus. Suspendisse placerat, nibh vel commodo mollis, nulla orci tristique risus, vel auctor elit lorem sit amet dolor. Nunc sit amet sem eget tellus vestibulum tempor ac id nulla. Donec dignissim suscipit dui in bibendum.

Lorem ipsum dolor sit amet, consectetur adipiscing elittibulum vulputate mauris eget erat congue dapibus imperdiet justo scelerisque.');
        $blog6->setImage('one_or_zero.jpg');
        $blog6->setAuthor($this->getReference('admin-user'));
        $blog6->setTags('binary, one, zero, alive, dead, !trusting, movie, symblog');
        $blog6->setCreated(new \DateTime("2011-03-25 15:30:18"));
        $blog6->setUpdated($blog6->getCreated());
        $manager->persist($blog6);
        
        $manager->flush();
        
        $this->addReference('blog-1', $blog1);
        $this->addReference('blog-2', $blog2);
        $this->addReference('blog-3', $blog3);
        $this->addReference('blog-4', $blog4);
        $this->addReference('blog-5', $blog5);
        $this->addReference('blog-6', $blog6);
    }
    
    public function getOrder()
    {
        return 2;
    }
}
