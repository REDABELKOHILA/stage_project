
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier le produit</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product.update', $product->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nom du produit</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $product->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="description">Description du produit</label>
                                <textarea id="description" name="description" class="form-control" rows="4">{{ $product->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" id="prix" name="prix" class="form-control" value="{{ $product->prix }}" required>
                            </div>

                            <div class="form-group">
                                <label for="imagepath">Chemin de l'image</label>
                                <input type="text" id="imagepath" name="imagepath" class="form-control" value="{{ $product->imagepath }}">
                            </div>

                            <div class="form-group">
                                <label for="category_id">Catégorie</label>
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="">Sélectionnez une catégorie</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Modifier le produit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
