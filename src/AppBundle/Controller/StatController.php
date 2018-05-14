<?php
/**
 * Created by PhpStorm.
 * User: grin
 * Date: 13.05.2018
 * Time: 17:35
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

use Doctrine\ORM\EntityManagerInterface;

class StatController extends Controller
{
    /**
     * @Route("/stat")
     */
    public function indexAction(EntityManagerInterface $em)
    {
        $config = new \Doctrine\ORM\Configuration();
        $config->addCustomStringFunction('DATE', 'DoctrineExtensions\Query\MySql\Date');
        $config->addCustomStringFunction('DAYOFYEAR', 'DoctrineExtensions\Query\MySql\DayOfYear');


    //test 1
        $startDate = date( 'Y-m-' ) . '01'; // First day in current month
        $endDate   = date( 'Y-m-t' ); // Last day in current month


        $qb = $em->createQueryBuilder();
        $qb->select('u.city, COUNT(u.id) cnt')
            ->from('AppBundle:User', 'u')
            ->where( 'u.registerdate >= :startDate' )
            ->andWhere( 'u.registerdate <= :endDate' )
            ->groupBy('u.city')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
        ;
        $query = $qb->getQuery();
        $test1_users = $query->getResult();

    //test 2
        $day = date('w');
        $startDate  = date('Y-m-d', strtotime('-'.$day.' days'));
        $endDate    = date('Y-m-d', strtotime('+'.(6-$day).' days'));


        $qb = $em->createQueryBuilder();
        $qb->select('COUNT(u.id) cnt, DATE(u.lastLogin) dateLogin')
            ->from('AppBundle:User', 'u')
            ->where( 'u.lastLogin >= :startDate' )
            ->andWhere( 'u.lastLogin <= :endDate' )
            ->groupBy('dateLogin')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
        ;
        $query = $qb->getQuery();
        $test2_result = $query->getResult();

        $i = 0;
        $test2_users = [];
        for ($d = $startDate; $d <= $endDate; $d++) {
            $cnt = 0;
            if (isset($test2_result[$i])) {
                if ($test2_result[$i]["dateLogin"] == $d) {
                    $cnt = $test2_result[$i]["cnt"];
                    $i++;
                }
            }
            $test2_users[] = ["cnt" => $cnt, "dateLogin" => $d];
        }
    //test 3


    //test 4
        $startDate  = date('z', strtotime('-3 days'));
        $endDate    = date('z', strtotime('+7 days'));


        $qb = $em->createQueryBuilder();
        $qb->select('u.firstname, u.lastname, u.birthdate')
            ->from('AppBundle:User', 'u')
            ->where( 'DAYOFYEAR(u.birthdate) >= :startDate' )
            ->andWhere( 'DAYOFYEAR(u.birthdate) <= :endDate' )
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
        ;
        $query = $qb->getQuery();
        $test4_users = $query->getResult();


        return $this->render('default/stat.html.twig', [
            'test1_month' =>  date( 'F Y' ),
            'test1_users' => $test1_users,

            'test2_users' => $test2_users,

            'test4_users' => $test4_users,
        ]
        );
    }
}