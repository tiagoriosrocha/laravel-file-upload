<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Image;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    /**
     * Carrega o formulário image.blade.php
     */
    public function index()
    {
        return view('image');
    }

    /**
     * UPLOAD SIMPLES DE IMAGEM
     * 
     * Valida se o arquivo é uma imagem
     * salva no diretório /public/storage/image
     * Cria um registro no banco de dados usando
     * o model Image
     */
    public function store(Request $request)
    {
        //define regras de validação de imagem
        $this->validate($request, [
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        //pega a imagem que veio no formulário
        $image = $request->file('image');
        //define um novo nome
        $imageName = time().'.'.$image->extension();
        //salva a imagem na pasta /public/storage/image
        $image->move(public_path('storage/image/'),$imageName);

        //deve fazer o salvamento no banco de dados de um post
        //não vai funcionar aqui pq não existe o model Post e Photo
        // $post = new Post();
        // $post->content = $request['content'];
        // $post->user_id = Auth::id();
        // $post->save();

        //deve fazer o salvamento da imagem
        //não vai funcionar aqui pq não existe o model Post e Photo
        // $foto = new Photo();
        // $foto->image_path = $imageName;
        // $foto->post_id = $post->id;
        // $foto->save();

        //envia uma mensagem para a view informando que o salvamento foi concluído com sucesso
        session()->flash('success', 'Upload realizado com sucesso');

        return redirect('/image');
    }

    /***************************************
     ***************************************
     ***************************************
     ***************************************
     ***************************************
     ***************************************/


    /**
     * Carrega o formulário image2.blade.php
     */
    public function index2()
    {
        return view('image2');
    }

    /**
     * UPLOAD DE UMA IMAGEM RECORTADA
     * 
     * recebe a imagem já recortada
     * renomeia ela, salva no mesmo diretório
     * cria um registro no model Image
     */
    public function store2(Request $request)
    {
        //define a pasta para salvar a imagem
        $folderPath = public_path('storage/image/');
 
        //cria imagem usando dados que recebeu do processo de recorte
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        //define um nome unico para a imagem
        $imageName = uniqid() . '.png';
 
        //define o caminho completo onde deve salvar a imagem
        $imageFullPath = $folderPath.$imageName;
 
        //executa função que faz o salvamento da imagem na localização indicada
        file_put_contents($imageFullPath, $image_base64);
 
        //salva o nome da imagem no banco de dados usando o model Image
        $data = Image::create([
            'image' => $imageName,
        ]);
    
        return response()->json(['success'=>'Imagem salva com sucesso','imageName' => $imageName]);
    }

    /***************************************
     ***************************************
     ***************************************
     ***************************************
     ***************************************
     ***************************************/

     
    /**
     * Carrega o formulário image3.blade.php
     */
    public function index3()
    {
        return view('image3');
    }

    /**
     * UPLOAD DE UMA IMAGEM USANDO DRAG AND DROP (ARRASTA E SOLTA)
     * 
     * Recebe a imagem junto com os dados do formulário
     */
    public function store3(Request $request)
    {
        //pega o conteúdo do post, campo textarea
        $conteudo = $request->input('content');
    
        //pega a imagem que veio no formulário
        $image = $request->file('file');
        //define um novo nome
        $imageName = time().'.'.$image->extension();
        //salva a imagem na pasta /public/storage/image
        $image->move(public_path('storage/image/'),$imageName);

        //deve fazer o salvamento no banco de dados de um post
        //não vai funcionar aqui pq não existe o model Post e Photo
        // $post = new Post();
        // $post->content = $request['content'];
        // $post->user_id = Auth::id();
        // $post->save();

        //deve fazer o salvamento da imagem
        //não vai funcionar aqui pq não existe o model Post e Photo
        // $foto = new Photo();
        // $foto->image_path = $imageName;
        // $foto->post_id = $post->id;
        // $foto->save();

        return response()->json(['success'=>$imageName]);
    }

}
