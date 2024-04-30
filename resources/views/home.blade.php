@extends('layouts.app')

@section('content')
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <a href="{{ route('product.create') }}" class="btn btn-primary mb-3">Ajouter un produit</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Modiffier produit</th>
                        <th>supprimer produit</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td><img style="max-height: 100px; min-height: 100px;" src="{{ url($item->imagepath) }}"
                                    alt=""></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->prix }} DH</td>

                            <td>
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">Modifier</a>
                               
                            </td>
                            <td>
                                 <form action="{{ route('product.destroy', $item->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit?')">Supprimer</button>
                                </form>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
