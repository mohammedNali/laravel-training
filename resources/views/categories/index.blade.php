<x-layout>

    <div class="row mb-2">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('categories.create') }}">Create a Category</a>
        </div>
    </div>

    <div class="row">
        <table class="table table-bordered border-secondary">
            <thead>
            <tr>
                <th>Category Name</th>
                <th>Category Slug</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <form action="{{ route('categories.edit', $category->id) }}" method="GET">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>



</x-layout>
