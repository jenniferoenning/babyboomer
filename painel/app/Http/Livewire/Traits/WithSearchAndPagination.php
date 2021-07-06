<?php

namespace App\Http\Livewire\Traits;

use Livewire\WithPagination;

trait WithSearchAndPagination
{
    use WithPagination;

    public $search = '';

    public function getQueryString()
    {
        return array_merge([
            'search' => ['except' => ''],
            'page' => ['except' => 1],
        ], $this->queryString);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->fill(request()->only('search'));
    }
}
