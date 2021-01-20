<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Dramas Controller
 *
 * @property \App\Model\Table\DramasTable $Dramas
 * @method \App\Model\Entity\Drama[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DramasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Genres', 'Persons', 'DramaEvents'],
        ];
        $dramas = $this->paginate($this->Dramas);

        $this->set(compact('dramas'));
    }

    /**
     * View method
     *
     * @param string|null $id Drama id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $drama = $this->Dramas->get($id, [
            'contain' => ['Genres', 'Persons', 'DramaEvents'],
        ]);

        $this->set(compact('drama'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $drama = $this->Dramas->newEmptyEntity();
        if ($this->request->is('post')) {
            $conditions = array(
                'Dramas.name' => $this->request->getData('name'),
                'Dramas.person_id' => $this->request->getData('person_id'),
                'Dramas.genre_id' => $this->request->getData('genre_id')
            );

            if ($this->Dramas->exists($conditions)) {
                $this->Flash->error(__('Das Theaterstück \''.$this->request->getData('name').'\' existiert bereits.'));
            } else {
                $drama = $this->Dramas->patchEntity($drama, $this->request->getData());
                if ($this->Dramas->save($drama)) {
                    $this->Flash->success(__('The drama has been saved.'));
    
                    $table = $this->getTableLocator()->get('DramaEvents');

                    $entity = $table->newEmptyEntity();
                    $entity->drama_id = $drama->id;
                    $entity->date = $this->request->getData("date");

                    if ($table->save($entity)) {
                        return $this->redirect(['action' => 'index']);
                    }
                }
                $this->Flash->error(__('The drama could not be saved. Please, try again.'));
            }
        }
        $genres = $this->Dramas->Genres->find('list', ['limit' => 200]);
        $persons = $this->Dramas->Persons->find('list', ['limit' => 200]);
        $this->set(compact('drama', 'genres', 'persons'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Drama id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $drama = $this->Dramas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $drama = $this->Dramas->patchEntity($drama, $this->request->getData());
            if ($this->Dramas->save($drama)) {
                $this->Flash->success(__('The drama has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drama could not be saved. Please, try again.'));
        }
        $genres = $this->Dramas->Genres->find('list', ['limit' => 200]);
        $persons = $this->Dramas->Persons->find('list', ['limit' => 200]);
        $this->set(compact('drama', 'genres', 'persons'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Drama id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $drama = $this->Dramas->get($id);
        if ($this->Dramas->delete($drama)) {
            $this->Flash->success(__('The drama has been deleted.'));
        } else {
            $this->Flash->error(__('The drama could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
