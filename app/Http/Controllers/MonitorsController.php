<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\MonitorCreateRequest;
use App\Http\Requests\MonitorUpdateRequest;
use App\Repositories\MonitorRepository;
use App\Validators\MonitorValidator;
use App\Entities\Sector;

/**
 * Class MonitorsController.
 *
 * @package namespace App\Http\Controllers;
 */
class MonitorsController extends Controller
{
    /**
     * @var MonitorRepository
     */
    protected $repository;

    /**
     * @var MonitorValidator
     */
    protected $validator;

    /**
     * MonitorsController constructor.
     *
     * @param MonitorRepository $repository
     * @param MonitorValidator $validator
     */
    public function __construct(MonitorRepository $repository, MonitorValidator $validator)
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
        $monitors = $this->repository->all();

        $sectors = Sector::orderBy('initials')->get();

        
        return view('monitor.index', compact('monitors', 'sectors'));
    }

    public function createForm()
    {
        $sectors = Sector::orderBy('initials')->get();

        return view('monitor.form.create', compact('sectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MonitorCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(MonitorCreateRequest $request)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $monitor = $this->repository->create($request->all());

            $response = [
                'message' => 'Monitor cadastrado com sucesso.',
                'data'    => $monitor->toArray(),
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
        $monitor = $this->repository->find($id);
        $sectors = Sector::orderBy('initials')->get();

        return view('monitor.show', compact('monitor', 'sectors'));
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
        $monitor = $this->repository->find($id);
        $sectors = Sector::orderBy('initials')->get();

        return view('monitor.edit', compact('monitor', 'sectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MonitorUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(MonitorUpdateRequest $request, $id)
    {
        try {
            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $monitor = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Monitor atualizado com sucesso.',
                'data'    => $monitor->toArray(),
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

    
        return redirect()->back()->with('message', 'Monitor deletado com sucesso.');
    }
}
