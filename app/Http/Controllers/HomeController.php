<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\SIG005;
use App\SIG006;
use App\Exports\HistorialExport;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Ciudad;
use App\Parentesco;
use App\Institucion_Cat;
use App\Discapacidad;
use App\Enfermedad;
use App\Persona;
use App\Entidad;
use App\Cuestionario;
use App\Persona_Institucion;
use App\Persona_Discapacidad;
use App\PersonaEnfermedad;
use App\Persona_Parentesco;
use App\ImageGallery;
use Session;
//use App\Persona;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->input('NroExp')) {
            $existe = Persona::where('ci',$request->input('NroExp'))->get();
            if($existe->count() >= 1){
                Session::flash('error', 'Ya existe el postulante!');
                return redirect()->back();
            }

        /*$expediente = SIG005::where('NroExp',$request->input('NroExp'))
        ->where('NroExpS','A')
        ->first();

        $historial = SIG006::where('NroExp',$request->input('NroExp')/*$idexp 1803411)
        ->where('NroExpS','A'/*$request->input('NroExpS'))
        ->orderBy('DENroLin', 'asc')
        ->get();
        $nroexp = $request->input('NroExp');
            return view('home',compact('expediente','historial','nroexp'));*/
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json'
            ];

            $GetOrder = [
                'username' => 'senavitatconsultas',
                'password' => 'S3n4vitat'
            ];
            $client = new client();
            $res = $client->post('http://10.1.79.7:8080/mbohape-core/sii/security', [
                'headers' => $headers,
                'json' => $GetOrder,
                'decode_content' => false
            ]);
            //var_dump((string) $res->getBody());
            $contents = $res->getBody()->getContents();
            $book = json_decode($contents);
            //echo $book->token;
            if($book->success == true){
                //obtener la cedula
                $headerscedula = [
                    'Authorization' => 'Bearer '.$book->token,
                    'Accept' => 'application/json',
                    'decode_content' => false
                ];
                $cedula = $client->get('http://10.1.79.7:8080/frontend-identificaciones/api/persona/obtenerPersonaPorCedula/'.$request->input('NroExp'), [
                    'headers' => $headerscedula,
                ]);
                $datos=$cedula->getBody()->getContents();
                $datospersona = json_decode($datos);
                if(isset($datospersona->obtenerPersonaPorNroCedulaResponse->return->error)){
                    //Flash::error($datospersona->obtenerPersonaPorNroCedulaResponse->return->error);
                    Session::flash('error', $datospersona->obtenerPersonaPorNroCedulaResponse->return->error);
                    return redirect()->back();
                }else{
                    $nombre = $datospersona->obtenerPersonaPorNroCedulaResponse->return->nombres;
                    $apellido = $datospersona->obtenerPersonaPorNroCedulaResponse->return->apellido;
                    $cedula = $datospersona->obtenerPersonaPorNroCedulaResponse->return->cedula;
                    $sexo = $datospersona->obtenerPersonaPorNroCedulaResponse->return->sexo;
                    $fecha = date('Y-m-d', strtotime($datospersona->obtenerPersonaPorNroCedulaResponse->return->fechNacim));
                    $nac = $datospersona->obtenerPersonaPorNroCedulaResponse->return->nacionalidadBean;
                    $est = $datospersona->obtenerPersonaPorNroCedulaResponse->return->estadoCivil;
                    $prof = $datospersona->obtenerPersonaPorNroCedulaResponse->return->profesionBean;
                    $nroexp = $cedula;
                    $ciudad = Ciudad::where('CiuDptoID',11)
                        ->where('status', true)
                        ->get();
                        $parentesco = Parentesco::all();
                        $escolaridad = Institucion_Cat::all();
                        $discapacidad = Discapacidad::all();
                        $enfermedad = Enfermedad::all();
                        $entidades = Entidad::orderBy('name')->get();
                    return view('home',compact('nroexp','cedula','nombre','apellido','fecha','sexo',
                    'nac','est','prof','ciudad','parentesco','escolaridad','discapacidad','enfermedad','entidades'));
                }

                //$nombre = $datos->nombres;
                //echo $cedula->getBody()->getContents();
            }else{
                Flash::success($book->message);
                return redirect()->back();
            }
        }else{

            $nroexp = '';
            return view('home',compact('nroexp'));
        }



        return view('home',compact('expediente','historial'));
    }

    public function store(Request $request)
    {

        $input = $request->all();

        var_dump($input);
        $existe = Persona::where('ci',$request->ci)->get();
        if($existe->count() >= 1){
            Session::flash('error', 'Ya existe el postulante!');
            return redirect()->back();
        }

        $persona = new Persona();
        $persona->ci=$request->ci;
        $persona->nombre=$request->nombre;

        $persona->apellido=$request->apellido;
        $persona->sexo=$request->sexo;

        $persona->fecha_nac=$request->fecha_nac;
        $persona->email=$request->email;

        $persona->domicilio_actual=$request->domicilio_actual;
        $persona->departamento=$request->departamento;

        $persona->ciudad=$request->ciudad;
        $persona->barrio=$request->barrio;

        $persona->ingreso=$request->ingreso;
        $persona->discapacidad=$persona->discapacidad;

        $persona->ingreso=$request->ingreso;
        $persona->discapacidad=$request->discapacidad;

        $persona->ocupacion=$request->ocupacion;
        $persona->estado_civil=$request->estado_civil;

        $persona->nacionalidad=$request->nacionalidad;
        $persona->celular=$request->celular;

        $persona->embarazo=$request->embarazo;
        $persona->gestacion=$request->gestacion;

        $persona->miembros=$request->datosmiembros;

        $persona->save();

        $addmiembro = new Persona_Parentesco();
        $addmiembro->cantidad=0;
        $addmiembro->parentesco_id=1;
        $addmiembro->persona_id=$persona->id;
        $addmiembro->postulante_id=$persona->id;
        $addmiembro->save();

        if ($request->institucion_id) {
        $addescolaridad = new Persona_Institucion();
        $addescolaridad->cantidad=0;
        $addescolaridad->institucion_id=$request->institucion_id;
        $addescolaridad->persona_id=$persona->id;
        $addescolaridad->save();
        }

        if ($request->discapacidad) {
        $discapacidad = new Persona_Discapacidad();
        $discapacidad->discapacidad_id=$request->discapacidad;
        $discapacidad->persona_id=$persona->id;
        $discapacidad->save();
        }

        if ($request->enfermedad_id) {
        $enfermedad = new PersonaEnfermedad();
        $enfermedad->enfermedad_id=$request->enfermedad_id;
        $enfermedad->persona_id=$persona->id;
        $enfermedad->save();
        }
        $data = $request->except('_token','id');
        for ($i=4; $i < 12 ; $i++) {
            $question = new Cuestionario;
            $question->pregunta_id = $i;
            $question->persona_id = $persona->id;
            $question->value = $data['q'.$i];
            $question->text_value = $data['q'.$i.'_text'];
            $question->save();
        }

        if($request->image){
        $input['image'] = 'cedula-'.$request->ci.'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/'.$request->ci), $input['image']);
        $input['title'] = $request->ci;
        ImageGallery::create($input);
        }
        if($request->imagepareja){
        $input['image'] = 'cedula-pareja-'.$request->ci.'.'.$request->imagepareja->getClientOriginalExtension();
        $request->imagepareja->move(public_path('images/'.$request->ci), $input['image']);
        $input['title'] = $request->ci;
        ImageGallery::create($input);
        }

        if($request->imagecroquis){
        $input['image'] = 'croquis-'.$request->ci.'.'.$request->imagecroquis->getClientOriginalExtension();
        $request->imagecroquis->move(public_path('images/'.$request->ci), $input['image']);
        $input['title'] = $request->ci;
        ImageGallery::create($input);
        }



        Session::flash('message', 'Se ha inscripto Correctamente!');
        return redirect()->route('inicio');
        //var_dump($request->all());
        //return "hola";

    }

    public function csvhistorial(Request $request)
    {

        return (new HistorialExport($request->input('idexp'),$request->input('NroExpS')))->download('Historial_expediente_'.$request->input('idexp').'.xlsx');

    }

    public function cedulamiembro($cedula){
        $headers = [
            'Content-Type' => 'application/json',
            'Accept' => 'application/json'
        ];

        $GetOrder = [
            'username' => 'senavitatconsultas',
            'password' => 'S3n4vitat'
        ];
        $client = new client();
        $res = $client->post('http://10.1.79.7:8080/mbohape-core/sii/security', [
            'headers' => $headers,
            'json' => $GetOrder,
            'decode_content' => false
        ]);
        //var_dump((string) $res->getBody());
        $contents = $res->getBody()->getContents();
        $book = json_decode($contents);
        //echo $book->token;
        if($book->success == true){
            //obtener la cedula
            $headerscedula = [
                'Authorization' => 'Bearer '.$book->token,
                'Accept' => 'application/json',
                'decode_content' => false
            ];
            $cedula = $client->get('http://10.1.79.7:8080/frontend-identificaciones/api/persona/obtenerPersonaPorCedula/'.$cedula, [
                'headers' => $headerscedula,
            ]);
            $datos=$cedula->getBody()->getContents();
            $datospersona = json_decode($datos);
            if(isset($datospersona->obtenerPersonaPorNroCedulaResponse->return->error)){
                Flash::error($datospersona->obtenerPersonaPorNroCedulaResponse->return->error);
                return redirect()->back();
            }else{
                $datosmiembro = $datospersona->obtenerPersonaPorNroCedulaResponse;
                return json_encode($datosmiembro->return);



            }
        }
        //$cities = City::where('state_id', $state_id)->get()->sortBy("name")->pluck("name","id");
        //return json_encode($cities);
    }

}
