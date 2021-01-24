<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\EnterprisesRepo;
use App\Forms\EnterprisesForm;
use App\{Enterprise, TechnicalManager};

class EnterprisesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EnterprisesRepo $repo, EnterprisesForm $form)
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
        $enterprises = $this->repo->byPage( $options);

        return  view('enterprises.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $enterprise = new Enterprise();
        $techinicalManagers = TechnicalManager::all();

        return  view('enterprises.create', get_defined_vars());
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

        return redirect()->route('enterprises.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function show(Enterprise $enterprise)
    {
        // return  view('enterprises.show', compact('enterprise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function edit(Enterprise $enterprise)
    {
        $techinicalManagers = TechnicalManager::all();

        return  view('enterprises.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enterprise $enterprise)
    {
        $validator = $this->form->validate($request->all(), $enterprise);

        if ($validator->fails())
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $this->form->normalizeToUpdate($request);
        $result = $this->repo->update($input, $enterprise);

        if (!$result)
        {
            return redirect()->back()
                        ->withInput()
                        ->with(['error' => trans('def.nok')]);
        }

        return redirect()->route('enterprises.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enterprise  $enterprise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enterprise $enterprise)
    {
        try
        {
            $result = $this->repo->delete($enterprise);

            if (!$result)
            {
                return redirect()->back()
                            ->withInput()
                            ->with(['error' => trans('def.nok')]);
            }

            return redirect()->route('enterprises.index')
                            ->with(['success' => trans('def.ok')]);
        }
        catch(Exception $e)
        {
            return redirect()->back()
                            ->withInput()
                            ->with(['error' => trans('def.nok')]);
        }
    }

    /**
     * Search for enterprises.
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
        $enterprises = Enterprise::onlyTrashed()
                                ->orderBy('deleted_at', 'desc')
                                ->paginate(20);

        return  view('enterprises.trash', get_defined_vars());
    }

}
