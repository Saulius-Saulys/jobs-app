<?php

namespace App\Command;

use App\Entity\Job;
use League\Csv\Reader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class JobImportCommand extends Command
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
            ->setName('import:job')
            ->setDescription('Import jobs from csv');
    }

    protected function  execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Trying to import data from csv');

        $csv = Reader::createFromPath('dumps/job.csv');
        $headers = $csv->fetchAll();

        $firstLine = true;
        foreach ($headers as $row){
            if ($firstLine == true){
                $firstLine = false;
            }
            else{
                $jobArray = explode(";", $row[0]);
                $job = (new Job())
                    ->setJobId($jobArray[1])
                    ->setJobName($jobArray[2])
                    ->setJobQuality($jobArray[3]);
                $this->em->persist($job);

            }
        }
        $this->em->flush();
        $io->success('Data from csv was successfully imported');
    }
}

?>