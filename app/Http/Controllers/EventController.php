<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Veiculo;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{

    public function index(){
        //$result_veiculos = Veiculo::All();
        $result_veiculos = DB::table('veiculos')->join('marcas', 'marcas.id', '=', 'veiculos.id_marca')->join('modelos', 'modelos.id', '=', 'veiculos.id_modelo')->select('veiculos.*', 'marcas.marca', 'modelos.modelo')->orderBy('id', 'DESC')->get();
        return view('index', ['result_veiculos' => $result_veiculos]);
    }

    public function painel(){
        return view('painel.index');
    }

    //EventController pagina marcas
    //EventController pagina marcas
    //EventController pagina marcas
    public function marcas_result($url, $id = null){
        switch($url){
            case "cadastrar":
                $resultDB = [];
                $modelosDB = [];
            break;
            case "editar":
                $resultDB = Marca::findOrFail($id);
                $modelosDB = [];
            break;
            case "listar":
                $resultDB = Marca::All();
                $modelosDB = DB::table('modelos')->select('id_marca')->orderBy('id', 'ASC')->get(); 
                $array = [];
                foreach($modelosDB as $modelos){
                    $array[] = $modelos->id_marca;
                }
                $modelosDB = $array; 
            break;
        }
        return view('painel.marcas', ['url' => $url, 'resultDB' => $resultDB, 'modelosDB' => $modelosDB]);
    } 
    public function marcas_cadastrar(request $request){
        $event = new Marca;
        $event->marca = $request->marca;
        $event->save(); 
        return redirect('/painel/marcas/listar')->with('msg', 'Cadastrado com sucesso!');
    } 
    public function marcas_put(request $request){
        Marca::findOrFail($request->id)->update($request->All());
        return redirect('/painel/marcas/listar')->with('msg', 'Salvo com sucesso!'); 
    }
    public function marcas_delete($id){
        Marca::findOrFail($id)->delete();
        return redirect('/painel/marcas/listar')->with('msg', 'Excluído com sucesso!'); 
    }
 
    //EventController pagina modelos
    //EventController pagina modelos
    //EventController pagina modelos
    public function modelos_result($url, $id = null){
        //$result_marcas = Marca::All()->orderBy('marca', 'ASC');
        $result_marcas =  DB::table('marcas')->select('*')->orderBy('marca', 'ASC')->get(); 

        switch($url){
            case "cadastrar":
                $resultDB = [];
                $veiculosDB = [];
            break;
            case "editar":
                $resultDB = Modelo::findOrFail($id);
                $veiculosDB = [];
            break; 
            case "listar":
                $resultDB = DB::table('modelos')->join('marcas', 'modelos.id_marca', '=', 'marcas.id')->select('modelos.*', 'marcas.marca')->get();
                $veiculosDB = DB::table('veiculos')->select('id_modelo')->get(); 
                $array = [];
                foreach($veiculosDB as $veiculos){
                    $array[] = $veiculos->id_modelo;
                }
                $veiculosDB = $array; 
            break; 
        } 
        return view('painel.modelos', ['url' => $url, 'resultDB' => $resultDB, 'result_marcas' => $result_marcas, 'veiculosDB' => $veiculosDB]);
    }  
    public function modelos_cadastrar(request $request){
        $event = new Modelo;
        $event->modelo = $request->modelo;
        $event->id_marca = $request->id_marca;
        $event->save();
        return redirect('/painel/modelos/listar')->with('msg', 'Cadastrado com sucesso!');
    }
    public function modelos_put(request $request){
        Modelo::findOrFail($request->id)->update($request->All());
        return redirect('/painel/modelos/listar')->with('msg', 'Salvo com sucesso!'); 
    }
    public function modelos_delete($id){
        Modelo::findOrFail($id)->delete();
        return redirect('/painel/modelos/listar')->with('msg', 'Excluído com sucesso!'); 
    }

    //EventController pagina veiculos
    //EventController pagina veiculos
    //EventController pagina veiculos
    public function veiculos_result($url, $id = null){        
        //$marcasDB = Marca::All();
        //$modelosDB = Modelo::All();
        $marcasDB =  DB::table('marcas')->select('*')->orderBy('marca', 'ASC')->get();         
        $modelosDB =  DB::table('modelos')->select('*')->orderBy('modelo', 'ASC')->get();         

        switch($url){
            case "cadastrar":
                $resultDB = [];
            break;
            case "editar":
                $resultDB = Veiculo::findOrFail($id);
            break;
            case "listar":
                $resultDB = DB::table('veiculos')->join('marcas', 'marcas.id', '=', 'veiculos.id_marca')->join('modelos', 'modelos.id', '=', 'veiculos.id_modelo')->select('veiculos.*', 'marcas.marca', 'modelos.modelo')->get();
            break; 
        }
        return view('painel.veiculos', ['url' => $url, 'resultDB' => $resultDB, 'marcasDB' => $marcasDB, 'modelosDB' => $modelosDB]); 
    }
    public function veiculos_cadastrar(request $request){
        $event = new Veiculo;
        $event->id_marca = $request->id_marca;
        $event->id_modelo = $request->id_modelo;
        $request->preco = str_replace(".","", $request->preco);
        $event->preco = str_replace(",",".", $request->preco);

        //upload de imagens
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $img = $request->imagem;
            $ext = $img->extension();
            $name_img = md5($img->getClientOriginalName() . strtotime("now")) . "." . $ext;
            $request->imagem->move(public_path('img/veiculos'), $name_img);
            $event->imagem = $name_img;
        }else{   
            $event->imagem = ""; 
        } 
        $event->save();
        return redirect('/painel/veiculos/listar')->with('msg', 'Cadastrado com sucesso!');
    }
    public function veiculos_put(request $request){
        $dados = $request->All();
        $dados['preco'] = str_replace(".","", $dados['preco']);
        $dados['preco'] = str_replace(",",".", $dados['preco']);
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $img = $request->imagem;
            $ext = $img->extension();
            $name_img = md5($img->getClientOriginalName() . strtotime("now")) . "." . $ext;
            $request->imagem->move(public_path('img/veiculos'), $name_img);
            $dados['imagem'] = $name_img;
        }
        Veiculo::findOrFail($request->id)->update($dados);
        return redirect('/painel/veiculos/listar')->with('msg', 'Salvo com sucesso!'); 
    } 
    public function veiculos_delete($id){
        Veiculo::findOrFail($id)->delete();
        return redirect('/painel/veiculos/listar')->with('msg', 'Excluído com sucesso!'); 
    }

    public function ajax ($data){
        $json['result'] = Modelo::where([['id_marca', $data]])->orderBy('modelo', 'ASC')->get();
        echo json_encode($json);  
        return; 
    }  
}