<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Enderecos Controller
 *
 * @property \App\Model\Table\EnderecosTable $Enderecos
 *
 * @method \App\Model\Entity\Endereco[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EnderecosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $dados_endereco = $this->Enderecos->newEntity();
        if ($this->request->is('post')) {
            $dados_endereco = $this->Enderecos->patchEntity($dados_endereco, $this->request->getData());
            if ($this->Enderecos->save($dados_endereco)) {
                $this->Flash->success(__('O endereço foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o endereço. Por favor, tente novamente.'));
        }else if ($this->request->getQuery('filter')) {
            $cep =$this->request->getQuery('filter');
            $cep = $this->sanitizeString($cep['Enderecos']['cep']);
            $result = $this->Enderecos->find('list')
                ->where(['Enderecos.cep' => $cep])
                ->count();
            if($result > 0){
                $this->Flash->error(__('CEP já registrado em nossa base de dados.'));
            }else{
                $uri = "https://viacep.com.br/ws/".$cep."//json/";
                $uri = @file_get_contents($uri);
                $dados_endereco = json_decode($uri, true);
                if(!empty($dados_endereco['erro'])){
                    $this->Flash->error(__('CEP não encontrado.'));
                }else{
                    $dados_endereco['cep'] = $cep;
                }

                
            }
            
        }
        $enderecos = $this->paginate($this->Enderecos);

        $this->set(compact('enderecos', 'dados_endereco'));

    }

    function sanitizeString($string) {

        // matriz de entrada
        $what = array( 'ä','ã','à','á','â','ê','ë','è','é','ï','ì','í','ö','õ','ò','ó','ô','ü','ù','ú','û','À','Á','É','Í','Ó','Ú','ñ','Ñ','ç','Ç',' ','-','(',')',',',';',':','|','!','"','#','$','%','&','/','=','?','~','^','>','<','ª','º' );
    
        // matriz de saída
        $by   = array( 'a','a','a','a','a','e','e','e','e','i','i','i','o','o','o','o','o','u','u','u','u','A','A','E','I','O','U','n','n','c','C','','','','','','','','','','','','','','','','','','','','','','','' );
    
        // devolver a string
        return str_replace($what, $by, $string);
    }

    /**
     * View method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $endereco = $this->Enderecos->get($id, [
            'contain' => [],
        ]);

        $this->set('endereco', $endereco);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $endereco = $this->Enderecos->newEntity();
        if ($this->request->is('post')) {
            $endereco = $this->Enderecos->patchEntity($endereco, $this->request->getData());
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('The endereco has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The endereco could not be saved. Please, try again.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->set(compact('endereco'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $endereco = $this->Enderecos->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $endereco = $this->Enderecos->patchEntity($endereco, $this->request->getData());
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('O endereço foi salvo.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Não foi possível salvar o endereço. Por favor, tente novamente.'));
        }
        $this->set(compact('endereco'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $endereco = $this->Enderecos->get($id);
        if ($this->Enderecos->delete($endereco)) {
            $this->Flash->success(__('O endereco foi excluído.'));
        } else {
            $this->Flash->error(__('O endereco não pôde ser excluído. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
