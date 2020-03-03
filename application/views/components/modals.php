<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Yeni yetim ekle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body card">
        <form method="post" action="<?=base_url('main/insert')?>">
          <div class="row p-3">
            <div class="col">
              <input name="content" class="form-control rounded-pill border-0 shadow-lg px-4" placeholder="Örneğin denizaltı çalışma mantığının araştırılması"></input>
              <small>Tek cümle ile anlaşılır ve net görevler ekleyiniz</small>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
            <button type="submit" class="btn btn-success">Kaydet</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>