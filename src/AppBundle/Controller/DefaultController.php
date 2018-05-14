<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

//     /**
//     * @Route("/register", name="register")
//     */
//    public function registerAction(Request $request, EntityManagerInterface $em) {
//
//        $user = new User();
//        $user->setFirstname('fn');
//        $user->setLastname('ln');
//        $user->setEmail('testem@email.ru');
//        $user->setCity('Москва');
//        $user->setCountry('Россия');
//
//        $form = $this->createForm(UserType::class, $user);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//// $form->getData() holds the submitted values
//// но первоначальная переменная $task тоже была обновлена
//            $user = $form->getData();
//
//// ... . выполните действия, такие как сохранение задачи в базе данных
//// например, если User является сущностью Doctrine, сохраните его!
////            $em->persist($task);
////            $em->flush();
//
////            return $this->redirectToRoute('reg_success');
//
//        }
//
//        return $this->render('default/register.html.twig', array(
//            'form' => $form->createView(),
//        ));
//
//    }
}
