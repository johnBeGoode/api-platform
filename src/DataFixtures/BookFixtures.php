<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 20; $i++) { 
            $book = new Book();
            $book->setTitle('Title' . $i);
            $book->setAuthor('Author '.$i);
            $book->setIsbn('928-92-95055-02-'.$i);
            $book->setSummary('Summary '.$i);
            $book->setPublicationDate(new \DateTime('2017-08-31 00:00:00'));
            $book->setCreatedAt(new \DateTime('now'));
            $book->setUpdatedAt(new \DateTime('now'));

            $manager->persist($book);
        }
   
        $manager->flush();
    }
}
