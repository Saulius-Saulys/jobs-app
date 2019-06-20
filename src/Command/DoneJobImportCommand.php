<?php

namespace App\Command;

use App\Entity\DoneJob;
use App\Entity\Job;
use League\Csv\Reader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DoneJobImportCommand extends Command
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
            ->setName('import:done_jobs')
            ->setDescription('Import jobs from csv');
    }

    protected function  execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Trying to import data from csv');

        $csv = Reader::createFromPath('dumps/done_jobs.csv');
        $headers = $csv->fetchAll();

        $firstLine = true;
        foreach ($headers as $row){
            if ($firstLine == true){
                $firstLine = false;
            }
            else if(isset($row)){
                $doneJobArray = explode(";", $row[0]);
                $doneJob = (new DoneJob())
                    ->setJobId($doneJobArray[1])
                    ->setJobName($doneJobArray[2])
                    ->setRoadSection($doneJobArray[3])
                    ->setRoadSectionBegin((float)$doneJobArray[4])
                    ->setRoadSectionEnd((float)$doneJobArray[5])
                    ->setUnitOf($doneJobArray[6])
                    ->setQuantity((float)$doneJobArray[7])
                    ->setDoneJobDate($doneJobArray[8])
                    ->setSectionId((int)$doneJobArray[9])
                    ->setRoadLevel((int)$doneJobArray[10]);
                $this->em->persist($doneJob);
            }
        }
        $this->em->flush();
        $io->success('Data from csv was successfully imported');
    }
}

?>