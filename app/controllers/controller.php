<?php

class Produtos extends CI_Controller {

    public function __construct() 
    {
        
    }

    public function Index() 
    {
        // sua index 
    }

    public function Mercadopago() 
    {
        
                //carrega a biblioteca mercadopago
                $this->load->library('mp');
                
                //carregar as compras 
                $preference_data = array();
                $preference_data["items"] = array();
                
                foreach ($carrinho AS $rowid => $row) {
                    $preference_data['items'][] = array(
                        'title'         => $row['nome'] ,
                        'unit_price'    => $row['preco'] + $v = $row['preco'] / 100 * 6.4,
                        'quantity'      => intval($row['qtd']),
                        'currency_id'   => 'BRL',
                        'description'   => $row['descricao'],
                    );
                }
                
                $preference_data["payer"] = array(
                    'name'          => $this->m2n->usuario['nome'],
                    'email'         => $this->m2n->usuario['email'],
                    'phone' => array(
                        'area_code' => $this->m2n->usuario['tel_primario'],
                        'number'    => $this->m2n->usuario['tel_celular']
                    ),
                    'identification' => array(
                        'type'      => "usuario",
                        'number'    => $this->m2n->usuario['id']
                    ),
                    'address' => array(
                        'street_name'   =>  $this->m2n->usuario['end_endereco'],
                        'street_number' =>  $this->m2n->usuario['end_numero'],
                        'zip_code'      =>  $this->m2n->usuario['end_cep']
                    ),
                );
                
                $preference_data["shipments"] = array(
                    'receiver_address' => array(
                        'zip_code'      =>  $endereco['end_cep'],
                        'street_number' =>  $endereco['end_numero'],
                        'street_name'   =>  $endereco['end_endereco'],
                        'floor'         =>  1,
                        'apartment'     =>  $endereco['end_complemento']
                    )
                );
                
                $preference_data['back_urls'] = array(
                    'success' => 'http://localhost/testeoffice.lionsessence.com.br/escritorio/produtos/lista',
                    'pending' => 'http://localhost/testeoffice.lionsessence.com.br/escritorio/produtos/lista',
                    'failure' => 'http://localhost/testeoffice.lionsessence.com.br/escritorio/produtos/lista'
                );
                
                $preference = $this->mp->create_preference($preference_data);
                
                $data['bt'] = $preference['response']['init_point'];/* sandbox_init_point - para teste */
                $data['titulo'] = 'MercadoPago On-Line';
                $data['pagina'] = 'produtos';
                $data['submenu'] = '';
                $this->load->view('button_mercadopago', $data);
            }
        } 
        else 
        {
            redirect('index');
        }
    }
  
?>