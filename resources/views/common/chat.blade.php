<div class="row">
  <div class="comment-area col s12">
    @for ($i = 0; $i < 5; $i++)
      <div class="collection">
        <div class="collection-item avatar left-align">
          <img src="/images/profile_images/default.jpg" alt="" class="circle">
          <span class="title">name</span>
          <p>
             ここにチャット内容
          </p>
        </div>
      </div>
    @endfor
  </div>

  <div class="comment">
      <div class="collection">
          <div class="collection-item avatar left-align">
              <img src="/images/profile_images/default.jpg" alt="" class="circle">
              <span class="name">name</span>
                <input type="text" id="icon_prefix2" class="materialize-textarea" name="comment_text" size="50">
                <div class="wap-comment right-align">
                    <input type="submit" value="送信" class="comment-submit waves-effect waves-light btn">
                </div>
          </div>
      </div>
  </div>
</div>
