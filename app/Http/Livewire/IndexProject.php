<?php

namespace App\Http\Livewire;

use App\Traits\WithSearchProjects;
use Livewire\Component;
use Livewire\WithPagination;


class IndexProject extends Component
{
    use WithSearchProjects, WithPagination;

    public $filter_field;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.index-project', [
            'projects' => $this->search_project_by_all_fieldes()->paginate(10)
        ]);
    }


}
