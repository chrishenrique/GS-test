<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TechnicalManagersRepo;
use App\Forms\TechnicalManagersForm;

class TechnicalManagersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(TechnicalManagersRepo $repo, TechnicalManagersForm $form)
    {
        $this->repo = $repo;
        $this->form = $form;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ppage = 20;
        $first = $request->get('first');
        $term = $request->get('term');
        $options = compact('first', 'term');
        $technicalManagers = $this->repo->byPage( $options);

        return view('app.technical_managers.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $technicalManager = new TechnicalManager();

        return view('app.technical_managers.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->form->validate($request->all());

        if ($validator->fails())
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $this->form->normalizeToCreate($request);
        $result = $this->repo->create($input);

        if (!$result)
        {
            return redirect()->back()
                        ->withInput()
                        ->with(['error' => trans('def.nok')]);
        }

        return redirect()->route('technicalManagers.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TechnicalManager  $technicalManager
     * @return \Illuminate\Http\Response
     */
    public function show(TechnicalManager $technicalManager)
    {
        // return view('app.technical_managers.show', compact('technicalManager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TechnicalManager  $technicalManager
     * @return \Illuminate\Http\Response
     */
    public function edit(TechnicalManager $technicalManager)
    {
        return view('app.technical_managers.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TechnicalManager  $technicalManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TechnicalManager $technicalManager)
    {
        $validator = $this->form->validate($request->all(), $technicalManager);

        if ($validator->fails())
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $this->form->normalizeToUpdate($request);
        $result = $this->repo->update($input, $technicalManager);

        if (!$result)
        {
            return redirect()->back()
                        ->withInput()
                        ->with(['error' => trans('def.nok')]);
        }

        if (!auth()->user()->isAdmin())
        {
            return redirect()->route('dashboard')
                            ->with(['success' => trans('def.ok')]);
        }

        return redirect()->route('technicalManagers.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TechnicalManager  $technicalManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(TechnicalManager $technicalManager)
    {
        $this->repo->destroy($technicalManager);

        return redirect()->route('technicalManagers.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Search for technicalManagers.
     * @return Response
     */
    public function search(Request $request)
    {
        $term = $request->get('term');

        header('Access-Control-Allow-Origin: *');
        return $this->repo->search(compact('term'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $technicalManagers = TechnicalManager::onlyTrashed()
                                ->orderBy('deleted_at', 'desc')
                                ->paginate(20);

        return view('app.technical_managers.trasheds', get_defined_vars());
    }
}
