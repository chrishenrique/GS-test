<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ClientsRepo;
use App\Forms\ClientsForm;
use App\Client;

class ClientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ClientsRepo $repo, ClientsForm $form)
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
        $clients = $this->repo->byPage( $options);

        return  view('clients.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = new Client();

        return  view('clients.create', get_defined_vars());
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

        return redirect()->route('clients.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        // return  view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return  view('clients.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $validator = $this->form->validate($request->all(), $client);

        if ($validator->fails())
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $input = $this->form->normalizeToUpdate($request);
        $result = $this->repo->update($input, $client);

        if (!$result)
        {
            return redirect()->back()
                        ->withInput()
                        ->with(['error' => trans('def.nok')]);
        }

        return redirect()->route('clients.index')->with(['success' => trans('def.ok')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        try
        {
            $result = $this->repo->delete($client);

            if (!$result)
            {
                return redirect()->back()
                            ->withInput()
                            ->with(['error' => trans('def.nok')]);
            }

            return redirect()->route('clients.index')
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
     * Search for clients.
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
        $clients = Client::onlyTrashed()
                                ->orderBy('deleted_at', 'desc')
                                ->paginate(20);

        return  view('clients.trash', get_defined_vars());
    }

}
