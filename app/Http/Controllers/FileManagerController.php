<?php

namespace App\Http\Controllers;

use App\Entities\FileManager;
use App\Entities\TicketComment;

use Illuminate\Http\Request;
use App\Http\Requests;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class FileManagerController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$entries = FileManager::all();
 
		return view('filemanager.files_index', compact('entries'));
	}
 
	public function add(Request $request, $id) {
 
		$file = $request->filefield;
		$extension = $file->getClientOriginalExtension();
		Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
		$entry = new FileManager();
		$entry->mime = $file->getClientMimeType();
		$entry->original_filename = $file->getClientOriginalName();
		$entry->filename = $file->getFilename().'.'.$extension;
		$entry->ticket_id = $id;
		$entry->user_id = auth()->user()->id; 
 
		$entry->save();

//Grabo un comentario con el alta del archivo
        $comment = new TicketComment();
        $comment->user_id    = \Auth::user()->id;
        $comment->tipo       = 'Documento';
        $comment->comentario = "Se agregó un documento. <a href='".route('filemanager.get', $entry->filename)."'>".$entry->original_filename."</a>";
        $comment->responde   = 0;
        $comment->tipo_obs   = '';
        $comment->ticket_id  = $id;
        $comment->save();

        return redirect()->back();
//		return redirect('filemanager.index');
		
	}

	public function get($filename){
	
		$entry = FileManager::where('filename', '=', $filename)->firstOrFail();
		$file = Storage::disk('local')->get($entry->filename);
 
		return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
	}	
}
