<div class="alert alert-danger">Dường như là bên ZingTV đã fix lại và bên API cũng không tìm được giải pháp nên tool này
    tạm thời sẽ không còn hoạt động nữa...
</div>

<div class="row">
    <div class="col-md-10">
        <input type="text" id="link-ztv" class="form-control" placeholder="> Nhập link ZingTV cần get..."
               required="true" disabled/>
    </div>

    <div class="col-md-2">
        <button id="get" class="btn btn-primary disabled">GET <i class="fa fa-download"></i></button>
    </div>
</div>

<hr/>
<img id="loading-image" class="sticker" src="http://tatviquyen.name.vn/wp-content/uploads/2017/05/preloader.gif"
     width="150px" style="display:none;"/>
<div class="result-ztv text-center animated bounceInUp">
</div>

<hr/>
<div class="bd-callout">
    <h4><strong>Lưu ý:</strong></h4>
    <ul>
        <li>Chỉ chấp nhận link có dạng:
            <strong>http://tv.zing.vn/video/Doan-Thieu-Nien-Nang-Luong-Tap-1/IWZC6086.html</strong></li>
        <li>Một số video sẽ chưa cập nhật 720p do mới upload hoặc không có định dạng HD.</li>
        <li>API <a href="https://videoapi.io/" target="_blank">@https://videoapi.io</a></li>
        <li>Nên mua tài khoản Zing VIP chính chủ.</li>
        <li>
            <mark>Cập nhật:</mark>
            29/05/2017
        </li>
    </ul>
</div>

<script>// jQuery(document).ready(function(a){a("#get").on("click",function(){var b=a("#link-ztv").val();a.ajax({url:"http://tatviquyen.name.vn/wp-content/themes/bs-4-wp/inc/videoapi-io.php",type:"POST",data:{link:b},beforeSend:function(){a("#loading-image").css("display","block")},success:function(b){a("#loading-image").hide();a(".result-ztv").html(b)}})})});</script>
