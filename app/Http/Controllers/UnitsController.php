<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UnitsRepo;
use App\Forms\UnitsForm;
Use App\{Unit, Enterprise};

class UnitsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UnitsRepo $repo, UnitsForm $form)
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
        $units = $this->repo->byPage( $options);

        return  view('units.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unit = new Unit();
        $enterprises = Enterprise::all();

        return  view('units.create', get_defined_vars());
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

        return redirect()->route('units.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        // return  view('units.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $enterprises = Enterprise::all();
        
        return  view('units.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $validator = $this->form->validate($request->all(), $unit);

        if ($validator->fails())
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $this->form->normalizeToUpdate($request);
        $result = $this->repo->update($input, $unit);

        if (!$result)
        {
            return redirect()->back()
                        ->withInput()
                        ->with(['error' => trans('def.nok')]);
        }

        return redirect()->route('units.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        try
        {
            $result = $this->repo->delete($unit);

            if (!$result)
            {
                return redirect()->back()
                            ->withInput()
                            ->with(['error' => trans('def.nok')]);
            }

            return redirect()->route('units.index')
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
     * Search for units.
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
        $units = Unit::onlyTrashed()
                                ->orderBy('deleted_at', 'desc')
                                ->paginate(20);

        return  view('units.trash', get_defined_vars());
    }

    
    public function getSaleValue($id)
    {
        return Unit::find($id)->sale_value ?: 0;
    }
}

