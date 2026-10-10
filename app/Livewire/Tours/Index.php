<?php

namespace App\Livewire\Tours;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tour;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Tour::findOrFail($id)->delete();
    }
    public function render()
    {
        $tours = Tour::query()
            ->where('name', 'like', '%' . $this->search . '%')
            ->paginate(10);

        // Aquí pasamos la variable a la vista
        return view('livewire.tours.index', [
            'tours' => $tours,
        ]);
    }
}
