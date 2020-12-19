<?php

namespace App\Http\Livewire;

use App\Traits\WithSearchProjects;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsTable extends Component
{
    use WithSearchProjects, WithPagination;

    public $filter_field= "";

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->search_project_by_all_fieldes();
    }

    public function render()
    {
        return view('livewire.projects-table', [
            'projects' => $this->search_project_by_all_fieldes()
        ]);
    }
}
