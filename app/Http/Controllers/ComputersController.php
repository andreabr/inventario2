<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\ComputerCreateRequest;
use App\Http\Requests\ComputerUpdateRequest;
use App\Repositories\ComputerRepository;
use App\Validators\ComputerValidator;
use App\Entities\Sector;

/**
 * Class ComputersController.
 *
 * @package namespace App\Http\Controllers;
 */
class ComputersController extends Controller
{
    /**
     * @var ComputerRepository
     */
    protected $repository;

    /**
     * @var ComputerValidator
     */
    protected $validator;

    /**
     * ComputersController constructor.
     *
     * @param ComputerRepository $repository
     * @param ComputerValidator $validator
     */
    public function __construct(ComputerRepository $repository, ComputerValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }
         
    /**
     * Display a listing of

     *
     * @return \Illuminate\


     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $computers = $this->repository->all();

        return view('computer.index', compact('computers'));
    }


    public function createForm()
    {
        $sectors = Sector::orderBy('initials')->get();
        return view('computer.form.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ComputerCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(ComputerCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $computer = $this->repository->create($request->all());

            $response = [
                'message' => 'Computador cadastrado com sucesso.',
                'data'    => $computer->toArray(),
            ];

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withInput()->withErrors($e->getMessageBag());
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
        $computer = $this->repository->find($id);
        $sector = Sector::find($computer->sector_id);

        return view('computer.show', compact('computer', 'sector'));
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
        $computer = $this->repository->find($id);
        $sectors = Sector::orderBy('initials')->get();

        return view('computer.edit', compact('computer', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ComputerUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ComputerUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $computer = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Computador atualizado com sucesso.',
                'data'    => $computer->toArray(),
            ];

            if ($request->wantsJson()) {
                return response()->json($response);
            }

            return redirect('computer')->with('message', $response['message']);
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
                'message' => 'Computador deletado com sucesso.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Computador deletado com sucesso.');
    }
}
