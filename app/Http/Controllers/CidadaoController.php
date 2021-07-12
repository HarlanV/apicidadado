<?php

namespace App\Http\Controllers;
#use Illuminate\Support\Facades\Http;

use App\Http\Requests\CidadaoCreateRequest;
use App\Http\Requests\CidadaoEditRequest;
use App\Models\Cidadao;
use Illuminate\Http\Request;
use App\Services\CidadaoService;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class CidadaoController extends Controller
{

    public CidadaoService $service;

    public function __construct(CidadaoService $service)
    {
        $this->service = $service;
    }

    /**
     * This function...
     * 
     * @param   
     * @return  
     */
    public function index(Request $request)
    {
        return Cidadao::paginate($request->per_page);
    }

    /**
     * 
     * 
     * @param   
     * @return  
     */
    public function listAll()
    {
        return Cidadao::all();
    }

    /**
     * This function stores a new citizen with contact and address
     * 
     * @param   \App\Http\Requests\CidadaoCreateRequest    $request
     * @return  \Illuminate\Http\JsonResponse
     */
    public function store(CidadaoCreateRequest $request): JsonResponse
    {
        $citizen = $this->service->create(
            $request->validated()
        );

        if (!$citizen instanceof Cidadao) {
            return response()
                ->json($citizen, Response::HTTP_CONFLICT);
        }

        return response()
            ->json($citizen, Response::HTTP_CREATED);
    }

    /**
     * Receive a cpf and returns a citizen
     * 
     * @param   string  $cpf
     * @return  \Illuminate\Http\JsonResponse;
     */
    public function show($cpf): JsonResponse
    {
        $citizen = $this->service->show($cpf);

        if (!$citizen instanceof Cidadao) {
            return response()
                ->json([], Response::HTTP_NOT_FOUND);
        }
        return response()
            ->json($citizen, Response::HTTP_OK);
    }

    /**
     * Updates a Citizen given his cpf
     * 
     * @param   string                                  $cpf
     * @param   \App\Http\Requests\CidadaoEditRequest   $request
     * @return  \Illuminate\Http\JsonResponse;
     */
    public function update($cpf, CidadaoEditRequest $request): JsonResponse
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

        if (!$updated instanceof Cidadao) {
            return response()
                ->json($updated, Response::HTTP_CONFLICT);
        }

        return response()->json($updated, Response::HTTP_OK);
    }

    /**
     * Removes a citizen from database by his cpf
     * 
     * @param   string  $cpf
     * @return  \Illuminate\Http\JsonResponse;
     */
    public function delete($cpf)
    {
        $citizen = $this->service->show($cpf);

        if (!$citizen instanceof Cidadao) {
            return response()
                ->json($citizen, Response::HTTP_NOT_FOUND);
        }

        $citizen->delete();

        $message = "Cidadão ". $citizen["nome"] ." foi removido com sucesso!";

        return response()
        ->json($message, Response::HTTP_OK);

    }

    
    /**
     * Removes a citizen from database by his cpf
     * 
     * @param   string  $cpf
     * @return  \Illuminate\Http\JsonResponse;
     */
    public function teste()
    {
        return "este é um teste  de conexão. Deu ok!";
    }

}
