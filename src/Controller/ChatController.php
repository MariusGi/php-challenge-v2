<?php

namespace App\Controller;

use App\Entity\ChatMessages;
use App\Form\ChatMessageType;
use App\Jurgis;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChatController extends AbstractController
{
    /**
     * @Route("/", name="chat", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $chatMessages = new ChatMessages();
        $form = $this->createForm(ChatMessageType::class, $chatMessages);
        $responseMessage = '';

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $jurgis = new Jurgis();

            $requestMessage = $chatMessages->getRequestMessage();
            $currentDateTime = new DateTime();
            $responseMessage = $jurgis->responds($requestMessage);

            $entityManager = $this->getDoctrine()->getManager();
            $chatMessages->setResponseMessage($responseMessage);
            $chatMessages->setSendDatetime($currentDateTime);

            $entityManager->persist($chatMessages);
            $entityManager->flush();
        }

        return $this->render('chat/index.html.twig', [
            'form' => $form->createView(),
            'responseMessage' => $responseMessage,
        ]);
    }
}
