<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Cliente;
use PhpParser\Node\Expr\New_;

class FacturaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $facturas = Factura::join('clientes', 'facturas.cliente_id', '=', 'clientes.id')
                    ->get(['facturas.*', 'clientes.nombre']);
        return view('factura.index')->with('facturas', $facturas);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('factura.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factura = new Factura();

        $factura->fecha = $request->get('fecha');
        $factura->cliente_id = $request->get('cliente_id');
        $factura->status = 1;

        $factura->save();

        return redirect('/facturas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factura = Factura::join('clientes', 'facturas.cliente_id', '=', 'clientes.id')
                    ->get(['facturas.*', 'clientes.nombre'])->find($id);
        return view('factura.edit')->with('factura', $factura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $factura = Factura::find($id);

        $factura->fecha = $request->get('fecha');
        $factura->cliente_id = $request->get('cliente_id');
        $factura->status = $request->get('status');

        $factura->save();

        return redirect('/facturas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        return redirect('/facturas');
    }


    // Fetch records
    public function getClientes(Request $request)
    {
        $search = $request->search;

        if ($search == '') {
            $clientes = Cliente::orderby('nombre', 'asc')->select('id', 'nombre')->limit(20)->get();
        } else {
            $clientes = Cliente::orderby('nombre', 'asc')->select('id', 'nombre')->where('nombre', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($clientes as $cliente) {
            $response[] = array(
                "id" => $cliente->id,
                "text" => $cliente->nombre
            );
        }
        return response()->json($response);
    }
}
