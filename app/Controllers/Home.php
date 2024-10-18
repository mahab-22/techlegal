<?php

namespace App\Controllers;
use App\Models\Debtor;
use \Config\Database;
class Home extends BaseController
{
    public function __construct()
    {
        helper(['curl', 'print']);

    }
    public function index(): string
    {
        return view('welcome_message');
    }
    public function getGledgeMovableProperty(): string
    {
        $LastName = trim($this->request->getPost('LastName'));
        $FirstName = trim($this->request->getPost('FirstName'));
        $MiddleName = trim($this->request->getPost('MiddleName'));
        $debtor_name_array = [$LastName, $FirstName, $MiddleName];
        $response = curl_get($debtor_name_array);
        print_notifications($response);
        return 'ok';
    }

    public function updateDebtorGledgeMovableProperty(): void
    {
        /* В задании указано получать именно четыре атрибута, поэтому QueryBuilder */
        ini_set('display_errors', '1');
        $db = Database::connect();
        $debtors = $db->table('debtor')
            ->select(['lastname','firstname', 'secondname',  'birthdate'])
            ->get()
            ->getResultArray();
        foreach ($debtors as $debtor) {
            $response = curl_get([$debtor['lastname'],$debtor['firstname'],$debtor['secondname']]);
            if ($response['pledgors'][0]['privatePerson']['birthday'] === $debtor['birthdate']) {
                $db->table('debtorGledgeMovableProperty')
                    ->insert([
                        'property'              => $response['properties'][0]['vehicleProperty']['vin'],
                        'notification_number'   => $response['id'],
                        'registration_data'     => $response['regDate'],
                        'notification_text'     => json_encode($response)
                    ]);
            }
            print_notifications($response);
        }
    }
}
