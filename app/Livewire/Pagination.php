<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\Book;

class Pagination extends Component
{
    public $currentPage = 1;
    public $perPage = 10; // Number of items per page
    public $totalBooks; // Total number of books

    public function render()
    {
        $books = Book::paginate($this->perPage, ['*'], 'page', $this->currentPage);
        $this->totalBooks = $books->total();

        return view('livewire.pagination', compact('books'));
    }
}

