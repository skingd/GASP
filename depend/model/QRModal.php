<?php
class QRModal{

    protected $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function CheckForQREvent($data, $user_id){
        $hodClient->PostRequest($data, HODApps::RECOGNIZE_BARCODES, REQ_MODE::SYNC, 'requestCompletedWithContent');
        function requestCompletedWithContent($response) {
            $response = $response['barcode']['0'];
            $code = $response['barcode_type'] . $response['left'].$response['top'] . $response['width'].$response['height'];
                $result = $this->db->query("SELET trigger_code_id FROM trigger_code WHERE code_code = ".$code.";");
                if(isset($result)){
                    $this->db->query("INSERT INTO unlocked_achievements ('user_id_ach','ach_id_unlocked') VALUES(". $user_id. ", ".$result['trigger_code_id'].");");
                }
            }
        }


/*
    public function AddQREvent($data, $user_id){
        $hodClient->PostRequest($data, HODApps::RECOGNIZE_BARCODES, REQ_MODE::SYNC, 'requestCompletedWithContent');
        function requestCompletedWithContent($response) {
            $response = $response['barcode']['0'];
            $code = $response['barcode_type'] . $response['left'].$response['top'] . $response['width'].$response['height'];
                //$result = $this->db->query("INSERT INTO ('','','')");
        }
    }
*/

        }

?>
