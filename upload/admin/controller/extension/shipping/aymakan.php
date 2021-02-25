<?php

class ControllerExtensionShippingAymakan extends Controller
{
    private $error = array();

    public function index()
    {
        $this->load->language('extension/shipping/aymakan');

        $this->document->setTitle($this->language->get('heading_title'));

        $this->load->model('setting/setting');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('shipping_aymakan', $this->request->post);

            $this->session->data['success'] = $this->language->get('text_success');

            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true));
        }

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        if (isset($this->error['key'])) {
            $data['error_key'] = $this->error['key'];
        } else {
            $data['error_key'] = '';
        }

        if (isset($this->error['name'])) {
            $data['error_name'] = $this->error['name'];
        } else {
            $data['error_name'] = '';
        }

        if (isset($this->error['email'])) {
            $data['error_email'] = $this->error['email'];
        } else {
            $data['error_email'] = '';
        }

        if (isset($this->error['city'])) {
            $data['error_city'] = $this->error['city'];
        } else {
            $data['error_city'] = '';
        }

        if (isset($this->error['address'])) {
            $data['error_address'] = $this->error['address'];
        } else {
            $data['error_address'] = '';
        }

        if (isset($this->error['telephone'])) {
            $data['error_telephone'] = $this->error['telephone'];
        } else {
            $data['error_telephone'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_home'),
            'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('text_extension'),
            'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true)
        );

        $data['breadcrumbs'][] = array(
            'text' => $this->language->get('heading_title'),
            'href' => $this->url->link('extension/shipping/aymakan', 'user_token=' . $this->session->data['user_token'], true)
        );

        $data['action'] = $this->url->link('extension/shipping/aymakan', 'user_token=' . $this->session->data['user_token'], true);

        $data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);

        if (isset($this->request->post['shipping_aymakan_status'])) {
            $data['shipping_aymakan_status'] = $this->request->post['shipping_aymakan_status'];
        } else {
            $data['shipping_aymakan_status'] = $this->config->get('shipping_aymakan_status');
        }

        if (isset($this->request->post['shipping_aymakan_key'])) {
            $data['shipping_aymakan_key'] = $this->request->post['shipping_aymakan_key'];
        } else {
            $data['shipping_aymakan_key'] = $this->config->get('shipping_aymakan_key');
        }

        if (isset($this->request->post['shipping_aymakan_collection_name'])) {
            $data['shipping_aymakan_collection_name'] = $this->request->post['shipping_aymakan_collection_name'];
        } else {
            $data['shipping_aymakan_collection_name'] = $this->config->get('shipping_aymakan_collection_name');
        }

        if (isset($this->request->post['shipping_aymakan_collection_email'])) {
            $data['shipping_aymakan_collection_email'] = $this->request->post['shipping_aymakan_collection_email'];
        } else {
            $data['shipping_aymakan_collection_email'] = $this->config->get('shipping_aymakan_collection_email');
        }

        if (isset($this->request->post['shipping_aymakan_collection_city'])) {
            $data['shipping_aymakan_collection_city'] = $this->request->post['shipping_aymakan_collection_city'];
        } else {
            $data['shipping_aymakan_collection_city'] = $this->config->get('shipping_aymakan_collection_city');
        }

        if (isset($this->request->post['shipping_aymakan_collection_address'])) {
            $data['shipping_aymakan_collection_address'] = $this->request->post['shipping_aymakan_collection_address'];
        } else {
            $data['shipping_aymakan_collection_address'] = $this->config->get('shipping_aymakan_collection_address');
        }

        if (isset($this->request->post['shipping_aymakan_collection_neighbourhood'])) {
            $data['shipping_aymakan_collection_neighbourhood'] = $this->request->post['shipping_aymakan_collection_neighbourhood'];
        } else {
            $data['shipping_aymakan_collection_neighbourhood'] = $this->config->get('shipping_aymakan_collection_neighbourhood');
        }

        if (isset($this->request->post['shipping_aymakan_collection_postcode'])) {
            $data['shipping_aymakan_collection_postcode'] = $this->request->post['shipping_aymakan_collection_postcode'];
        } else {
            $data['shipping_aymakan_collection_postcode'] = $this->config->get('shipping_aymakan_collection_postcode');
        }

        if (isset($this->request->post['shipping_aymakan_collection_telephone'])) {
            $data['shipping_aymakan_collection_telephone'] = $this->request->post['shipping_aymakan_collection_telephone'];
        } else {
            $data['shipping_aymakan_collection_telephone'] = $this->config->get('shipping_aymakan_collection_telephone');
        }

        if (isset($this->request->post['shipping_aymakan_live'])) {
            $data['shipping_aymakan_live'] = $this->request->post['shipping_aymakan_live'];
        } else {
            $data['shipping_aymakan_live'] = $this->config->get('shipping_aymakan_live');
        }

        if (isset($this->request->post['shipping_aymakan_order_status'])) {
            $data['shipping_aymakan_order_status'] = $this->request->post['shipping_aymakan_order_status'];
        } else {
            $data['shipping_aymakan_order_status'] = $this->config->get('shipping_aymakan_order_status');
        }

        if (isset($this->request->post['shipping_aymakan_shipping_order_status'])) {
            $data['shipping_aymakan_shipping_order_status'] = $this->request->post['shipping_aymakan_shipping_order_status'];
        } else {
            $data['shipping_aymakan_shipping_order_status'] = $this->config->get('shipping_aymakan_shipping_order_status');
        }

        $data['cities'] = $this->cities();

        $this->load->model('localisation/order_status');

        $data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('extension/shipping/aymakan', $data));
    }

    protected function validate()
    {
        if (!$this->user->hasPermission('modify', 'extension/shipping/aymakan')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (empty($this->request->post['shipping_aymakan_key'])) {
            $this->error['key'] = $this->language->get('error_key');
        }

        if (empty($this->request->post['shipping_aymakan_collection_name'])) {
            $this->error['name'] = $this->language->get('error_name');
        }

        if ((utf8_strlen($this->request->post['shipping_aymakan_collection_email']) > 96) || !filter_var($this->request->post['shipping_aymakan_collection_email'], FILTER_VALIDATE_EMAIL)) {
            $this->error['email'] = $this->language->get('error_email');
        }

        if (empty($this->request->post['shipping_aymakan_collection_city'])) {
            $this->error['city'] = $this->language->get('error_city');
        }

        if (empty($this->request->post['shipping_aymakan_collection_address'])) {
            $this->error['address'] = $this->language->get('error_address');
        }

        if (empty($this->request->post['shipping_aymakan_collection_telephone']) || !is_numeric($this->request->post['shipping_aymakan_collection_telephone'])) {
            $this->error['telephone'] = $this->language->get('error_telephone');
        }

        return !$this->error;
    }

    protected function cities()
    {
        if ($this->config->get('shipping_aymakan_live')) {
            $url = 'https://aymakan.com.sa/api/v2/cities';
        } else {
            $url = 'https://dev.aymakan.com.sa/api/v2/cities';
        }

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($curl), true);

        curl_close($curl);

        if ($response['success']) {

            return $response['data']['cities'];
        }

        return false;

    }
    public function form() {
        $this->load->model('sale/order');

        if (isset($this->request->get['order_id'])) {
            $order_id = $this->request->get['order_id'];
        } else {
            $order_id = 0;
        }

        $this->load->language('extension/shipping/aymakan');

        $order_info = $this->model_sale_order->getOrder($order_id);

        if ($order_info) {
            $data['customer_name'] = $order_info['shipping_firstname'] . ' ' . $order_info['shipping_lastname'];
            $data['customer_email'] = $order_info['email'];
            $data['customer_address'] = $order_info['shipping_address_1'] . ($order_info['shipping_address_2'] ? ' ' . $order_info['shipping_address_1'] : '');
            $data['customer_region'] = $order_info['shipping_zone'];
            $data['customer_telephone'] = $order_info['telephone'];
            $data['customer_postcode'] = $order_info['shipping_postcode'];
            $data['cities'] = $this->cities();
            $data['reference'] = $order_id;
            $data['order_id'] = $order_id;
            $data['currency'] = $order_info['currency_code'];
            $data['declared_value'] = $this->currency->format($order_info['total'], $order_info['currency_code'], $order_info['currency_value'], false);
            $data['delivery_country'] = 'SA';
            $data['is_cod'] = 0;

            $this->load->model('localisation/country');

            $country_info = $this->model_localisation_country->getCountry($order_info['shipping_country_id']);

            if($country_info) {
                $data['delivery_country'] = $country_info ['iso_code_2'];
            }

            $data['items_count'] = 0;
            $products = $this->model_sale_order->getOrderProducts($order_id);

            foreach ($products as $product) {
                $data['items_count'] += $product['quantity'];
            }
            $data['pieces'] = 1;

            $this->response->setOutput($this->load->view('extension/shipping/aymakan_form', $data));
        }

    }
    public function create() {
        $json = [];

        $this->load->language('extension/shipping/aymakan');

        if(isset($this->request->post)) {

            if (empty($this->request->post['delivery_name'])) {
                $json['error']['delivery_name'] = $this->language->get('error_name');
            }

            if ((utf8_strlen($this->request->post['delivery_email']) > 96) || !filter_var($this->request->post['delivery_email'], FILTER_VALIDATE_EMAIL)) {
                $json['error']['delivery_email'] = $this->language->get('error_email');
            }

            if (empty($this->request->post['delivery_city'])) {
                $json['error']['delivery_city'] = $this->language->get('error_city');
            }

            if (empty($this->request->post['delivery_address'])) {
                $json['error']['delivery_address'] = $this->language->get('error_address');
            }

            if (empty($this->request->post['delivery_phone']) || !is_numeric($this->request->post['delivery_phone'])) {
                $json['error']['delivery_phone'] = $this->language->get('error_telephone');
            }

            if (empty($this->request->post['reference']) || !is_numeric($this->request->post['reference'])) {
                $json['error']['reference'] = $this->language->get('error_reference');
            }

            if (empty($this->request->post['declared_value'])) {
                $json['error']['declared_value'] = $this->language->get('error_declared_value');
            }

            if ($this->request->post['is_cod'] && empty($this->request->post['cod_amount'])) {
                $json['error']['cod_amount'] = $this->language->get('error_cod_amount');
            }

            if (empty($this->request->post['items_count']) || !is_numeric($this->request->post['items_count'])) {
                $json['error']['items_count'] = $this->language->get('error_items_count');
            }

            if (empty($this->request->post['pieces']) || !is_numeric($this->request->post['pieces'])) {
                $json['error']['pieces'] = $this->language->get('error_pieces');
            }


            if (!$json) {

                $this->load->model('user/user');

                $user_info = $this->model_user_user->getUser($this->user->getId());

                if ($user_info) {
                    $requested_by = $user_info['firstname'] . ' ' . $user_info['lastname'];
                } else {
                    $requested_by = '';
                }
                $order_info = $this->request->post;

                $cities = $this->cities();

                $collection_city = '';
                foreach ($cities as $city) {

                    if($city['id'] == $this->config->get('shipping_aymakan_collection_city')) {
                        $collection_city = $city['city_en'];
                        break;
                    }
                }

                $data_post = [
                    'requested_by' => $requested_by,
                    'declared_value' => (float)$order_info['declared_value'],
                    'declared_value_currency' => $order_info['currency'],
                    'reference' => (int)$order_info['reference'],
                    'currency' => ($order_info['is_cod'] ? $order_info['currency'] : ''),
                    'is_cod' => (bool)$order_info['is_cod'],
                    'cod_amount' => ($order_info['is_cod'] ? $order_info['cod_amount'] : ''),
                    'delivery_name' => $order_info['delivery_name'],
                    'delivery_email' => $order_info['delivery_email'],
                    'delivery_city' => $order_info['delivery_city'],
                    'delivery_address' => $order_info['delivery_address'],
                    'delivery_neighbourhood' => $order_info['delivery_neighbourhood'],
                    'delivery_postcode' => $order_info['delivery_postcode'],
                    'delivery_country' => $order_info['delivery_country'],
                    'delivery_phone' => $order_info['delivery_phone'],
                    'collection_name' => $this->config->get('shipping_aymakan_collection_name'),
                    'collection_email' => $this->config->get('shipping_aymakan_collection_email'),
                    'collection_city' => $collection_city,
                    'collection_address' => $this->config->get('shipping_aymakan_collection_address'),
                    'collection_neighbourhood' => $this->config->get('shipping_aymakan_collection_neighbourhood'),
                    'collection_postcode' => $this->config->get('shipping_aymakan_collection_postcode'),
                    'collection_phone' => $this->config->get('shipping_aymakan_collection_telephone'),
                    'collection_country' => 'SA',
                    'pieces' => $order_info['pieces'],
                    'items_count' => $order_info['items_count'],
                ];

                if ($this->config->get('shipping_aymakan_live')) {
                    $url = 'https://aymakan.com.sa/api/v2/shipping/create';
                } else {
                    $url = 'https://dev.aymakan.com.sa/api/v2/shipping/create';
                }

                $curl = curl_init($url);
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json', 'Accept: application/json', 'Authorization:' . $this->config->get('shipping_aymakan_key')));
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_POST, true);
                curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data_post));
                $response = json_decode(curl_exec($curl), true);

                if(isset($response['errors'])) {
                    $json['warning'] = '';

                    foreach ($response['errors'] as $errors) {
                        foreach ($errors as $error) {
                            $json['warning'] .= $error . '<br>';
                        }
                    }
                }

                if(isset($response['success'])) {
                    $json['success'] =  $this->language->get('text_success_create');
                    $json['comment'] = sprintf($this->language->get('text_tracking_number'), $response['data']['shipping']['tracking_number']);
                    $json['pdf_label'] = $response['data']['shipping']['pdf_label'];

                    $this->load->model('sale/order');

                    $this->model_sale_order->saveAymakanShipping((int)$order_info['order_id'], $json['pdf_label']);

                }

                curl_close($curl);

            }

        }

        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));

    }
    public function install() {
        $this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "order_aymakan` (
          `order_id` int(11) NOT NULL,
          `link` varchar(255) NOT NULL,
          PRIMARY KEY (`order_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
    }

    public function uninstall() {
        $this->db->query("DROP TABLE `" . DB_PREFIX . "order_aymakan`");
    }

}
