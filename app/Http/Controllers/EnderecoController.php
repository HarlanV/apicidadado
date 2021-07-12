<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnderecoEditRequest;
use App\Models\Cidadao;
use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Services\EnderecoService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class EnderecoController extends Controller
{

    public EnderecoService $service;

    public function __construct(EnderecoService $service)
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
        $address = $this->service->show($cpf);

        if (!$address instanceof Endereco) {
            return response()
                ->json([], Response::HTTP_NOT_FOUND);
        }
        return response()
            ->json($address, Response::HTTP_OK);
    }

    /**
     * Updates a Citizen given his cpf
     * 
     * @param   string                                  $cpf
     * @param   \App\Http\Requests\CidadaoEditRequest   $request
     * @return  \Illuminate\Http\JsonResponse;
     */
    public function update($cpf, EnderecoEditRequest $request): JsonResponse
    {
        $citizen = $this->service->show($cpf);

        if (!$citizen instanceof Cidadao) {
            return response()
                ->json($citizen, Response::HTTP_NOT_FOUND);
        }

        $updated = $this->service->update(
            $citizen,
            $request->validated()
        );

        if (!$updated instanceof Endereco) {
            return response()
                ->json($updated, Response::HTTP_CONFLICT);
        }
        return response()->json($updated, Response::HTTP_OK);
    }


}
