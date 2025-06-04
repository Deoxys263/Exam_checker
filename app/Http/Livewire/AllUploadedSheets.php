<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\frontend\SolutionTransaction;

class AllUploadedSheets extends Component
{
    use WithPagination;
    // Define properties
    public $search = '';
    public $sortField = 'id'; // Default sort field
    public $sortDirection = 'asc'; // Default sort direction

    // Handle updating the sort field
    public function updatingSearch()
    {
        $this->resetPage(); // Reset pagination when search term changes
    }

    // Render the table data
    public function render()
    {
        $query = SolutionTransaction::query();

        // Apply search filter
        if ($this->search) {
            $query->where('name', 'like', '%'.$this->search.'%'); // Adjust column as needed
        }

        // Apply sorting
        $query->orderBy($this->sortField, $this->sortDirection);

        // Paginate the results
        $data = $query->paginate(10); // Adjust pagination limit as needed

        return view('livewire.all-uploaded-sheets', [
            'sheets' => $data,
        ]);
    }

    // Handle sorting
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // Toggle sort direction
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }
}
