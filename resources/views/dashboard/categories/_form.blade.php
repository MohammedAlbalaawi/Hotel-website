<div class="form-group">
    <label for="name">Category Name</label>
    <input type="text" name="name" @class(['form-control','is-invalid' => $errors->has('name')]) value="{{old('name',$model->name)}}">
    @error('name')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="form-group">
    <label for="name">Category Parent</label>
    <select name="parent_id" class="form-control form-select" >
        <option value="">Primary Category</option>
        @foreach($parents as $parent)
            <option value="{{ $parent->id}}" @selected(old('parent_id',$model->parent_id) == $parent->id)>{{ $parent->name }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" @class(['form-control','is-invalid' => $errors->has('description')])>{{old('description',$model->description)}}</textarea>
    @error('description')
    <div class="invalid-feedback">
        {{$message}}
    </div>
    @enderror
</div>

<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text" >Upload</span>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="image" accept="image/*">
        <label class="custom-file-label" >Choose file</label>
    </div>
</div>

<div class="form-group">
    <label for="status">Status</label>
    <div class="form-check">
        <input class="form-check-input"  type="radio" name="status" value="active" @checked(old('status',$model->status) == 'active')>
        <label class="form-check-label">
            Active
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" value="archived" @checked(old('status',$model->status) == 'archived')>
        <label class="form-check-label" >
            Archived
        </label>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
