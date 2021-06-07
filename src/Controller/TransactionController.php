<?php

namespace App\Controller;

use App\Entity\Compte;
use App\Entity\Transaction;
use App\Form\TransactionType;
use App\Repository\TransactionRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use phpDocumentor\Reflection\Types\Integer;

/**
 * @Route("/apic")
 */
class TransactionController extends AbstractFOSRestController
{
    /**
     * @Route("/", name="transaction_index", methods={"GET"})
     */
    public function index(TransactionRepository $transactionRepository)
    {
        $transactions = $transactionRepository->findAll();

        return $transactions;
    }

    /**
     * @Route("/new", name="transaction_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $transaction = new Transaction();
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($transaction);
            $entityManager->flush();

            return $this->redirectToRoute('transaction_index');
        }

        return $this->render('transaction/new.html.twig', [
            'transaction' => $transaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transaction_show", methods={"GET"})
     */
    public function show(Transaction $transaction): Response
    {
        return $this->render('transaction/show.html.twig', [
            'transaction' => $transaction,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="transaction_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Transaction $transaction): Response
    {
        $form = $this->createForm(TransactionType::class, $transaction);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('transaction_index');
        }

        return $this->render('transaction/edit.html.twig', [
            'transaction' => $transaction,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="transaction_delete", methods={"POST"})
     */
    public function delete(Request $request, Transaction $transaction): Response
    {
        if ($this->isCsrfTokenValid('delete' . $transaction->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($transaction);
            $entityManager->flush();
        }

        return $this->redirectToRoute('transaction_index');
    }


    /**
     * @Rest\Get(
     *     path = "/transactions/{compte}",
     *     name = "getTransactionByCompte",
     * 

     * 
  
     *     )
     * @Rest\View(
     *     statusCode=200,
     * )
     */
    public function getListTransactionByCompte_id(TransactionRepository $repo, Request $request, Compte $compte)
    {
        $trans = $repo->findBy(['compte' => $compte->getId()]);
        $data = json_decode($request->getContent(),);
        return $data;
    }
    /**
     * @Rest\Get(
     *     path = "/transactions",
     *     name = "getTransactionByCompte",
     * 

     * 
  
     *     )
     * @Rest\View(
     *     statusCode=200,
     * )
     */
    public function getListTransaction(TransactionRepository $repo, Request $request, Compte $compte)
    {
        $trans = $repo->findAll();
        $data = json_decode($request->getContent(),);
        return $trans;
    }
}
