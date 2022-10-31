<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Image;
use File;
use App\seo;
use App\ladipage;
use App\section;
use App\menu;
use App\images;

class c_ladipage extends Controller
{
    public function getlist()
    {
        $ladipage = ladipage::orderBy('id','desc')->get();
        return view('admin.ladipage.list',[
            'ladipage'=>$ladipage,
        ]);
    }

    public function search(Request $Request)
    {
        $datefilter[] = '';
        $ladipage = ladipage::where('sort_by',2)->orderBy('id','desc')->where('id','!=' , 0);
        if($Request->key){
            $ladipage->where('name','like',"%$Request->key%");
        }
        if($Request->category_id){
            $ladipage->where('category_id',$Request->category_id);
        }
        if(isset($Request->datefilter)){
            $datefilter = explode(" - ", $Request->datefilter);
            $day1 = date('Y-m-d',strtotime($datefilter[0]));
            $day2 = date('Y-m-d',strtotime($datefilter[1]));
            // $ladipage->whereBetween('created_at', [$day1, $day2]);
            $ladipage->whereDate('created_at','>=', $day1)->whereDate('created_at','<=', $day2);
        }
        $ladipage = $ladipage->paginate($Request->paginate);
        $category = category::where('sort_by',2)->orderBy('id','desc')->get();
        return view('admin.ladipage.list',[
            'ladipage'=>$ladipage,
            'category'=>$category,
            'key'=>$Request->key,
            'category_id'=>$Request->category_id,
            'datefilter'=>$Request->datefilter,
            'paginate'=>$Request->paginate,
        ]);
    }

    public function getadd()
    {
        $menu = menu::orderBy('view','asc')->get();
        return view('admin.ladipage.addedit',[
            'menu'=>$menu,
        ]);
    }

    public function postadd(Request $Request)
    {
        $this->validate($Request,[
            'name' => 'unique:ladipage,name',
        ],[
            'name.unique'=>'Tên bài viết đã tồn tại',
        ] );

        $ladipage = new ladipage;
        $ladipage->user_id = Auth::User()->id;
        $ladipage->name = $Request->name;
        $ladipage->menu_id = $Request->menu_id;
        $ladipage->slug = changeTitle($Request->name);
        $ladipage->detail = $Request->detail;
        $ladipage->content = $Request->content;
        $ladipage->status = 'true';
        // thêm ảnh
        if ($Request->hasFile('img')) {
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/ladipage/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/ladipage/300/'.$filename));
            $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/ladipage/80/'.$filename));
            $file->move('data/ladipage', $filename);
            $ladipage->img = $filename;
        }
        // thêm ảnh
        $ladipage->save();
        return redirect('admin/ladipage/list')->with('Alerts','Thành công');
    }

    public function getedit($id)
    {
        $data = ladipage::findOrFail($id);
        $menu = menu::orderBy('view','asc')->get();
        return view('admin.ladipage.addedit',[
            'data'=>$data,
            'menu'=>$menu,
        ]);
    }

    public function postedit(Request $Request,$id)
    {
        $ladipage = ladipage::find($id);
        $ladipage->name = $Request->name;
        $ladipage->menu_id = $Request->menu_id;
        $ladipage->slug = changeTitle($Request->name);
        $ladipage->detail = $Request->detail;
        $ladipage->content = $Request->content;
        
        if ($Request->hasFile('img')) {
            // xóa ảnh cũ
            if(File::exists('data/ladipage/'.$ladipage->img)) { 
                File::delete('data/ladipage/'.$ladipage->img); 
                File::delete('data/ladipage/300/'.$ladipage->img); 
                File::delete('data/ladipage/80/'.$ladipage->img); 
            }
            // xóa ảnh cũ
            // thêm ảnh mới
            $file = $Request->file('img');
            $filename = $file->getClientOriginalName();
            while(file_exists("data/ladipage/300/".$filename)){ $filename = str_random(4)."_".$filename; }
            $img = Image::make($file)->resize(300, 300, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/ladipage/300/'.$filename));
            $img = Image::make($file)->resize(80, 80, function ($constraint) {$constraint->aspectRatio();})->save(public_path('data/ladipage/80/'.$filename));
            $file->move('data/ladipage', $filename);
            $ladipage->img = $filename;
            // thêm ảnh mới
        }
        $ladipage->save();
        
        if(isset($Request->namesection)){
            foreach($Request->namesection as $key => $name){
                $section = new section;
                $section->name = $name;
                $section->ladipage_id = $id;
                $section->content = $Request->contentsection[$key];

                if ($Request->hasFile('imgsection') && isset($Request->file('imgsection')[$key])) {
                    $file = $Request->file('imgsection')[$key];
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/ladipage/".$filename)){ $filename = str_random(4)."_".$filename; }
                    $file->move('data/ladipage', $filename);
                    $section->img = $filename;
                }
                $section->save();
            }
        }

        if(isset($Request->editidsection)){
            foreach($Request->editidsection as $key => $sid){
                $section = section::find($sid);
                $section->name = $Request->editnamesection[$key];
                $section->content = $Request->editcontentsection[$key];

                if ($Request->hasFile('editimgsection') && isset($Request->file('editimgsection')[$key])) {
                    $file = $Request->file('editimgsection')[$key];
                    $filename = $file->getClientOriginalName();
                    while(file_exists("data/ladipage/".$filename)){ $filename = str_random(4)."_".$filename; }
                    $file->move('data/ladipage', $filename);
                    $section->img = $filename;
                }
                $section->save();
            }
        }
       
        return redirect('admin/ladipage/edit/'.$id)->with('Alerts','Thành công');
    }

    public function getdelete($id)
    {
        $ladipage = ladipage::find($id);
        
        // xóa ảnh
        if(File::exists('data/ladipage/'.$ladipage->img)) {
            File::delete('data/ladipage/'.$ladipage->img);
            File::delete('data/ladipage/300/'.$ladipage->img);
            File::delete('data/ladipage/80/'.$ladipage->img);
        }
        // xóa ảnh
        $ladipage->delete();
        return redirect('admin/ladipage/list')->with('Alerts','Thành công');
    }

}
