<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\frontend\SolutionTransaction;

class AllUploadedSheets extends Component
{
    public $perPage = 10;
    public function render()
    {
        return view('livewire.all-uploaded-sheets',[
            'sheets' => SolutionTransaction::with('student','package','filename')->orderBy('id','desc')->paginate($this->perPage)
        ]);
    }
}
