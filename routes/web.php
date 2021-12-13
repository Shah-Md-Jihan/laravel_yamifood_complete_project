<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\MenuCategoryController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\MenuProductController;
use App\Http\Controllers\MenuHeadingController;
use App\Http\Controllers\UserSubsciptionController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\ReviewHeadingController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MailboxController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index']);
Route::get('/menu', [FrontendController::class, 'menu']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/reservation', [FrontendController::class, 'reservation']);
Route::get('/stuff', [FrontendController::class, 'stuff']);
Route::post('/reservation/post', [FrontendController::class, 'reservationpost']);
Route::get('/gallery', [FrontendController::class, 'gallery']);
Route::get('/blog', [FrontendController::class, 'blog']);
Route::get('/blog/details/{blog_id}', [FrontendController::class, 'blogdetails']);
Route::post('/blog/comment/post', [FrontendController::class, 'blogcomment']);
Route::get('/blog/comment/reply/{comment_id}', [FrontendController::class, 'blogcommentreply']);
Route::post('/blog/comment/reply/post', [FrontendController::class, 'blogcommentreplypost']);
Route::get('/blog/comment/reply/all/{comment_id}', [FrontendController::class, 'blogcommentreplyall']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::post('/contact/post', [FrontendController::class, 'contactpost']);

// MailboxController Routes
Route::get('/mail/box', [MailboxController::class, 'mailbox']);
Route::get('/mail/mark/read/{mail_id}', [MailboxController::class, 'mailmarkread']);
Route::get('/mail/read/{mail_id}', [MailboxController::class, 'mailread']);
Route::get('/mail/delete/{mail_id}', [MailboxController::class, 'maildelete']);

// Auth::routes();
Auth::routes(['register' => false]);

Route::get('/home', [HomeController::class, 'dashboard'])->name('home');

// SliderController Routes
Route::get('add/slider', [SliderController::class, 'addslider']);
Route::post('add/slider/post', [SliderController::class, 'addsliderpost']);
Route::get('list/slider', [SliderController::class, 'listslider']);
Route::get('slider/update/{slider_id}', [SliderController::class, 'sliderupdate']);
Route::post('slider/update/post', [SliderController::class, 'sliderupdatepost']);
Route::get('slider/delete/{slider_id}', [SliderController::class, 'sliderdelete']);
Route::get('list/slider/deleted', [SliderController::class, 'listsliderdeleted']);
Route::get('slider/restore/{slider_id}', [SliderController::class, 'sliderrestore']);
Route::get('slider/hddelete/{slider_id}', [SliderController::class, 'sliderhddelete']);

// AboutController Routes
Route::get('add/about/content', [AboutController::class, 'addaboutcontent']);
Route::post('add/about/content/post', [AboutController::class, 'addaboutcontentpost']);
Route::get('add/about/content/list', [AboutController::class, 'addaboutcontentlist']);
Route::get('list/about/content/update/{about_id}', [AboutController::class, 'aboutcontentlistupdate']);
Route::post('list/about/content/update/post', [AboutController::class, 'aboutcontentupdatepost']);
Route::get('about/content/delete/{about_id}', [AboutController::class, 'aboutcontentdelete']);
Route::get('about/content/restore/{about_id}', [AboutController::class, 'aboutcontentrestore']);
Route::get('about/content/force/delete/{about_id}', [AboutController::class, 'aboutcontentforcedelete']);

// MenuCategoryController Routes
Route::get('add/menu/category', [MenuCategoryController::class, 'addmenucategory']);
Route::post('add/menu/category/post', [MenuCategoryController::class, 'addmenucategorypost']);
Route::get('menu/category/list', [MenuCategoryController::class, 'listmenucategory']);
Route::get('menu/category/update/{menu_category_id}', [MenuCategoryController::class, 'menucategoryupdate']);
Route::post('menu/category/update/post', [MenuCategoryController::class, 'menucategoryupdatepost']);
Route::get('menu/category/delete/{category_id}', [MenuCategoryController::class, 'menucategorydelete']);
Route::get('menu/category/restore/{category_id}', [MenuCategoryController::class, 'menucategoryrestore']);
Route::get('menu/category/hard/delete/{category_id}', [MenuCategoryController::class, 'menucategoryharddelete']);

// WordController Routes
Route::get('add/words', [WordController::class, 'addwords']);
Route::post('add/words/post', [WordController::class, 'addwordspost']);
Route::get('list/words', [WordController::class, 'listwords']);
Route::get('words/update/{word_id}', [WordController::class, 'updatewords']);
Route::post('words/update/post', [WordController::class, 'updatewordspost']);
Route::get('words/delete/{word_id}', [WordController::class, 'wordsdelete']);

// MenuProductController Routes
Route::get('add/menu', [MenuProductController::class, 'addmenu']);
Route::post('add/menu/post', [MenuProductController::class, 'addmenupost']);
Route::get('menu/product/list', [MenuProductController::class, 'menuproductlist']);
Route::get('menu/product/update/{menu_id}', [MenuProductController::class, 'menuproductupdate']);
Route::post('menu/product/update/post', [MenuProductController::class, 'menuproductupdatepost']);
Route::get('menu/product/delete/{menu_id}', [MenuProductController::class, 'menuproductdelete']);
Route::get('menu/product/list/deleted', [MenuProductController::class, 'menuproductlistdeleted']);
Route::get('menu/product/restore/{menu_id}', [MenuProductController::class, 'menuproductrestore']);
Route::get('menu/product/hard/delete/{menu_id}', [MenuProductController::class, 'menuproducthd']);

// MenuHeadingController Routes
Route::get('add/menu/headings', [MenuHeadingController::class, 'addmenuheadings']);
Route::get('menu/headings/list', [MenuHeadingController::class, 'listmenuheadings']);
Route::post('add/menu/heading/post', [MenuHeadingController::class, 'addmenuheadingspost']);
Route::get('update/menu/heading/{menu_heading_id}', [MenuHeadingController::class, 'updatemenuheadings']);
Route::post('update/menu/heading/post', [MenuHeadingController::class, 'updatemenuheadingspost']);
Route::get('menu/heading/delete/{menu_heading_id}', [MenuHeadingController::class, 'menuheadingdelete']);

// UserSubsciptionController Routes
Route::post('add/subcription/post', [UserSubsciptionController::class, 'addsubcription']);
Route::get('subcription/delete', [UserSubsciptionController::class, 'subcriptiondelete']);

// GalleryController Routes
Route::get('add/gallery', [GalleryController::class, 'addgallery']);
Route::post('add/gallery/post', [GalleryController::class, 'addgallerypost']);
Route::get('list/gallery', [GalleryController::class, 'listgallery']);
Route::get('gallery/image/update/{gallery_id}', [GalleryController::class, 'galleryimageupdate']);
Route::post('update/gallery/post', [GalleryController::class, 'updategallerypost']);
Route::get('gallery/image/delete/{gallery_id}', [GalleryController::class, 'galleryimagedelete']);
Route::get('add/gallery/headings', [GalleryController::class, 'addgalleryheadings']);
Route::post('add/gallery/headings/post', [GalleryController::class, 'addgalleryheadingspost']);
Route::get('gallery/headings/list', [GalleryController::class, 'galleryheadinglist']);
Route::get('gallery/heading/update/{heading_id}', [GalleryController::class, 'galleryheadingupdate']);
Route::post('gallery/heading/update/post', [GalleryController::class, 'galleryheadingupdatepost']);
Route::get('gallery/heading/delete/{heading_id}', [GalleryController::class, 'galleryheadingdelete']);

// ReviewHeadingController Routes
Route::get('add/review/heading', [ReviewHeadingController::class, 'addreviewheading']);
Route::post('add/review/heading/post', [ReviewHeadingController::class, 'addreviewheadingpost']);
Route::get('review/heading/list', [ReviewHeadingController::class, 'listreviewheading']);
Route::get('review/heading/edit/{review_heading_id}', [ReviewHeadingController::class, 'editreviewheading']);
Route::post('review/heading/edit/post', [ReviewHeadingController::class, 'editreviewheadingpost']);
Route::get('review/heading/delete/{review_heading_id}', [ReviewHeadingController::class, 'reviewheadingdelete']);

// ReviewController Routes
Route::get('add/review', [ReviewController::class, 'addreview']);
Route::post('add/review/post', [ReviewController::class, 'addreviewpost']);
Route::get('list/review', [ReviewController::class, 'listreview']);
Route::get('review/details/{review_id}', [ReviewController::class, 'reviewdetails']);
Route::get('review/edit/{review_id}', [ReviewController::class, 'reviewedit']);
Route::post('review/edit/post', [ReviewController::class, 'revieweditpost']);
Route::get('review/delete/{review_id}', [ReviewController::class, 'reviewdelete']);

// StuffController Routes
Route::get('add/stuff', [StuffController::class, 'addstuff']);
Route::post('add/stuff/post', [StuffController::class, 'addstuffpost']);
Route::get('stuff/list', [StuffController::class, 'stufflist']);
Route::get('stuff/edit/{stuff_id}', [StuffController::class, 'stuffedit']);
Route::post('stuff/edit/post', [StuffController::class, 'stuffeditpost']);
Route::get('stuff/delete/{stuff_id}', [StuffController::class, 'stuffdelete']);

// BlogController Routes
Route::get('add/blog', [BlogController::class, 'addblog']);
Route::post('add/blog/post', [BlogController::class, 'addblogpost']);
Route::get('/blog/list', [BlogController::class, 'bloglist']);
Route::get('/blog/edit/{blog_id}', [BlogController::class, 'blogedit']);
Route::post('/blog/edit/post', [BlogController::class, 'blogeditpost']);
Route::get('/blog/delete/{blog_id}', [BlogController::class, 'blogdelete']);
