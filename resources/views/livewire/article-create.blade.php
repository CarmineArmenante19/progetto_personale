<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div>
                <form wire:submit.prevent="create">
                    <div class="mb-3">
                      <label  class="form-label">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.debounce.lazy="name">
                      @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Brand</label>
                        <input type="text" class="form-control @error('brand') is-invalid @enderror" wire:model.debounce.lazy="brand">
                        @error('brand')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Category</label>
                        <select wire:model.defer="category" class="form-control @error('category') is-invalid @enderror">
                            <option value="">Seleziona una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="" cols="30" rows="10" wire:model.debounce.lazy="description"></textarea>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="mb-3">
                        <label  class="form-label">Price</label>
                        <input type="number" step="0.1" class="form-control @error('price') is-invalid @enderror" wire:model.debounce.lazy="price">
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    <button type="submit" class="btn btn-primary">Publish</button>
                  </form>
            </div>
        </div>
    </div>
</div>
