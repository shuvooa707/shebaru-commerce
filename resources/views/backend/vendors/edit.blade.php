<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Vendor Update</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('admin.vendors.update',[$vendor->id]) }}" method="POST" id="ajax_form">
      @csrf
      {{ method_field('PATCH') }}
      <div class="modal-body">
          <div class="form-group mb-3">
              <input type="text" class="form-control" name="name" value="{{$vendor->name}}">
          </div>
          <div class="mb-3">
              <label class="form-label">Vendor whatsapp</label>
              <input value="{{ $vendor->whatsapp }}" type="text" name="whatsapp" class="form-control"
                     placeholder="Whatsapp Number">
          </div>
          <div class="mb-3">
              <label class="form-label">Vendor Facebook Link</label>
              <input value="{{ $vendor->facebook_link }}" type="text" name="facebook_link" class="form-control"
                     placeholder="Facebook Link">
          </div>
          <div class="mb-3">
              <label class="form-label">Vendor phone</label>
              <input value="{{ $vendor->phone }}" type="text" name="phone" class="form-control" placeholder="Phone Number">
          </div>
          <div class="mb-3">
              <label class="form-label">Vendor email</label>
              <input value="{{ $vendor->email }}" type="text" name="email" class="form-control" placeholder="Email">
          </div>

          <div class="form-group mb-3">
              <input type="file" class="form-control" name="image">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary"> Update</button>
      </div>
    </form>
  </div>
</div>
