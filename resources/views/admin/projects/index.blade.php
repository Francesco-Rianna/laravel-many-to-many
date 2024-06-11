@extends('layouts.admin')
@section('content')
<h1 class="text-center">Our Projects</h1>
<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Slug</th>
        <th scope="col">Tipo</th>
        <th scope="col">Nome cliente</th>
        <th scope="col">Testo</th>
        <th scope="col">Tecnologie</th>
        
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{$project->name}}</td>
                <td>{{$project->slug}}</td>
                <td>{{$project->type ? $project->type->name : 'Tipo non esistente' }}</td>
                <td>{{$project->client_name}}</td>
                <td>{{$project->summary}}</td>
                <td>
                  @if (count($project->technologies) > 0)
                    @foreach ($project->technologies as $technology)
                        {{ $technology->name }}
                    @endforeach
                  @else
                      nessuna tecnologia assegnata
                  @endif
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.projects.show', ['project' => $project->id]) }}">view</a>
                    <form action="{{route('admin.projects.destroy', ['project' =>$project->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button  class="btn btn-danger mt-4" type="submit">elimina</button>
                    </form>
                </td>

            </tr>
        @endforeach
            
    </tbody>
  </table>
@endsection