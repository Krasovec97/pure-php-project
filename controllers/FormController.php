<?php
namespace controllers;

use mysqli;

class FormController
{
    public function displayFormPage()
    {
        return include basePath('/views/form.php');
    }

    public function updateCreateApplications()
    {
        include 'form.php';
    }

    public function displayFormListPage()
    {
        return include basePath('/views/applications.php');
    }

    public function getApplications()
    {
        /** @var mysqli $conn */
        include 'connection.php';

        header("Content-Type: application/json");

        $sql = "SELECT * FROM job_applications";

        $sqlQuery = $conn->query($sql);

        if ($sqlQuery) {
            $response = [
                'success' => true,
                'response' =>  $sqlQuery->fetch_all(MYSQLI_ASSOC)
            ];
        } else {
            $response = [
                'success' => false,
                'error' => 'An error occurred, please try again.'
            ];
        }

        $conn->close();

        echo json_encode($response);
    }

    public function getApplicationDetails(array $params)
    {
        $applicantId = intval($params[0]);
        /** @var mysqli $conn */
        include 'connection.php';

        $sql = "SELECT * FROM job_applications where id = ".$applicantId;

        $user = $conn->query($sql);

        if ($user === false || $user->num_rows === 0) {
            abort(404);
        }

        $data = $user->fetch_assoc();
        $viewFile = 'application_detail';
        echo view($viewFile, $data);
    }
}