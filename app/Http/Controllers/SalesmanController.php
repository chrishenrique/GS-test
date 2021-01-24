<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SalesmanRepo;
use App\Forms\SalesmanForm;
use App\Salesman;

class SalesmanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SalesmanRepo $repo, SalesmanForm $form)
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
        $salesman = $this->repo->byPage( $options);

        return  view('salesman.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salesman = new Salesman();

        return  view('salesman.create', get_defined_vars());
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

        return redirect()->route('salesman.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Salesman $salesman
     * @return \Illuminate\Http\Response
     */
    public function show(Salesman $salesman)
    {
        // return  view('salesman.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Salesman $salesman
     * @return \Illuminate\Http\Response
     */
    public function edit(Salesman $salesman)
    {
        return  view('salesman.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Salesman $salesman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Salesman $salesman)
    {
        $validator = $this->form->validate($request->all(), $salesman);

        if ($validator->fails())
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $this->form->normalizeToUpdate($request);
        $result = $this->repo->update($input, $salesman);

        if (!$result)
        {
            return redirect()->back()
                        ->withInput()
                        ->with(['error' => trans('def.nok')]);
        }

        return redirect()->route('salesman.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Salesman $salesman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Salesman $salesman)
    {
        try
        {
            $result = $this->repo->delete($salesman);

            if (!$result)
            {
                return redirect()->back()
                            ->withInput()
                            ->with(['error' => trans('def.nok')]);
            }

            return redirect()->route('salesman.index')
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
     * Search for salesman.
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
        $salesman = Salesman::onlyTrashed()
                                ->orderBy('deleted_at', 'desc')
                                ->paginate(20);

        return  view('salesman.trash', get_defined_vars());
    }

}
