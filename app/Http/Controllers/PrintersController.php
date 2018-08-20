<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\PrinterCreateRequest;
use App\Http\Requests\PrinterUpdateRequest;
use App\Repositories\PrinterRepository;
use App\Validators\PrinterValidator;
use App\Entities\Sector;

/**
 * Class PrintersController.
 *
 * @package namespace App\Http\Controllers;
 */
class PrintersController extends Controller
{
    /**
     * @var PrinterRepository
     */
    protected $repository;

    /**
     * @var PrinterValidator
     */
    protected $validator;

    /**
     * PrintersController constructor.
     *
     * @param PrinterRepository $repository
     * @param PrinterValidator $validator
     */
    public function __construct(PrinterRepository $repository, PrinterValidator $validator)
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
        $printers = $this->repository->all();

        return view('printer.index', compact('printers'));
    }


    public function createForm()
    {
        $sectors = Sector::orderBy('initials')->get();
        return view('printer.form.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PrinterCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(PrinterCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $printer = $this->repository->create($request->all());

            $response = [
                'message' => 'Impressora cadastrada com sucesso.',
                'data'    => $printer->toArray(),
            ];

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
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
        $printer = $this->repository->find($id);
        $sectors = Sector::orderBy('initials')->get();

        return view('printer.show', compact('printer', 'sectors'));
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
        $printer = $this->repository->find($id);
        $sectors = Sector::orderBy('initials')->get();

        return view('printer.edit', compact('printer', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PrinterUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(PrinterUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $printer = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Impressora atualizada com sucesso.',
                'data'    => $printer->toArray(),
            ];

          
            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
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
     
        return redirect()->back()->with('message', 'Impressora deletada com sucesso.');
    }
}
