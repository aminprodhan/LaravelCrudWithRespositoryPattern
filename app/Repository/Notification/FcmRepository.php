<?php
    namespace App\Repository\Notification;
    use App\Interfaces\Notification\FcmInterface;
    use Illuminate\Support\Facades\Http;

    class FcmRepository implements FcmInterface{
        public function sendNotification(array $device_ids=[],$body=[]){
            $url = 'https://fcm.googleapis.com/fcm/send';
            //$FcmToken = User::whereNotNull('device_key')->pluck('device_key')->all();
            $serverKey = 'AAAAuUkQJMo:APA91bHw6fyxj7BEBs9BGYrxkr_iBe9jbYnULr8obbV1Av5en9zUdY7fMsRvoZbBFbOiuTD-Rrou9yABWUvVtIbuXZHIJHp1WpV8FLHePyooWFNFyrj8PGsKbUCtAax0fVCf4CuK4NUP';
            $data = [
                "registration_ids" => $device_ids,
                "notification" => $body
            ];

            $headers = [
                'Authorization:key=' . $serverKey,
                'Content-Type: application/json',
            ];
            $encodedData = json_encode($data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            // Disabling SSL Certificate support temporarly
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
            // Execute post
            $result = curl_exec($ch);
            if ($result === FALSE) {
                die('Curl failed: ' . curl_error($ch));
            }
            // Close connection
            curl_close($ch);
            return $result;
        }
    }
?>
