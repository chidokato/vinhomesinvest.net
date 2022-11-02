<?php
Route::get('admin','c_login@getlogin'); // login vào admin
Route::get('login','c_login@getlogin'); // login vào admin
Route::post('login','c_login@postlogin'); // xử lý login
Route::get('resetpassword','c_login@getresetpassword'); // lấy lại mật khẩu
Route::post('resetpassword','c_login@postresetpassword'); // lấy lại mật khẩu
Route::get('sendcapchar/{email}','c_ajax@sendcapchar'); // gửi mã xác nhận về mail
Route::get('signup','c_login@getsignup'); // đăng ký
Route::post('signup','c_login@postsignup'); // đăng ký
Route::get('logout','c_login@logout'); // logout

Route::group(['prefix'=>'admin','middleware'=>'admin'],function(){

	Route::get('dashboard','c_dashboard@dashboard')->middleware('can:dashboard');
	Route::post('dashboard-search','c_dashboard@search')->middleware('can:dashboard');

	Route::group(['prefix'=>'user'],function(){
		Route::get('list','usercontroller@getlist')->middleware('can:user');
		Route::get('edit/{id}','usercontroller@getedit')->middleware('can:user');
		Route::post('edit/{id}','usercontroller@postedit');
		Route::get('add','usercontroller@getadd')->middleware('can:user');
		Route::post('add','usercontroller@postadd');
		Route::get('delete/{id}','usercontroller@getdelete')->middleware('can:user');
		Route::post('search','usercontroller@search');
		Route::get('profile/{id}','usercontroller@profile');
		Route::get('alerts/{id}','usercontroller@alerts');

	});
	Route::group(['prefix'=>'category'],function(){
		Route::get('list','c_category@getlist')->middleware('can:superadmin');
		Route::get('add','c_category@getadd');
		Route::post('add','c_category@postadd');
		Route::get('edit/{id}','c_category@getedit');
		Route::get('double/{id}','c_category@double');
		Route::post('edit/{id}','c_category@postedit');
		Route::get('delete/{id}','c_category@getdelete');
		Route::post('delete_all','c_category@delete_all');
		Route::post('search','c_category@search');
	});
	Route::group(['prefix'=>'menu'],function(){
		Route::get('list','c_menu@getlist')->middleware('can:superadmin');
		Route::get('add','c_menu@getadd');
		Route::post('add','c_menu@postadd');
		Route::get('edit/{id}','c_menu@getedit');
		Route::get('double/{id}','c_menu@double');
		Route::post('edit/{id}','c_menu@postedit');
		Route::get('delete/{id}','c_menu@getdelete');
		Route::post('delete_all','c_menu@delete_all');
		Route::post('search','c_menu@search');
	});
	Route::group(['prefix'=>'product'],function(){
		Route::get('list','c_product@getlist')->middleware('can:superadmin');
		Route::get('add','c_product@getadd');
		Route::post('add','c_product@postadd');
		Route::get('edit/{id}','c_product@getedit');
		Route::get('double/{id}','c_product@double');
		Route::post('edit/{id}','c_product@postedit');
		Route::get('delete/{id}','c_product@getdelete');
		Route::post('delete_all','c_product@delete_all');
		Route::post('search','c_product@search');

		Route::post('add_section', 'c_product@add_section');
	});
	Route::group(['prefix'=>'news'],function(){
		Route::get('list','c_news@getlist')->middleware('can:superadmin');
		Route::get('add','c_news@getadd');
		Route::post('add','c_news@postadd');
		Route::get('edit/{id}','c_news@getedit');
		Route::get('double/{id}','c_news@double');
		Route::post('edit/{id}','c_news@postedit');
		Route::get('delete/{id}','c_news@getdelete');
		Route::post('delete_all','c_news@delete_all');
		Route::post('search','c_news@search');
		Route::post('addflast','c_news@addflast');
	});

	Route::group(['prefix'=>'ladipage'],function(){
		Route::get('list','c_ladipage@getlist')->middleware('can:superadmin');
		Route::get('add','c_ladipage@getadd');
		Route::post('add','c_ladipage@postadd');
		Route::get('edit/{id}','c_ladipage@getedit');
		Route::get('double/{id}','c_ladipage@double');
		Route::post('edit/{id}','c_ladipage@postedit');
		Route::get('delete/{id}','c_ladipage@getdelete');
		Route::post('delete_all','c_ladipage@delete_all');
		Route::post('search','c_ladipage@search');
		Route::post('addflast','c_ladipage@addflast');
	});

	Route::group(['prefix'=>'messages'],function(){
		Route::get('list','c_messages@getlist')->middleware('can:superadmin');
		Route::get('add','c_messages@getadd');
		Route::post('add','c_messages@postadd');
		Route::get('edit/{id}','c_messages@getedit');
		Route::post('edit/{id}','c_messages@postedit');
		Route::get('delete/{id}','c_messages@getdelete');
		Route::post('search','c_messages@search');
	});

	Route::group(['prefix'=>'themes'],function(){
		Route::get('list','c_themes@getlist')->middleware('can:superadmin');
		Route::get('add','c_themes@getadd');
		Route::post('add','c_themes@postadd');
		Route::get('edit/{id}','c_themes@getedit');
		Route::get('double/{id}','c_themes@double');
		Route::post('edit/{id}','c_themes@postedit');
		Route::get('delete/{id}','c_themes@getdelete');
		Route::post('delete_all','c_themes@delete_all');
		Route::post('search','c_themes@search');
	});
	Route::group(['prefix'=>'seo'],function(){
		Route::get('list','c_seo@getlist')->middleware('can:superadmin');
		Route::get('add','c_seo@getadd');
		Route::post('add','c_seo@postadd');
		Route::get('edit/{id}','c_seo@getedit');
		Route::get('double/{id}','c_seo@double');
		Route::post('edit/{id}','c_seo@postedit');
		Route::get('delete/{id}','c_seo@getdelete');
		Route::post('delete_all','c_seo@delete_all');
		Route::post('search','c_seo@search');
	});
	Route::group(['prefix'=>'slider'],function(){
		Route::get('list','c_slider@getlist')->middleware('can:superadmin');
		Route::get('add','c_slider@getadd');
		Route::post('add','c_slider@postadd');
		Route::get('edit/{id}','c_slider@getedit');
		Route::post('edit/{id}','c_slider@postedit');
		Route::get('delete/{id}','c_slider@getdelete');
	});
	Route::group(['prefix'=>'setting'],function(){
		Route::get('list','c_setting@getlist')->middleware('can:superadmin');
		Route::post('edit/{id}','c_setting@postedit');
	});

	// giày dép
	Route::group(['prefix'=>'giaydep'],function(){
		Route::get('list','c_giaydep@getlist')->middleware('can:superadmin');
		Route::get('add','c_giaydep@getadd');
		Route::post('edit','c_giaydep@postedit');
	});
	Route::group(['prefix'=>'quanlykho'],function(){
		Route::get('list','c_quanlykho@getlist')->middleware('can:superadmin');
		Route::get('edit/{id}','c_quanlykho@getedit');
		Route::post('edit/{id}','c_quanlykho@postedit');
		Route::get('delete/{qid}/{id}','c_quanlykho@getdelete');
	});
	Route::group(['prefix'=>'nhaphang'],function(){
		Route::get('list','c_nhaphang@getlist')->middleware('can:superadmin');
		Route::get('add','c_nhaphang@getadd');
		Route::post('add','c_nhaphang@postadd'); // lưu đơn hàng
		Route::get('edit/{id}','c_nhaphang@getedit'); // get edit
		Route::post('edit/{id}','c_nhaphang@postedit');
		Route::get('deleteorder/{id}','c_nhaphang@deleteorder'); // xóa đơn hàng
		Route::get('dell_nhaphang/{id}/{od_id}','c_nhaphang@dell_nhaphang'); // xóa sp bán
		Route::get('add_nhaphang/{id}','c_nhaphang@add_sp'); // thêm sản phẩm bán
		Route::post('search','c_nhaphang@search');
	});
	Route::group(['prefix'=>'banhang'],function(){
		Route::get('list','c_banhang@getlist')->middleware('can:superadmin');
		Route::get('add','c_banhang@getadd');
		Route::post('add','c_banhang@postadd'); // lưu đơn hàng
		Route::get('edit/{id}','c_banhang@getedit'); // get edit
		Route::post('edit/{id}','c_banhang@postedit');
		Route::get('deleteorder/{id}','c_banhang@deleteorder'); // xóa đơn hàng
		Route::get('dell_banhang/{id}/{od_id}','c_banhang@dell_banhang'); // xóa sp bán
		Route::get('add_banhang/{id}','c_banhang@add_sp'); // thêm sản phẩm bán
		Route::post('search','c_banhang@search');
	});
	// end giày dép

	// bất động sản
	Route::group(['prefix'=>'province'],function(){
		Route::get('list','c_province@getlist')->middleware('can:superadmin');
		Route::get('edit/{id}','c_province@getedit'); // get edit
		Route::post('edit/{id}','c_province@postedit');
		Route::post('search','c_province@search');
	});
	Route::group(['prefix'=>'district'],function(){
		Route::get('list','c_district@getlist')->middleware('can:superadmin');
		Route::post('loc','c_district@loc');
	});
	Route::group(['prefix'=>'ward'],function(){
		Route::get('list','c_ward@getlist')->middleware('can:superadmin');
		Route::post('loc','c_ward@loc');
	});
	Route::group(['prefix'=>'street'],function(){
		Route::get('list','c_street@getlist')->middleware('can:superadmin');
		Route::post('loc','c_street@loc');
	});
	Route::group(['prefix'=>'investor'],function(){
		Route::get('list','c_investor@getlist')->middleware('can:superadmin');
		Route::get('add','c_investor@getadd');
		Route::post('add','c_investor@postadd');
		Route::get('edit/{id}','c_investor@getedit');
		Route::get('double/{id}','c_investor@double');
		Route::post('edit/{id}','c_investor@postedit');
		Route::get('delete/{id}','c_investor@getdelete');
		Route::post('delete_all','c_investor@delete_all');
		Route::post('search','c_investor@search');
	});
	// end bất động sản
	
	Route::group(['prefix'=>'ajax'],function(){
		Route::get('sort_by/{id}','c_ajax@sortby'); // category
		Route::get('update_status_category/{id}','c_ajax@update_status_category');
		Route::get('update_home_category/{id}','c_ajax@update_home_category');
		Route::get('update_status_menu/{id}','c_ajax@update_status_menu');
		Route::get('updateview/{id}','c_ajax@updateview'); // update view menu/list

		// nhập hàng
		Route::get('articles/{id}','c_ajax@articles');
		Route::get('mausac/{id}/{a_id}','c_ajax@mausac');
		Route::get('mausac1/{id}/{a_id}','c_ajax@mausac1');
		Route::get('change_khang/{kh_id}','c_ajax@change_khang'); //khách hàng
		Route::get('change_order/{od_id}','c_ajax@change_order'); //đơn hàng
		
		// bán hàng
		Route::get('updatetonkho/{id}','c_ajax@updatetonkho');
		Route::get('updatestatustonkho/{id}','c_ajax@updatestatustonkho');
		Route::get('change_ms/{ms_id}','c_ajax@change_ms');
		Route::get('change_f/{f_id}','c_ajax@change_f');
		Route::get('addsp/{od_id}','c_ajax@addsp');
		Route::get('updatechannelname/{id}','c_ajax@updatechannelname');
		Route::get('addchannel/{name}','c_ajax@addchannel');
		Route::get('delchannel/{id}','c_ajax@delchannel');
		Route::get('add_banhang/{id}','c_ajax@delchannel');

		// articles
		Route::get('del_img_detail/{id}','c_ajax@del_img_detail');
		Route::get('update_status_articles/{id}','c_ajax@update_status_articles');

		// themes
		Route::get('update_status_themes/{id}','c_ajax@update_status_themes');

		// location
		Route::get('update_status_province/{id}','c_ajax@update_status_province');
		Route::get('update_status_district/{id}','c_ajax@update_status_district');
		Route::get('change_province/{id}','c_ajax@change_province');
		Route::get('change_district/{id}','c_ajax@change_district');
		Route::get('change_district_street/{id}','c_ajax@change_district_street');

		// product
		Route::get('del_section/{id}','c_ajax@del_section');
	});
});


Route::get('/','c_frontend@home');
Route::get('profile','c_frontend@profile');
Route::get('messages','c_frontend@messages');
Route::get('/search','c_frontend@search');
Route::get('ajax/change_province/{id}','c_ajax@change_province');
Route::get('ajax/viewslayout/{id}','c_ajax@viewslayout');

Route::get('update_status_messages/{id}','c_ajax@update_status_messages');
Route::get('del_messages/{id}','c_ajax@del_messages');
Route::get('delall_messages/{id}','c_frontend@delall_messages');
Route::get('check_messages/{id}','c_frontend@check_messages');

Route::get('sitemap.xml','c_frontend@sitemap');
Route::get('wishlist','c_frontend@wishlist');
Route::get('cart','c_frontend@cart');
Route::get('my-account','c_frontend@myaccount');
Route::get('{curl}','c_frontend@category');
Route::get('{curl}/{arurl}','c_frontend@articles');
Route::POST('dang-ky','c_frontend@dangky');
Route::get('/search','c_frontend@search');
