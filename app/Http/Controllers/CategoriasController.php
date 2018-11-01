<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\CategoriaCreateRequest;
use App\Http\Requests\CategoriaUpdateRequest;
use App\Repositories\CategoriaRepository;
use App\Validators\CategoriaValidator;

/**
 * Class CategoriasController.
 *
 * @package namespace App\Http\Controllers;
 */
class CategoriasController extends Controller
{
    /**
     * @var CategoriaRepository
     */
    protected $repository;

    /**
     * @var CategoriaValidator
     */
    protected $validator;

    /**
     * CategoriasController constructor.
     *
     * @param CategoriaRepository $repository
     * @param CategoriaValidator $validator
     */
    public function __construct(CategoriaRepository $repository, CategoriaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $categorias = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categorias,
            ]);
        }

        return view('categorias.index', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoriaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(CategoriaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $categorium = $this->repository->create($request->all());

            $response = [
                'message' => 'Categoria created.',
                'data'    => $categorium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $categorium,
            ]);
        }

        return view('categorias.show', compact('categorium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorium = $this->repository->find($id);

        return view('categorias.edit', compact('categorium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoriaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(CategoriaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $categorium = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Categoria updated.',
                'data'    => $categorium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'Categoria deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Categoria deleted.');
    }
}
