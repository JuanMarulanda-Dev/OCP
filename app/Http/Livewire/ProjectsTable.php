<?php

namespace App\Http\Livewire;

use App\Traits\WithSearchProjects;
use Illuminate\Support\Arr;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectsTable extends Component
{
    use WithSearchProjects, WithPagination;

    public $filter_field= "";
    public $assignments;

    protected $paginationTheme = 'bootstrap';

    public function amout($assignments)
    {
        $this->assignments = $assignments;
    }

    public function render()
    {
        return view('livewire.projects-table', [
            'projects' => $this->search_project_by_all_fieldes()->paginate(10)
        ]);
    }
}
