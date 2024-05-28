<?php

namespace App\Http\Controllers\API\V1\Book;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Shared\Domain\Bus\Command\CommandBus;

class UpdateBookController extends Controller
{    

    public function __construct(private readonly CommandBus $commandBus)
    {
        
    }
    
    public function update(Request $request)
    {
        
    }
}
