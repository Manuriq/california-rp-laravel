<?php

namespace App\Http\Livewire;

use App\Models\Forum;
use Livewire\Component;
use Livewire\WithPagination;

class ForumTable extends Component
{
    use WithPagination;

    public string $search = '';
    public string $orderField = 'order';
    public string $orderDirection = 'ASC';
    public int $editId = 0;

    protected $queryString = [
        'search' => ['except' => ''],
        'orderField' => ['except' => 'order'],
        'orderDirection' => ['except' => 'ASC']
    ];

    protected $listeners = [
        'userUpdated' => 'onUserUpdated'
    ];

    public function paginationView(Type $var = null)
    {
        return "livewire.pagination";
    }

    public function setOrderField(string $name)
    {
        if($name === $this->orderField)
        {
            $this->orderDirection = $this->orderDirection === 'ASC' ? 'DESC' : 'ASC';
        }else{
            $this->orderField = $name;
            $this->reset('orderDirection');
        }
    }

    public function onUserUpdated()
    {
        $this->reset('editId');
    }

    public function startEdit(int $id)
    {
        $this->editId = $id;
    }

    public function startDelete(int $id)
    {
        Forum::destroy($id);
    }

    public function render()
    {
        return view('livewire.forum-table', [
            'forums' => Forum::where('title', 'LIKE', "%{$this->search}%")
            ->orderBy($this->orderField, $this->orderDirection)
            ->paginate(5)
        ]);
    }
}
