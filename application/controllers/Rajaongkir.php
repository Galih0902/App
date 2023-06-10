<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{

    private $api_key = 'ad6f75cae274cc79ae3d0cd18aba96e5';

    public function provinsi()
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);
            echo "<option hidden>Pilih Provinsi</option>";
            $data_provinsi = $array_response['rajaongkir']['results'];
            foreach ($data_provinsi as $key => $value) {
                echo "<option value='" . $value['province_id'] . "' id_provinsi='" . $value['province_id'] . "'>" . $value['province'] . "</option>";
            }
        }
    }

    public function kota()
    {
        $provinsi_set = $this->input->post('id_provinsi');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $provinsi_set,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            echo "<option hidden>Pilih Kota</option>";
            $data_kota = $array_response['rajaongkir']['results'];
            foreach ($data_kota as $key => $value) {
                echo "<option value='" . $value['city_name'] . "'>" . $value['city_name'] . "</option>";
            }
        }
    }

    public function ekspedisi()
    {
        echo "<option hidden>Pilih Ekspedisi</option>";
        echo "<option value='JNE'>JNE</option>";
        echo "<option value='Pos Indonesia'>POS</option>";
        echo "<option value='Tiki'>TIKI</option>";
        echo "<option value='J&E Express'>JNE Express</option>";
        // echo "<option value='SICEPAT'>Sicepat</option>";
        // echo "<option value='ANTERAJA'>Anteraja</option>";
        // echo "<option value='GO-SEND'>Gojek</option>";
        // echo "<option value='GRAB-SEND'>Grab</option>";
    }
    public function biaya_pengiriman()
    {
        $origin = $this->input->post('origin');
        $destination = $this->input->post('destination');
        $weight = $this->input->post('weight');
        $courier = $this->input->post('courier');

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $origin . "&destination=" . $destination . "&weight=" . $weight . "&courier=" . $courier,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            $data_cost = $array_response['rajaongkir']['results'][0]['costs'];
            foreach ($data_cost as $key => $value) {
                echo "<option value='" . $value['service'] . "'>" . $value['service'] . " - " . $value['description'] . "</option>";
            }
        }
    }
}
