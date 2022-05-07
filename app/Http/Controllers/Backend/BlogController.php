<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;
class BlogController extends Controller
{
    public function blogCategory(){
    $blogcategory = BlogPostCategory::latest()->get();
    	return view('backend.blog.category.category_view',compact('blogcategory'));
    }



    public function blogCategoryStore(Request $request){



        BlogPostCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
		    'blog_category_name_srb' => $request->blog_category_name_srb,
		    'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
		    'blog_category_slug_srb' => str_replace(' ', '-',$request->blog_category_name_srb),
		    'created_at' => Carbon::now(),

        ]);

        
	    $notification = array(
			'message' => 'Blog Category Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }


    public function blogCategoryEdit($id){

        $blogcategory = BlogPostCategory::findOrFail($id);
             return view('backend.blog.category.category_edit',compact('blogcategory'));
         }
     
     
     
     
     public function blogCategoryUpdate(Request $request){
     
            $blogcar_id = $request->id;
     
     
         BlogPostCategory::findOrFail($blogcar_id)->update([
             'blog_category_name_en' => $request->blog_category_name_en,
             'blog_category_name_srb' => $request->blog_category_name_srb,
             'blog_category_slug_en' => strtolower(str_replace(' ', '-',$request->blog_category_name_en)),
             'blog_category_slug_srb' => str_replace(' ', '-',$request->blog_category_name_srb),
             'created_at' => Carbon::now(),
     
     
             ]);
     
             $notification = array(
                 'message' => 'Blog Category Updated Successfully',
                 'alert-type' => 'info'
             );
     
             return redirect()->route('blog.category')->with($notification);
     
         } // end method 


         public function listBlogPost(){
            $blogpost = BlogPost::with('category')->latest()->get();
            return view('backend.blog.post.post_list',compact('blogpost'));
      }

         public function addBlogPost(){

            $blogcategory = BlogPostCategory::latest()->get();
              $blogpost = BlogPost::latest()->get();
              return view('backend.blog.post.post_view',compact('blogpost','blogcategory'));
        
          }   
     

          public function blogPostStore(Request $request){

            $request->validate([
                  'post_title_en' => 'required',
                  'post_title_srb' => 'required',
                  'post_image' => 'required',
              ],[
                  'post_title_en.required' => 'Input Post Title English Name',
                  'post_title_srb.required' => 'Input Post Title Srb Name',
              ]);
      
              $image = $request->file('post_image');
              $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
              Image::make($image)->resize(780,433)->save('upload/post/'.$name_gen);
              $save_url = 'upload/post/'.$name_gen;
      
          BlogPost::insert([
              'category_id' => $request->category_id,
              'post_title_en' => $request->post_title_en,
              'post_title_srb' => $request->post_title_srb,
              'post_slug_en' => strtolower(str_replace(' ', '-',$request->post_title_en)),
              'post_slug_srb' => str_replace(' ', '-',$request->post_title_srb),
              'post_image' => $save_url,
              'post_details_en' => $request->post_details_en,
              'post_details_srb' => $request->post_details_srb,
              'created_at' => Carbon::now(),
      
              ]);
      
              $notification = array(
                  'message' => 'Blog Post Inserted Successfully',
                  'alert-type' => 'success'
              );
      
              return redirect()->route('list.post')->with($notification);
      
        } // end mehtod 




        public function removeBlogPost($id){

            BlogPost::findOrFail($id)->delete();
      
            $notification = array(
                'message' => 'Blog Deleted Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
        }

        public function removeBlogCategory($id){

           BlogPostCategory::findOrFail($id)->delete();
      
            $notification = array(
                'message' => 'Blog Category Deleted Successfully',
                'alert-type' => 'info'
            );
    
            return redirect()->back()->with($notification);
        }
}

