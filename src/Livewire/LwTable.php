<?php

namespace Nasirkhan\LaravelCube\Livewire;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

abstract class LwTable extends Component
{
    use WithPagination;

    #[Url(as: 'q')]
    public string $search = '';

    public int $perPage = 15;

    public string $sortCol = 'id';

    public string $sortDir = 'desc';

    protected string $paginationTheme = 'tailwind';

    public function sort(string $column): void
    {
        if ($this->sortCol === $column) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortCol = $column;
            $this->sortDir = 'asc';
        }

        $this->resetPage();
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedPerPage(): void
    {
        $this->resetPage();
    }

    abstract protected function baseQuery(): Builder;

    protected function rows(): LengthAwarePaginator
    {
        return $this->baseQuery()->paginate($this->perPage);
    }
}
