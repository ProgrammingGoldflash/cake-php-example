<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * DramaEvents Controller
 *
 * @property \App\Model\Table\DramaEventsTable $DramaEvents
 * @method \App\Model\Entity\DramaEvent[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DramaEventsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Dramas'],
        ];
        $dramaEvents = $this->paginate($this->DramaEvents);

        $this->set(compact('dramaEvents'));
    }

    /**
     * View method
     *
     * @param string|null $id Drama Event id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $dramaEvent = $this->DramaEvents->get($id, [
            'contain' => ['Dramas', 'Crews'],
        ]);

        $this->set(compact('dramaEvent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $dramaEvent = $this->DramaEvents->newEmptyEntity();
        if ($this->request->is('post')) {
            $dramaEvent = $this->DramaEvents->patchEntity($dramaEvent, $this->request->getData());
            if ($this->DramaEvents->save($dramaEvent)) {
                $this->Flash->success(__('The drama event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drama event could not be saved. Please, try again.'));
        }
        $dramas = $this->DramaEvents->Dramas->find('list', ['limit' => 200]);
        $this->set(compact('dramaEvent', 'dramas'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Drama Event id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $dramaEvent = $this->DramaEvents->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $dramaEvent = $this->DramaEvents->patchEntity($dramaEvent, $this->request->getData());
            if ($this->DramaEvents->save($dramaEvent)) {
                $this->Flash->success(__('The drama event has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The drama event could not be saved. Please, try again.'));
        }
        $dramas = $this->DramaEvents->Dramas->find('list', ['limit' => 200]);
        $this->set(compact('dramaEvent', 'dramas'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Drama Event id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $dramaEvent = $this->DramaEvents->get($id);
        if ($this->DramaEvents->delete($dramaEvent)) {
            $this->Flash->success(__('The drama event has been deleted.'));
        } else {
            $this->Flash->error(__('The drama event could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
