    @csrf


    <div class="from-group custom-file">

        <input
        type="file"
        class="custom-file-input @error('image') is-invalid @else border-1 @enderror"
        name="image"
        id="image"
        value="{{ old('image', $project->image) }}">
        <label class="custom-file-label" for="image">Select a image</label>

        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select
        class="form-control bg-light shadow-sm @error('category_id') is-invalid @else border-1 @enderror"
        name="category_id"
        id="category_id"
        >
        <option value="">Select the category</option>
        @foreach ($categories as $id => $name)
            <option value="{{ $id }}"
            @if ($id == old('category_id', $project->category_id)) selected @endif
            >
            {{ $name }}
            </option>
        @endforeach
        </select>
        @error('category_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="from-group">

        <label for="title">Titulo:</label>
        <input class="form-control bg-light shadow-sm @error('title') is-invalid @else border-1 @enderror"
                id="title"
                type="text"
                name="title"
                value="{{ old('title', $project->title) }}">

        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <div class="from-group">

        <label for="description">Descripción:</label>
        <textarea class="form-control bg-light shadow-sm @error('description') is-invalid @else border-2 @enderror"
                name="description"
                id="" cols="30"
                rows="10">{{ old('description', $project->description) }}
        </textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>


    <div class="from-group">

        <label for="url">Url:</label>
        <input class="form-control bg-light shadow-sm @error('url') is-invalid @else border-1 @enderror"
            id="url"
            type="text"
            name="url"
            value="{{ old('url', $project->url) }}">

        @error('url')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <br>

    <input class="btn btn-primary btn-lg btn-block" type="submit" value="{{ $btn }}">

    <a class="btn btn-light btn-lg btn-block" href="{{ route('projects.index') }}">Regresar</a>


