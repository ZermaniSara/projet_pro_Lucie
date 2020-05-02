<?php
    namespace App\Http\Controllers;
    use App\Models\Post;
    use Illuminate\Http\Request;
    use File;
use ZipArchive;
    

    class PostController extends Controller {

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index(Request $request){
          
            $post= new post();
            $post->Canal=$request->Canal;
            
            $post->Mode=$request->Mode;
            
            $post->DateD=$request->DateD;

            
            $post->DateF=$request->DateF;
            
           
            
            
             
           

            $file = Post::where([
                ['date','<=',$post->DateF],
                ['date','>=',$post->DateD],
                ['canal','=', $post->Canal],
                ['mode','=',$post->Mode]
                ])->get();


                

                
             
              
//       $pathToFile = storage_path('app' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . $file->id  . DIRECTORY_SEPARATOR .  $file->image );

   
  //  return Response::download($pathToFile);




 
  if(file_exists("myNewFile.zip"))
  {
  unlink("myNewFile.zip");
  }
  
  $zip = new ZipArchive;
  
  
  $fileName = 'myNewFile.zip';





  if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE)
  {
      $files = File::files(public_path('myFiles'));
      $trouv=0;
      foreach ($files as $key => $value) {
          $relativeNameInZipFile = basename($value);
        
       
          foreach ($file as  $filee) {
            if ($filee->image == $relativeNameInZipFile )
            {
                $zip->addFile($value, $relativeNameInZipFile);
                $trouv=1;
            break;
            }
        }
          
          
            
        }
     
      
       
      $zip->close();
  }


if ($trouv==1){
return response()->download(public_path($fileName));
}
else { 
    echo "<script>alert('aucune image disponible');</script>";
 return view('download');

}
 









      
           
        }
    }