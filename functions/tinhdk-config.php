<?php
/**
 * @package WordPress
 * @Theme TinhDk
 *
 * @author jackymon41@gmail.com
 * @link https://tinhdk.net
 */

// Trình đơn nền
// tinhdk_add_menus() Cho 'admin_menu' Hàm gọi lại của hook
function tinhdk_add_menus() {
	add_menu_page('TinhDk Settings', 'Cài đặt', 'manage_options', __FILE__, 'tinhdk_menu');
	add_submenu_page(__FILE__,'Website Recommend','Trang web được đề xuất',8,'tinhdk_submenu_recommend','tinhdk_submenu_recommend');
	add_submenu_page(__FILE__,'TinhDk Donate','Hỗ trợ tác giả',8,'tinhdk_submenu_donate','tinhdk_submenu_donate');
}

function tinhdk_menu() { ?>
	<style>
	.form-table th {padding: 10px 10px 10px 0;}
	.form-table td {padding: 10px 10px;}
	.regular-text {width: 20em;}
	#tinhdk_setuptime_year,#tinhdk_setuptime_month,#tinhdk_setuptime_day {width: 5em;display: inline-block;}
	</style>
	<div class="wrap">
	<h2>tinhdk<span style="font-size:12px;padding-left:2em;">Chào mừng bạn đến với Wordpress Theme TinhDk<a href="http://tinhdk.net/">Tính DK</a></span></h2>
    <?php
    if ($_POST['update_options']=='true') {
    	tinhdk_up_or_del('tinhdk_username');
    	tinhdk_up_or_del('tinhdk_useravatar');
    	tinhdk_up_or_del('tinhdk_description');
    	tinhdk_up_or_del('tinhdk_keywords');
    	tinhdk_up_or_del('tinhdk_mobile_qm');
		tinhdk_up_or_del('tinhdk_github');
    	tinhdk_up_or_del('tinhdk_facebook');
    	tinhdk_up_or_del('tinhdk_zalo');
    	tinhdk_up_or_del('tinhdk_instagram');
      	tinhdk_up_or_del('tinhdk_copyright');
      	tinhdk_up_or_del('tinhdk_setuptime_year');
      	tinhdk_up_or_del('tinhdk_setuptime_month');
      	tinhdk_up_or_del('tinhdk_setuptime_day');	
		tinhdk_up_or_del('tinhdk_sql_dbn');
		tinhdk_up_or_del('tinhdk_sql_dbu');
		tinhdk_up_or_del('tinhdk_sql_dbp');
		update_option('tinhdk_have_header_picture', $_POST['tinhdk_have_header_picture']);
		tinhdk_up_or_del('tinhdk_header_picture');
		tinhdk_up_or_del('tinhdk_foot_color');
		update_option('tinhdk_canvas_or_background', $_POST['tinhdk_canvas_or_background']);
		tinhdk_up_or_del('tinhdk_background');
		echo '<div><p>Lưu Lại!</p></div>';
	}
    ?>
	<form action="" method="post" id="tinhdk_menu_form">
   		<input type="hidden" name="update_options" value="true" />
      	<table class="form-table">
          	<tr>
              	<th scope="row"><label for="tinhdk_username">Biệt hiệu Blogger:</label></th>
    			<td>
                  	<input type="text" class="regular-text" name="tinhdk_username" id="tinhdk_username" value="<?php echo get_option('tinhdk_username'); ?>" />
                </td>
            </tr>
          	<tr>
              	<th scope="row"><label for="tinhdk_useravatar">Ảnh đại diện:</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_useravatar" id="tinhdk_useravatar" value="<?php echo get_option('tinhdk_useravatar'); ?>" />
					<a id="tinhdk_useravatar_upload" class="button" href="#">Chọn / tải ảnh lên</a>
    			</td>
    		</tr> 
            <tr>
              	<th scope="row">
					<input name="tinhdk_canvas_or_background" type="radio" value="0" <?php checked( '0', get_option( 'tinhdk_canvas_or_background' ) ); ?> /><label for="tinhdk_canvas">Background Canvas</label>
					<input name="tinhdk_canvas_or_background" type="radio" value="1" <?php checked( '1', get_option( 'tinhdk_canvas_or_background' ) ); ?> /><label for="tinhdk_background">Hình nền</label>
				</th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_background" id="tinhdk_background" value="<?php echo get_option('tinhdk_background'); ?>" />
					<a id="tinhdk_background_upload" class="button" href="#">Chọn / tải ảnh lên</a>
    			</td>
    		</tr>  
    		<tr>
              	<th scope="row"><label for="tinhdk_description">Mô tả Blog:</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_description" id="tinhdk_description" value="<?php echo get_option('tinhdk_description'); ?>" />
    			</td>
    		</tr>   
    		<tr>
              	<th scope="row"><label for="tinhdk_keywords">Từ khoá Blog:(Tách bằng ',')</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_keywords" id="tinhdk_keywords" value="<?php echo get_option('tinhdk_keywords'); ?>" />
    			</td>
    		</tr>
    		<tr>
              	<th scope="row"><label for="tinhdk_mobile_qm">Chữ ký điện thoại di động:</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_mobile_qm" id="tinhdk_mobile_qm" value="<?php echo get_option('tinhdk_mobile_qm'); ?>" />
    			</td>
    		</tr>
			 <tr>
                <th scope="row"><label for="tinhdk_github">Github:</label></th>
                <td>
                    <input type="text" class="regular-text" name="tinhdk_github" id="tinhdk_github" value="<?php echo get_option('tinhdk_github'); ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="tinhdk_facebook">Facebook:</label></th>
                <td>
                    <input type="text" class="regular-text" name="tinhdk_facebook" id="tinhdk_facebook" value="<?php echo get_option('tinhdk_facebook'); ?>" />
                </td>
            </tr>  
            <tr>
                <th scope="row"><label for="tinhdk_zalo">Zalo:</label></th>
                <td>
                    <input type="text" class="regular-text" name="tinhdk_zalo" id="tinhdk_zalo" value="<?php echo get_option('tinhdk_zalo'); ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="tinhdk_twitter">Twitter:</label></th>
                <td>
                    <input type="text" class="regular-text" name="tinhdk_twitter" id="tinhdk_twitter" value="<?php echo get_option('tinhdk_twitter'); ?>" />
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="tinhdk_instagram">Instagram:</label></th>
                <td>
                    <input type="text" class="regular-text" name="tinhdk_instagram" id="tinhdk_instagram" value="<?php echo get_option('tinhdk_instagram'); ?>" />
                </td>
            </tr>   
            <tr>  
            <tr>
              	<th scope="row"><label for="tinhdk_copyright">copyright:(Chẳng hạn như 2017, 2016-2017 và vân vân)</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_copyright" id="tinhdk_copyright" value="<?php echo get_option('tinhdk_copyright'); ?>" />
    			</td>
    		</tr>  
            <tr>
              	<th scope="row"><label for="tinhdk_setuptime_year">Ngày tạo blog:</label></th>
    			<td>
                	<input type="text" name="tinhdk_setuptime_year" id="tinhdk_setuptime_year" value="<?php echo get_option('tinhdk_setuptime_year'); ?>" />Năm
					<input type="text" name="tinhdk_setuptime_month" id="tinhdk_setuptime_month" value="<?php echo get_option('tinhdk_setuptime_month'); ?>" />Tháng
					<input type="text" name="tinhdk_setuptime_day" id="tinhdk_setuptime_day" value="<?php echo get_option('tinhdk_setuptime_day'); ?>" />Ngày
    			</td>
    		</tr> 
            <tr>
              	<th scope="row"><label for="tinhdk_sql_dbn">Tên cơ sở dữ liệu:</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_sql_dbn" id="tinhdk_sql_dbn" value="<?php echo get_option('tinhdk_sql_dbn'); ?>" />
    			</td>
    		</tr>
            <tr>
              	<th scope="row"><label for="tinhdk_sql_dbu">Tên người dùng cơ sở dữ liệu:</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_sql_dbu" id="tinhdk_sql_dbu" value="<?php echo get_option('tinhdk_sql_dbu'); ?>" />
    			</td>
    		</tr>  
            <tr>
              	<th scope="row"><label for="tinhdk_sql_dbp">Mật khẩu cơ sở dữ liệu:</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_sql_dbp" id="tinhdk_sql_dbp" value="<?php echo get_option('tinhdk_sql_dbp'); ?>" />
    			</td>
    		</tr>
            <tr>
              	<th scope="row">
					<input type="checkbox" name="tinhdk_have_header_picture" id="tinhdk_have_header_picture" value="1" <?php checked( '1', get_option( 'tinhdk_have_header_picture' ) ); ?>  />
					<label for="tinhdk_header_picture">Hình nền header:</label>
				</th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_header_picture" id="tinhdk_header_picture" value="<?php echo get_option('tinhdk_header_picture'); ?>" />
					<a id="tinhdk_header_picture_upload" class="button" href="#">Chọn / tải ảnh lên</a>
    			</td>
    		</tr>
            <tr>
              	<th scope="row"><label for="tinhdk_foot_color">Màu footer:</label></th>
    			<td>
                	<input type="text" class="regular-text" name="tinhdk_foot_color" id="tinhdk_foot_color" value="<?php echo get_option('tinhdk_foot_color'); ?>" />
    			</td>
    		</tr>     
        </table>
    	<p><input type="submit" class="button-primary" name="admin_options" value="Lưu lại"/></p>
    </form>
	</div>
<?php
wp_enqueue_media(); 
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-2.1.3.min.js"></script>
<script>   
jQuery(document).ready(function($){
    $('#tinhdk_useravatar_upload').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#tinhdk_useravatar').val(image_url);
        });
    });
    $('#tinhdk_header_picture_upload').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#tinhdk_header_picture').val(image_url);
        });
    });
	$('#tinhdk_background_upload').click(function(e) {
        e.preventDefault();
        var image = wp.media({ 
            title: 'Upload Image',
            // mutiple: true if you want to upload multiple files at once
            multiple: false
        }).open()
        .on('select', function(e){
            // This will return the selected image from the Media Uploader, the result is an object
            var uploaded_image = image.state().get('selection').first();
            // We convert uploaded_image to a JSON object to make accessing it easier
            // Output to the console uploaded_image
            console.log(uploaded_image);
            var image_url = uploaded_image.toJSON().url;
            // Let's assign the url value to the input field
            $('#tinhdk_background').val(image_url);
        });
    });
});
</script> 
<?php
}

function tinhdk_up_or_del($op) {
	update_option($op, $_POST[$op]);
	//Nếu giá trị rỗng, xoá dòng dữ liệu này
	if( empty($_POST[$op]) ) delete_option($op);
}

function tinhdk_submenu_recommend() {
    echo '
    <style>
    p>a{
        text-decoration: none;
        color: #000;
        padding: 5px;
        margin: 5px 0;
    }
    </style>
    <h2>Trang web</h2>
    <p><a href="https://tinhdk.net" target="_blank">Theme thuộc về bản quyền của Tính Dk~</a></p>
    <p><a href="https://facebook.com/tinh.dk" target="_blank">Facebook:Facebook của tác giả</a></p>
    <p><a href="http://fontawesome.io/icons/" target="_blank">fontawesome icons:Các biểu tượng được sử dụng</a></p>
    ';  
}
function tinhdk_submenu_donate() { ?>
    <h2>Donate</h2>
    <p>Hỗ trợ cho tác giả！</p>
    <img src="<?php bloginfo('template_url'); ?>/img/.png" width="100px" height="100px" />
    <img src="<?php bloginfo('template_url'); ?>/img/.png" width="100px" height="100px" />
<?php
}
add_action('admin_menu', 'tinhdk_add_menus');