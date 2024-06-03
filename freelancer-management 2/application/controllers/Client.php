<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
    public function edit($id) {
        $data['client'] = $this->Client_model->get_client($id);
        $this->load->view('clients/edit', $data);
    }
    
    public function update($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() === FALSE) {
            // Form validation failed, load the edit view with the client data
            $data['client'] = $this->Client_model->get_client($id);
            $this->load->view('clients/edit', $data);
        } else {
            // Form validation succeeded, create an array with the client data from the form
            $clientData = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'phone' => $this->input->post('phone'),
                'company' => $this->input->post('company')
            );
        
            // Update the client in the database with the new data
            $this->Client_model->update_client($id, $clientData);
        
            // Redirect to the clients page
            redirect('clients');
        }
    }