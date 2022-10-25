<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/', name: 'app_search')]

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_searched')]
    public function index(): Response
    {

        $con = mysqli_connect("127.0.0.1", "root", "nico85300", "ecf");

        if (!$con) {
            echo "connexion échouée" . mysqli_connect_error();
        }

        if (isset($_POST['input'])) {

            $input = $_POST['input'];

            $query = "SELECT * FROM user WHERE id LIKE '{$input}%' OR name LIKE '{$input}%' OR email LIKE '{$input}%' LIMIT 5";

            $result = mysqli_query($con, $query);


            if (mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);



                /*$id = $row['id'];
                $name = $row['name'];
                $email = $row['email'];
                $roles = $row['roles'];*/


                return $this->render(
                    'search/search.html.twig',
                    [
                        'row' => $row,
                        'result' => $result
                    ]

                );
            };
        };
    }
};
