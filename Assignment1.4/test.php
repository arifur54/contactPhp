<?php
function update_contact($id)
{
    $data = read_csv('contract_data.csv');
    $fileOpen = fopen('contract_data.csv', 'r+');
    foreach($data as $row){
        if($id == $row[0]){
            $data[] = array(
                'sr_no' => $row[0],
                'Title' => $row[1],
                'FirstName' => $row[2],
                'LastName' => $row[3],
                'email' => $row[4],
                'website' => $row[5],
                'CellPhoneNumber' => $row[6],
                'HomePhoneNumber' => $row[7],
                'OfficePhoneNumber' => $row[8],
                'twitter' => $row[9],
                'Facebook' => $row[10],
                'Comment' => $row[11]
            );

        }
    }
    fclose($fileOpen);
    return $data;
}
