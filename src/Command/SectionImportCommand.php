<?php


namespace App\Command;

use App\Entity\RoadSection;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Bridge\PhpUnit\TextUI\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class SectionImportCommand extends \Symfony\Component\Console\Command\Command
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
    }

    protected function configure()
    {
        $this
            ->setName('import:section')
            ->setDescription('Import jobs from csv');
    }
    protected function  execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Trying to import data from csv');

        $csv = Reader::createFromPath('dumps/road_section.csv');
        $headers = $csv->fetchAll();

        $firstLine = true;
        foreach ($headers as $row){
            if ($firstLine == true){
                $firstLine = false;
            }
            else{
                $sectionArray = explode(";", $row[0]);
                $job = (new RoadSection())
                    ->setSectionId($sectionArray[1])
                    ->setSectionName($sectionArray[2])
                    ->setUnitId(substr($sectionArray[3], 1, -1))
                    ->setSectionBegin(substr($sectionArray[4], 1, -1))
                    ->setSectionEnd(substr($sectionArray[5], 1, -1))
                    ->setLevel(substr($sectionArray[6], 1, -1));
                $this->em->persist($job);

            }
        }
        $this->em->flush();
        $io->success('Data from csv was successfully imported');
    }
}