<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller
{
        public function index()
        {
            try {
                /*
                 * use Validation
                 * @@see http://codeigniter.jp/user_guide_ja/libraries/form_validation.html
                 *
                 * form_validationはPOSTしかつかえないらしい
                 */
                $this->load->library('form_validation');
                $rule = array(
                             array(
                               'field' => 'test',
                               'label' => 'Test',
                               'rules' => 'required'
                             )
                        );

                $this->form_validation->set_rules($rule);
                $this->form_validation->set_message('required', 'hoge');
/*
                if (!$this->form_validation->run()) {
                    throw new Exception ("validation error. [ERROR: ".$this->form_validation->error_string());
                }
*/
                /*
                 * use Library
                 * @see http://codeigniter.jp/user_guide_ja/general/creating_libraries.html
                 *
                 * 第二引数でconstructに引数を渡せる。但し配列で指定
                 */
                $this->load->library('test/TestClass', array('param' => "aa"));
                $this->testclass->e();
                
                /*
                 * use Model
                 * @see
                 *
                 */
                $this->load->model('configs_model', 'Configs', true);
                $data = $this->Configs->getData();
                // render
                $this->load->view('test',
                                  array(
                                     "now"     => $this->Configs->selectNow()->now,
                                     "title"   => "Test",
                                     "param"   => $this->input->get('param1'),
                                     "data"    => $data[0],
                                  )
                );

            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
}

