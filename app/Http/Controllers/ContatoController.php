<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoEditRequest;
use App\Models\Contato;
use App\Services\ContatoService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class ContatoController extends Controller
{    
    
    public ContatoService $service;

    public function __construct(ContatoService $service)
    {
        $this->service = $service;
    }

    /**
     * This function...
     * 
     * @param   
     * @return  
     */
    public function show($cpf)
    {
        $contact = $this->service->show($cpf);

        if (!$contact instanceof Contato) {
            return response()
                ->json($contact, Response::HTTP_NOT_FOUND);
        }
        return response()
            ->json($contact, Response::HTTP_OK);
    }

    /**
     * Updates a Citizen given his cpf
     * 
     * @param   string                                  $cpf
     * @param   \App\Http\Requests\CidadaoEditRequest   $request
     * @return  \Illuminate\Http\JsonResponse;
     */
    public function update(ContatoEditRequest $request, $cpf): JsonResponse
    {
        $contact = $this->service->show($cpf);

        if (!$contact instanceof Contato) {
            return response()
                ->json($contact, Response::HTTP_NOT_FOUND);
        }

        $updated = $this->service->update(
            $contact,
            $request->validated()
        );

        if (!$updated instanceof Contato) {
            return response()
                ->json($updated, Response::HTTP_CONFLICT);
        }

        return response()->json($updated, Response::HTTP_OK);
    }

}
